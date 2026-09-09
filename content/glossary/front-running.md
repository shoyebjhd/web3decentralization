---
title: "Front-Running"
related: [mev, mempool, slippage]
---

Front-running is jumping ahead of someone's pending transaction for profit —
seeing your big buy in the [mempool](mempool.md), buying first, then selling
into your price impact. On-chain it's usually bots, not people, and it's the
most common form of [MEV](mev.md) extraction.

## Why it matters

Front-running is why your swap sometimes executes worse than quoted: the
difference is someone else's profit. Defenses are practical — low
[slippage](slippage.md) tolerance, private RPCs, and avoiding huge trades in
thin pools — not theoretical. If you trade on DEXs, you operate in MEV
territory every time.

**Related:** [MEV](mev.md) · [mempool](mempool.md) ·
[slippage](slippage.md)