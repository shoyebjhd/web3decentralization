---
title: "Bridges and Cross-Chain"
slug: "os-bridges-cross-chain"
canonical_url: "https://web3decentralization.com/lesson/os-bridges-cross-chain/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:47:03"
course: "defi-101"
course_title: "DeFi 101"
difficulty: "beginner"
order: "107"
---
Value lives on many chains, so [bridges](https://web3decentralization.com/glossary/bridge/) move it between them — and bridges are where crypto's biggest heists happen. Use them with a full understanding of what secures your crossing.

## How a bridge works (the 30-second version)

Lock asset on chain A → proof of the lock → mint a representation on chain B. To go back, burn on B and unlock on A. Everything hinges on step two: *who decides the lock really happened?*

## The security ladder (strongest first)

1. **Native/light-client bridges** (IBC, rollup bridges): cryptographic    proof, no committee to bribe. 2. **Optimistic bridges:** fraud-proof windows; secure if watchers are awake. 3. **Committee/multisig bridges:** N-of-M humans attest. Fine until the M    collude, get hacked, or get coerced — most mega-hacks lived here. 4. **Custodial wrapping** ([wrapped tokens](https://web3decentralization.com/glossary/wrapped-token/)): one    company holds the real coins. An IOU with a logo.

## Practical bridge rules

- Prefer native paths (rollup official bridges, IBC) over third-party ones. - Bridge only what you'll use soon; don't park size on the far side. - Check the bridge's own audit + incident history — "never hacked" beats   "audited once in 2021." - Stablecoins often exist natively on major chains — no bridge needed at all.

## The coming design

[Interoperability](https://web3decentralization.com/glossary/interoperability/) is moving toward shared security (restaking, ZK proofs of consensus) instead of committee trust. Until that matures, treat every bridge as the riskiest hop in your journey — because historically, it is.

> Move assets like crossing a rope bridge: light load, good weather, and never
> > set up camp in the middle.

**Next lesson:** the DeFi safety playbook.
