const fs = require('fs');
const path = require('path');
const http = require('http');
const https = require('https');

const CONCURRENCY = 2;
const DELAY_MS = 1400;
const URL_LIST = path.resolve(__dirname, '..', '.temp', 'og-verify-urls.txt');
const OUT = path.resolve(__dirname, '..', '.temp', 'og-verify.tsv');

function fetchUrl(url, maybeBody) {
  return new Promise((resolve) => {
    const lib = url.startsWith('https') ? https : http;
    const u = new URL(url);
    const req = lib.request(u, { method: maybeBody ? 'GET' : 'HEAD', headers: { 'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36' } }, (res) => {
      let n = 0;
      let body = '';
      res.on('data', (c) => { if (maybeBody) { body += c; } n += c.length; if (n > 2_500_000) { res.destroy(); } });
      res.on('end', () => resolve({ status: res.statusCode, type: res.headers['content-type'] || '', body: maybeBody ? body : '' }));
      res.on('error', () => resolve({ status: 0, type: '', body: maybeBody ? '' : '' }));
    });
    req.setTimeout(25000, () => { req.destroy(); resolve({ status: 0, type: 'TIMEOUT', body: '' }); });
    req.on('error', () => resolve({ status: 0, type: 'ERR', body: '' }));
    req.end();
  });
}

function extractOgImage(html) {
  const m = html.match(/<meta[^>]*property\s*=\s*["']og:image["'][^>]*content\s*=\s*["']([^"']*)["']/i)
    || html.match(/<meta[^>]*content\s*=\s*["']([^"']*)["'][^>]*property\s*=\s*["']og:image["']/i);
  return m ? m[1].trim() : '';
}

async function run() {
  const urls = fs.readFileSync(URL_LIST, 'utf8').split(/\r?\n/).map((s) => s.trim()).filter(Boolean);
  const rows = [];
  let done = 0;
  console.log(`Verifying ${urls.length} URLs (concurrency ${CONCURRENCY})`);

  const q = urls.map((url, idx) => ({ url, idx }));
  const worker = async (stop) => {
    while (true) {
      const item = q.shift();
      if (!item) break;
      const { url, idx } = item;
      const page = await fetchUrl(url, true);
      await new Promise((r) => setTimeout(r, DELAY_MS));
      const og = page.status === 200 ? extractOgImage(page.body) : '';
      let imgStatus = '', imgType = '';
      if (og) {
        const im = await fetchUrl(og, false);
        imgStatus = im.status;
        imgType = im.type;
      }
      rows[idx] = [url, page.status, og ? 'YES' : 'NO', og, imgStatus, imgType].join('\t');
      done++;
      if (done % 10 === 0 || done === urls.length) {
        console.log(`${done}/${urls.length}`);
      }
    }
  };

  const workers = Array.from({ length: CONCURRENCY }, worker);
  await Promise.all(workers);

  fs.writeFileSync(OUT, rows.filter(Boolean).join('\n'));
  const fails = rows.filter((r) => r && !r.includes('\tYES\t') && r.split('\t')[1] === '200');
  const missingOg = rows.filter((r) => r && r.split('\t')[2] === 'NO');
  const imgFail = rows.filter((r) => r && r.split('\t')[2] === 'YES' && !(r.split('\t')[4] === '200' && (r.split('\t')[5] || '').includes('image')));
  console.log(`\nPages 200: ${rows.filter((r) => r && r.split('\t')[1] === '200').length}/${rows.length}`);
  console.log(`og:image present: ${rows.filter((r) => r && r.split('\t')[2] === 'YES').length}`);
  console.log(`og:image missing: ${missingOg.length}`);
  console.log(`og:image URL non-200/non-image: ${imgFail.length}`);
  if (imgFail.length) console.log('\nImage failures:\n' + imgFail.join('\n'));
  if (missingOg.length) console.log('\nMissing og:image:\n' + missingOg.map((r) => r.split('\t')[0]).join('\n'));
}

run().catch((e) => { console.error(e); process.exit(1); });