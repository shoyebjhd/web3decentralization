---
title: "Shared Sequencing"
slug: "shared-sequencing"
canonical_url: "https://web3decentralization.com/glossary/shared-sequencing/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 07:52:59"
---
Shared sequencing lets multiple rollups use one decentralized sequencer network instead of each running its own centralized one — Espresso and Astria pioneered the model. One neutral ordering layer serving many chains, with atomic cross-rollup inclusion as the killer feature.

## How it works

Rollups post transactions to the shared network, which orders them (across chains, atomically) and returns sequences each rollup executes. Ordering power moves from single operators to a staked, rotating validator set with its own slashing and governance.

## Why it matters for decentralization

It attacks the single biggest rollup centralization vector directly — and replaces N trusted sequencers with one shared trust assumption to audit hard. Genuinely decentralized shared sequencing would upgrade the whole L2 ecosystem at once; a captured one would compromise it at once. Same leverage, both directions.

## Risks & trade-offs

New trust layer (who runs it?); cross-chain MEV complexities; sovereignty questions (whose ordering rules win disputes?); and liveness coupling — shared downtime hits every member simultaneously.

## FAQ

**Shared vs based sequencing?** Shared = neutral third-party network orders for many rollups. Based = L1 validators do the ordering (maximal L1 alignment, minimal new trust). Different bets, same problem.

**Does it fix MEV?** It relocates it to the shared layer — which must then solve fair ordering itself. Turtles all the way down, but shared turtles.

**Live yet?** Testnets and early integrations; production shared sequencing at scale is still ahead. Track operator sets, not announcements.

## Related terms

[sequencer](https://web3decentralization.com/glossary/sequencer/) · [rollup](https://web3decentralization.com/glossary/rollup/) ·
[layer 2](https://web3decentralization.com/glossary/layer-2/)
