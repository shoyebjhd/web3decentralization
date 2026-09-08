---
title: "Rollup"
related: [layer-2, layer-1, gas]
---

A rollup is a Layer 2 that executes many transactions off the L1, compresses
them, and posts a summary to the L1 for settlement. **Optimistic rollups**
assume validity and rely on dispute challenges; **ZK rollups** post
cryptographic proof that everything was computed correctly.

## Why it matters

Rollups gave Ethereum its scaling path and the user-visible payoff is cheap,
fast transactions. Their decentralization caveat: most run a centralized
*sequencer* today — one operator ordering transactions. W3D scores rollups
like Arbitrum on infrastructure partially for that reason.

**Related:** [layer 2](layer-2.md) · [layer 1](layer-1.md) ·
[gas](gas.md)