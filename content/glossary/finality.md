---
title: "Finality"
related: [consensus, block, transaction]
---

Finality is the point after which a transaction can no longer be reversed.
Bitcoin's is probabilistic (each confirmation makes reversal exponentially
harder); BFT chains like Cosmos finalize instantly once two-thirds of
validators vote — one block, done, irreversible.

## Why it matters

"Confirmed" means different things per chain: one Ethereum block is a strong
hint, one Cosmos block is a guarantee. Exchanges set confirmation requirements
from exactly this math. When speed matters — trading, bridging — finality
time is the number to compare, not block time.

**Related:** [consensus](consensus.md) · [block](block.md) ·
[transaction](transaction.md)