// fetch-scores.js — weekly live decentralization data (no API keys, public endpoints only).
// Fetches validator counts (+ stake distributions where freely available),
// computes Nakamoto-33, and writes ONLY additive `live` blocks:
//   - themes/w3d/assets/w3d-data.json → top-level "live" key (audited scores untouched)
//   - content/chains/{btc,atom,avax,near}.md → live_* frontmatter keys
// Chains without a free keyless source keep audited values (documented below).
// Exit 0 even if all fetches fail (keeps old data); exit 1 only on programming errors.
const fs = require('fs');
const path = require('path');

const ROOT = path.resolve(__dirname, '..');
const DATA_JSON = path.join(ROOT, 'themes', 'w3d', 'assets', 'w3d-data.json');
const CHAINS_DIR = path.join(ROOT, 'content', 'chains');

// Chains deliberately NOT fetched live (no free keyless source):
// eth (beaconcha.in key-gated), sol (ankr key-gated), ada (no keyless dist API),
// dot (no keyless dist API), apt (no keyless validator API), sui (public JSON-RPC
// deprecated), xrp (no stake concept; UNL count needs rippled, not clio),
// arb (L2, inherits L1). btc has node counts only (no Nakamoto concept on nodes).

function nakamoto33(shares) {
  const nums = shares.filter((n) => Number.isFinite(n) && n > 0);
  if (!nums.length) return null;
  const total = nums.reduce((a, b) => a + b, 0);
  if (total <= 0) return null;
  nums.sort((a, b) => b - a);
  let acc = 0;
  for (let i = 0; i < nums.length; i++) {
    acc += nums[i];
    if (acc / total > 1 / 3) return i + 1;
  }
  return nums.length;
}

async function get(url, opts) {
  const c = new AbortController();
  const t = setTimeout(() => c.abort(), 25000);
  try {
    const r = await fetch(url, Object.assign({ signal: c.signal, headers: { 'content-type': 'application/json', 'user-agent': 'W3D-Academy-Bot/1.0' } }, opts || {}));
    if (!r.ok) throw new Error('http ' + r.status);
    return await r.json();
  } finally { clearTimeout(t); }
}
async function rpc(url, method, params) {
  return get(url, { method: 'POST', body: JSON.stringify({ jsonrpc: '2.0', id: 1, method, params: params || [] }) });
}
const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

async function fetchLive() {
  const live = {};
  const put = (slug, patch) => { live[slug] = Object.assign({ slug }, patch); };

  try {
    const j = await get('https://bitnodes.io/api/v1/snapshots/latest/');
    if (Number.isFinite(j.total_nodes)) put('btc', { validators: j.total_nodes, validators_source: 'bitnodes', note: 'reachable nodes, not miners; no Nakamoto concept' });
    else throw new Error('schema');
  } catch (e) { put('btc', { error: String((e && e.message) || e) }); }
  await sleep(1500);

  try {
    const j = await get('https://rest.cosmos.directory/cosmoshub/cosmos/staking/v1beta1/validators?status=BOND_STATUS_BONDED&pagination.limit=300');
    const vs = j.validators || [];
    const stakes = vs.map((v) => Number(v.tokens)).filter((n) => Number.isFinite(n) && n > 0);
    put('atom', { validators: vs.length, validators_source: 'cosmos.directory', stakes });
  } catch (e) { put('atom', { error: String((e && e.message) || e) }); }
  await sleep(1500);

  try {
    const j = await rpc('https://api.avax.network/ext/bc/P', 'platform.getCurrentValidators', [{}]);
    const vs = (j.result && j.result.validators) || [];
    const stakes = vs.map((v) => Number(v.weight ?? v.stakeAmount)).filter((n) => Number.isFinite(n) && n > 0);
    put('avax', { validators: vs.length, validators_source: 'avax-public-api', stakes });
  } catch (e) { put('avax', { error: String((e && e.message) || e) }); }
  await sleep(1500);

  try {
    const j = await rpc('https://rpc.mainnet.near.org', 'validators', [null]);
    const vs = (j.result && j.result.current_validators) || [];
    const stakes = vs.map((v) => { try { return Number(BigInt(v.stake) / BigInt(1e18)); } catch { return NaN; } }).filter((n) => Number.isFinite(n) && n > 0);
    put('near', { validators: vs.length, validators_source: 'near-public-rpc', stakes });
  } catch (e) { put('near', { error: String((e && e.message) || e) }); }

  for (const k of Object.keys(live)) {
    const c = live[k];
    if (c.stakes) {
      c.nakamoto_33 = nakamoto33(c.stakes);
      c.nakamoto_source = 'computed';
      delete c.stakes;
    }
  }
  return live;
}

function updateDataJson(live, updated) {
  const raw = fs.readFileSync(DATA_JSON, 'utf8');
  const data = JSON.parse(raw);
  const block = { updated, chains: {} };
  for (const slug of ['btc', 'atom', 'avax', 'near']) {
    const c = live[slug];
    if (!c || c.error) continue;
    block.chains[slug] = {
      validators: c.validators ?? null,
      validators_source: c.validators_source,
      nakamoto_33: c.nakamoto_33 ?? null,
      nakamoto_source: c.nakamoto_33 != null ? 'computed-live' : 'audited',
    };
  }
  data.live = block;
  let out = JSON.stringify(data, null, 4);
  if (raw.endsWith('\n') && !out.endsWith('\n')) out += '\n';
  fs.writeFileSync(DATA_JSON, out, 'utf8');
  return Object.keys(block.chains);
}

const MD_FILE = { btc: 'btc', atom: 'cosmos', avax: 'avax', near: 'near' };

function updateChainMd(slug, info, updated) {
  const file = path.join(CHAINS_DIR, (MD_FILE[slug] || slug) + '.md');
  if (!fs.existsSync(file)) return 'missing-file';
  const raw = fs.readFileSync(file, 'utf8');
  const eol = raw.includes('\r\n') ? '\r\n' : '\n';
  const text = raw.replace(/\r\n/g, '\n');
  const m = text.match(/^---\n([\s\S]*?)\n---\n/);
  if (!m) return 'no-frontmatter';
  let fm = m[1].split('\n').filter((l) => !/^(live_|lastmod)/.test(l));
  const set = (k, v) => fm.push(`${k}: ${v}`);
  set('live_validators', info.validators ?? '');
  set('live_validators_source', info.validators_source || '');
  set('live_nakamoto_33', info.nakamoto_33 ?? '');
  set('live_nakamoto_source', info.nakamoto_source || 'audited');
  set('live_updated', updated);
  set('lastmod', updated.slice(0, 10));
  const out = `---\n${fm.join('\n')}\n---\n` + text.slice(m[0].length);
  fs.writeFileSync(file, out.replace(/\n/g, eol), 'utf8');
  return 'ok';
}

async function main() {
  const live = await fetchLive();
  const problems = Object.entries(live).filter(([, c]) => c.error).map(([k, c]) => `${k}=${c.error}`);
  if (problems.length) console.log('fetch-issues: ' + problems.join(' | '));
  const okSlugs = updateDataJson(live, new Date().toISOString());
  const updated = new Date().toISOString();
  for (const slug of okSlugs) {
    console.log(`md ${slug}: ` + updateChainMd(slug, live[slug], updated));
  }
  console.log('live chains: ' + (okSlugs.join(',') || '(none — kept previous)'));
}

if (require.main === module) {
  main().catch((e) => { console.error('FATAL', e); process.exit(1); });
}

module.exports = { nakamoto33 };
