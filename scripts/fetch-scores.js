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

const CHAIN_SLUGS = ['btc', 'sol', 'ada', 'avax', 'cosmos', 'xrp', 'sui', 'apt', 'near'];

// Chains deliberately NOT fetched live (no free keyless source):
// eth (beaconcha.in / ankr key-gated, no usable public beacon API),
// dot (staking storage keys need twox64 hashing; no keyless dist REST),
// arb (optimistic rollup, no sovereign validator set to count).
// btc/ada/xrp have counts only (no stake distribution); labeled accordingly.

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
    if (Number.isFinite(j.total_nodes)) put('btc', {
      validators: j.total_nodes, validators_source: 'bitnodes',
      label: 'illustrative live data — reachable nodes, not miners; no stake/Nakamoto concept',
    });
    else throw new Error('schema');
  } catch (e) { put('btc', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await rpc('https://api.mainnet-beta.solana.com', 'getVoteAccounts');
    const cur = (j.result && j.result.current) || [];
    const stakes = cur.map((v) => Number(v.activatedStake)).filter((n) => Number.isFinite(n) && n > 0);
    put('sol', { validators: cur.length, validators_source: 'solana-public-rpc', stakes });
  } catch (e) { put('sol', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const pools = [];
    let offset = 0;
    const LIMIT = 1000;
    while (true) {
      const j = await get(`https://api.koios.rest/api/v1/pool_list?limit=${LIMIT}&offset=${offset}`);
      if (!Array.isArray(j) || !j.length) break;
      pools.push(...j);
      if (j.length < LIMIT) break;
      offset += LIMIT;
      await sleep(1200);
    }
    put('ada', {
      validators: pools.length, validators_source: 'koios.rest',
      label: 'illustrative live data — koios pool-registry count; no keyless stake distribution, Nakamoto from audited snapshot',
    });
  } catch (e) { put('ada', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await rpc('https://api.avax.network/ext/bc/P', 'platform.getCurrentValidators', [{}]);
    const vs = (j.result && j.result.validators) || [];
    const stakes = vs.map((v) => Number(v.weight ?? v.stakeAmount)).filter((n) => Number.isFinite(n) && n > 0);
    put('avax', { validators: vs.length, validators_source: 'avax-public-api', stakes });
  } catch (e) { put('avax', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await get('https://rest.cosmos.directory/cosmoshub/cosmos/staking/v1beta1/validators?status=BOND_STATUS_BONDED&pagination.limit=300');
    const vs = j.validators || [];
    const stakes = vs.map((v) => Number(v.tokens)).filter((n) => Number.isFinite(n) && n > 0);
    put('cosmos', { validators: vs.length, validators_source: 'cosmos.directory', stakes });
  } catch (e) { put('cosmos', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await get('https://vl.ripple.com/');
    const inner = JSON.parse(Buffer.from(j.blob, 'base64').toString('utf8'));
    const vs = (inner.validators || []).filter((v) => v.validation_public_key);
    put('xrp', {
      validators: vs.length, validators_source: 'ripple-official-unl',
      label: 'illustrative live data — Ripple-published UNL validator list; no stake concept',
    });
  } catch (e) { put('xrp', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await rpc('https://sui.publicnode.com', 'suix_getLatestSuiSystemState');
    const vs = (j.result && j.result.activeValidators) || [];
    const stakes = vs.map((v) => Number(v.votingPower)).filter((n) => Number.isFinite(n) && n > 0);
    put('sui', { validators: vs.length, validators_source: 'sui.publicnode', stakes });
  } catch (e) { put('sui', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await get('https://fullnode.mainnet.aptoslabs.com/v1/accounts/0x1/resource/0x1::stake::ValidatorSet');
    const vs = (j.data && j.data.active_validators) || [];
    const stakes = vs.map((v) => Number(v.voting_power)).filter((n) => Number.isFinite(n) && n > 0);
    put('apt', { validators: vs.length, validators_source: 'aptos-public-fullnode', stakes });
  } catch (e) { put('apt', { error: String((e && e.message) || e) }); }
  await sleep(1200);

  try {
    const j = await rpc('https://rpc.mainnet.near.org', 'validators', [null]);
    const vs = (j.result && j.result.current_validators) || [];
    const stakes = vs.map((v) => { try { return Number(BigInt(v.stake) / BigInt(1e18)); } catch { return NaN; } }).filter((n) => Number.isFinite(n) && n > 0);
    put('near', { validators: vs.length, validators_source: 'near-public-rpc', stakes });
  } catch (e) { put('near', { error: String((e && e.message) || e) }); }

  for (const k of Object.keys(live)) {
    const c = live[k];
    if (c.stakes && c.stakes.length) {
      c.nakamoto_33 = nakamoto33(c.stakes);
      c.nakamoto_source = 'computed-live';
      delete c.stakes;
    } else if (c.stakes && !c.stakes.length) {
      delete c.stakes;
      c.label = (c.label ? c.label + ' ' : '') + 'illustrative live data — no stake distribution, Nakamoto from audited snapshot';
    }
  }
  return live;
}

function updateDataJson(live, candidate) {
  const raw = fs.readFileSync(DATA_JSON, 'utf8');
  const data = JSON.parse(raw);
  const block = { chains: {} };
  for (const slug of CHAIN_SLUGS) {
    const c = live[slug];
    if (!c || c.error) continue;
    block.chains[slug] = {
      validators: c.validators ?? null,
      validators_source: c.validators_source,
      nakamoto_33: c.nakamoto_33 ?? null,
      nakamoto_source: c.nakamoto_33 != null ? 'computed-live' : 'audited',
    };
    if (c.label) block.chains[slug].label = c.label;
  }
  const same = (a, b) =>
    a && b &&
    a.validators === b.validators &&
    a.validators_source === b.validators_source &&
    a.nakamoto_33 === b.nakamoto_33 &&
    a.nakamoto_source === b.nakamoto_source &&
    (a.label || '') === (b.label || '');
  const prev = data.live && data.live.chains;
  const unchanged = prev && Object.keys(block.chains).every((k) => same(block.chains[k], prev[k]));
  const updated = unchanged && data.live && data.live.updated ? data.live.updated : candidate;
  data.live = { updated, chains: block.chains };
  let out = JSON.stringify(data, null, 4);
  if (raw.endsWith('\n') && !out.endsWith('\n')) out += '\n';
  fs.writeFileSync(DATA_JSON, out, 'utf8');
  return { ok: Object.keys(block.chains), updated };
}

function updateChainMd(slug, info, updated) {
  const file = path.join(CHAINS_DIR, slug + '.md');
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
  if (info.label) set('live_label', info.label);
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
  const res = updateDataJson(live, new Date().toISOString());
  let updated = res.updated;
  for (const slug of res.ok) {
    const r = updateChainMd(slug, live[slug], updated);
    if (r !== 'ok') { console.log(`md ${slug}: ${r}`); res.ok = res.ok.filter((s) => s !== slug); }
  }
  console.log('live chains: ' + (res.ok.join(',') || '(none — kept previous)'));
}

if (require.main === module) {
  main().catch((e) => { console.error('FATAL', e); process.exit(1); });
}

module.exports = { nakamoto33 };
