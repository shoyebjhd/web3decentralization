#!/usr/bin/env node
/**
 * Warm the mobile-UA cache variant for every published URL so first real
 * mobile visitors (and PSI/Lighthouse with a mobile UA) get a CDN/wp HIT
 * instead of a ~2.7s dynamic render. Run 2 warm passes per URL (2x script to
 * seed both wp page-cache and hCDN edge). Low concurrency (2) per ops rules.
 */
const UA = 'Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36';
const HOME = process.argv[2] || 'https://web3decentralization.com';

async function get(u) {
  const c = new AbortController();
  const t = setTimeout(() => c.abort(), 30000);
  const st = Date.now();
  try {
    const r = await fetch(u, { headers: { 'user-agent': UA }, signal: c.signal });
    const ms = Date.now() - st;
    const cc = r.headers.get('x-hcdn-cache-status');
    console.log(`${String(ms).padStart(5)}ms ${r.status} ${(cc || '-').padEnd(8)} ${u.replace(HOME, '')}`);
    return r.status;
  } catch (e) {
    console.log(`ERROR ${u} ${e.message}`);
    return 0;
  } finally {
    clearTimeout(t);
  }
}

(async () => {
  const base = `${HOME}/wp-sitemap.xml`;
  const r = await fetch(base, { headers: { 'user-agent': UA } });
  const sitemaps = [...String(await r.text()).matchAll(/<loc>([^<]+sitemap[^<]+)<\/loc>/g)].map((m) => m[1]);
  const urls = new Set([HOME]);
  for (const sm of sitemaps) {
    try {
      const rr = await fetch(sm, { headers: { 'user-agent': UA } });
      const txt = await rr.text();
      for (const m of txt.matchAll(/<loc>([^<]+)<\/loc>/g)) {
        const u = m[1];
        if (u.includes(HOME)) urls.add(u);
      }
    } catch (e) { console.log('skip ' + sm); }
  }
  const list = [...urls];
  console.log(`warming ${list.length} URLs (2 passes, concurrency 2)`);
  for (let pass = 1; pass <= 2; pass++) {
    let done = 0;
    for (let i = 0; i < list.length; i += 2) {
      await Promise.all([get(list[i]), list[i + 1] ? get(list[i + 1]) : Promise.resolve()]);
      done += 2;
      await new Promise((r) => setTimeout(r, 350));
    }
    console.log(`pass ${pass} done (${done} pages)`);
  }
})().catch((e) => { console.error(e); process.exit(1); });