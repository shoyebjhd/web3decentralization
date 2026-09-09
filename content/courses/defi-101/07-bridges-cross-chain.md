---
title: "Bridges and Cross-Chain"
order: 7
course: defi-101
---

Value lives on many chains, so [bridges](glossary/bridge.md) move it between
them — and bridges are where crypto's biggest heists happen. Use them with a
full understanding of what secures your crossing.

## How a bridge works (the 30-second version)

Lock asset on chain A → proof of the lock → mint a representation on chain B.
To go back, burn on B and unlock on A. Everything hinges on step two: *who
decides the lock really happened?*

## The security ladder (strongest first)

1. **Native/light-client bridges** (IBC, rollup bridges): cryptographic
   proof, no committee to bribe.
2. **Optimistic bridges:** fraud-proof windows; secure if watchers are awake.
3. **Committee/multisig bridges:** N-of-M humans attest. Fine until the M
   collude, get hacked, or get coerced — most mega-hacks lived here.
4. **Custodial wrapping** ([wrapped tokens](glossary/wrapped-token.md)): one
   company holds the real coins. An IOU with a logo.

## Practical bridge rules

- Prefer native paths (rollup official bridges, IBC) over third-party ones.
- Bridge only what you'll use soon; don't park size on the far side.
- Check the bridge's own audit + incident history — "never hacked" beats
  "audited once in 2021."
- Stablecoins often exist natively on major chains — no bridge needed at all.

## The coming design

[Interoperability](glossary/interoperability.md) is moving toward shared
security (restaking, ZK proofs of consensus) instead of committee trust. Until
that matures, treat every bridge as the riskiest hop in your journey — because
historically, it is.

> Move assets like crossing a rope bridge: light load, good weather, and never
> set up camp in the middle.

**Next lesson:** the DeFi safety playbook.