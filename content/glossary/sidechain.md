---
title: "Sidechain"
related: [layer-2, bridge, blockchain]
---

A sidechain is an independent blockchain connected to a main chain by a
two-way [bridge](bridge.md): lock coins on one side, mint equivalents on the
other. Unlike a rollup, a sidechain has its own validators and security —
the main chain doesn't verify its blocks.

## Why it matters

"Layer 2" gets slapped on sidechains in marketing, but the security model is
completely different: a rollup inherits Ethereum's security; a sidechain is
only as safe as its own (usually much smaller) validator set. Polygon PoS is
the famous example — fast and cheap, secured by its own ~100 validators, not
by Ethereum.

**Related:** [layer 2](layer-2.md) · [bridge](bridge.md) ·
[blockchain](blockchain.md)