---
title: "Optimistic Rollup"
related: [rollup, layer-2, bridge]
---

An optimistic rollup executes transactions off-chain and posts the results to
Ethereum, *assuming* they're valid — "innocent until proven guilty." Anyone
watching can submit a fraud proof during a week-long challenge window; a
successful challenge reverts the batch and slashes the cheater.

## Why it matters

Optimistic rollups (Arbitrum, Optimism) scaled Ethereum years before ZK tech
matured, and the model works. The decentralization caveats: a centralized
sequencer orders transactions today, and the week-long withdrawal window
exists precisely because security depends on vigilant challengers.

**Related:** [rollup](rollup.md) · [layer 2](layer-2.md) ·
[bridge](bridge.md)