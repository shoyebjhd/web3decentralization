---
title: "Mempool"
related: [transaction, mining, gas]
---

The mempool is the waiting room for unconfirmed transactions: the pool of
pending transactions nodes have received but not yet put in a block. Miners or
validators pick which to include next, typically favoring the ones paying the
highest fees.

## Why it matters

When you submit a transaction, it first "sits in the mempool." Slow networks +
high demand = long mempool queues and higher fees. It's also where sandwich
bots and MEV exploits happen — watching the mempool to front-run large trades
— a real decentralization concern.

**Related:** [transaction](transaction.md) · [mining](mining.md) ·
[gas](gas.md)