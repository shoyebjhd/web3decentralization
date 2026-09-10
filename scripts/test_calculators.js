// Functional test for W3D calculator logic (pure DOM stub, no browser needed).
// Usage: node scripts/test_calculators.js <toolsdir>/.temp/jscheck dir
const fs = require('fs');
const path = require('path');
const dir = process.argv[2];

function makeDocument() {
  const els = {};
  function el(id) {
    if (!els[id]) els[id] = { id, value: '', innerHTML: '', handlers: {},
      addEventListener(ev, fn) { this.handlers[ev] = fn; },
      appendChild() {}, setPointerCapture() {}, getContext() { return null; },
      querySelectorAll() { return []; }, closest() { return null; },
      options: [], selectedIndex: 0 };
    return els[id];
  }
  return {
    __els: els,
    getElementById: (id) => el(id),
    createElement: () => ({ innerHTML: '', appendChild() {}, setAttribute() {} }),
    querySelector: () => null,
  };
}
function click(doc, id, val) {
  if (val !== undefined) doc.__els[id] = Object.assign(doc.__els[id] || {}, {});
  const e = doc.getElementById(id);
  if (val !== undefined) e.value = val;
  return e;
}
async function load(slug, setup) {
  const code = fs.readFileSync(path.join(dir, slug + '.js'), 'utf8');
  const document = makeDocument();
  const fn = new Function('document', 'window', code);
  fn(document, {});
  await setup(document);
  return document;
}
let pass = 0, fail = 0;
function check(name, cond, extra) {
  if (cond) { pass++; console.log('PASS ' + name); }
  else { fail++; console.log('FAIL ' + name + (extra ? ' :: ' + extra : '')); }
}
(async () => {
  // 1. nakamoto: shares 20,15,12,10,9,8,7,6,5,8 -> c33=2, c51=4
  let d = await load('nakamoto-coefficient', async (doc) => {
    click(doc, 'nakamoto-n', '10');
    click(doc, 'nakamoto-shares', '20,15,12,10,9,8,7,6,5,8');
    doc.getElementById('nakamoto-go').handlers.click();
  });
  let out = d.getElementById('nakamoto-out').innerHTML;
  check('nakamoto c33=2', out.includes('33% halt threshold): 2'), out.slice(0, 120));
  check('nakamoto c51=4', out.includes('51% rewrite threshold): 4'));

  // 2. IL: r=2, v=1000 -> -5.72%, LP ~942.81
  d = await load('impermanent-loss-calculator', async (doc) => {
    click(doc, 'il-r', '2'); click(doc, 'il-v', '1000');
    doc.getElementById('il-go').handlers.click();
  });
  out = d.getElementById('il-out').innerHTML;
  check('IL -5.72%', out.includes('-5.72%'), out.slice(0, 120));

  // 3. validator-profit: 32 ETH @3.5%, 5% comm, 99% up -> net ~1.0543
  d = await load('validator-profit-calculator', async (doc) => {
    click(doc, 'vp-stake', '32'); click(doc, 'vp-apy', '3.5');
    click(doc, 'vp-comm', '5'); click(doc, 'vp-up', '99');
    doc.getElementById('vp-go').handlers.click();
  });
  out = d.getElementById('vp-out').innerHTML;
  check('vp net ~1.05', out.includes('1.05') || out.includes('1.06'), out.slice(0, 120));

  // 4. address checker: BIP173 vector + genesis address must validate
  d = await load('address-checker', async (doc) => {
    click(doc, 'ac-addr', 'bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t4');
    await doc.getElementById('ac-go').handlers.click();
  });
  out = d.getElementById('ac-addr') && d.getElementById('ac-out').innerHTML;
  check('bech32 valid vector', out.includes('Valid Bitcoin'), out.slice(0, 120));

  d = await load('address-checker', async (doc) => {
    click(doc, 'ac-addr', '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa');
    await doc.getElementById('ac-go').handlers.click();
  });
  out = d.getElementById('ac-out').innerHTML;
  check('base58check genesis', out.includes('Valid Bitcoin legacy'), out.slice(0, 120));

  d = await load('address-checker', async (doc) => {
    click(doc, 'ac-addr', 'bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t5');
    await doc.getElementById('ac-go').handlers.click();
  });
  out = d.getElementById('ac-out').innerHTML;
  check('bech32 bad checksum rejected', out.includes('Invalid'), out.slice(0, 120));

  console.log(`\n${pass} passed, ${fail} failed`);
  process.exit(fail ? 1 : 0);
})().catch((e) => { console.error('HARNESS-ERROR', e.message); process.exit(2); });
