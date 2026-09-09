---
title: "Double-Spend"
related: [consensus, 51-percent-attack, mempool]
---

A double-spend is spending the same coins twice — the fundamental problem all
consensus exists to prevent. The classic form: broadcast payment A to a
merchant while secretly mining a longer chain containing conflicting payment
B, then release it to erase A.

## Why it matters

Every confirmation rule, every 51%-attack cost model, and every "wait for
finality" warning traces back to this one attack. Small merchants accepting
zero-confirmation payments get double-spent routinely; the entire architecture
of confirmations, mempools, and reorg protection is the immune system built
around it.

**Related:** [consensus](glossary/consensus.md) ·
[51% attack](glossary/51-percent-attack.md) · [mempool](glossary/mempool.md)