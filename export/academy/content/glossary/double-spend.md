---
title: "Double-Spend"
slug: "double-spend"
canonical_url: "https://web3decentralization.com/glossary/double-spend/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 05:06:27"
---
A double-spend is spending the same coins twice — the fundamental problem all consensus exists to prevent. The classic form: broadcast payment A to a merchant while secretly mining a longer chain containing conflicting payment B, then release it to erase A.

## Why it matters

Every confirmation rule, every 51%-attack cost model, and every "wait for finality" warning traces back to this one attack. Small merchants accepting zero-confirmation payments get double-spent routinely; the entire architecture of confirmations, mempools, and reorg protection is the immune system built around it.

## Related terms

[consensus](https://web3decentralization.com/glossary/consensus/) ·
[51% attack](https://web3decentralization.com/glossary/51-percent-attack/) · [mempool](https://web3decentralization.com/glossary/mempool/)
