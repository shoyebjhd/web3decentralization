---
title: "Block Time"
related: [block, consensus, finality]
---

Block time is how often a chain produces blocks — ~10 minutes (Bitcoin), ~12
seconds (Ethereum), ~400 milliseconds (Solana). Faster blocks mean quicker
first confirmations, but also more network load and (often) heavier validator
requirements.

## Why it matters

Block time is *not* finality or throughput by itself — it's one input among
consensus design, propagation, and execution. Chains advertising extreme
speeds usually pay for it in hardware centralization, which is exactly the
trade-off infrastructure scoring exists to price.

**Related:** [block](glossary/block.md) · [consensus](glossary/consensus.md) ·
[finality](glossary/finality.md)