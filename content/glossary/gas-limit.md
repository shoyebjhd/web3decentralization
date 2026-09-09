---
title: "Gas Limit"
related: [gas, transaction, ethereum]
---

The gas limit is the maximum computation you'll pay for in one transaction —
your spending cap. Set it too low and the transaction fails (fees still
taken); set it generously and you only pay for what actually executes, the
rest refunds automatically.

## Why it matters

Wallets usually estimate correctly, but contract interactions (swaps,
mints, bridging) sometimes need manual bumps — "out of gas" failures are the
classic beginner tax, paid in full with nothing to show. Rule: for standard
transfers leave it alone; for complex DeFi calls, pad the estimate and check
what similar transactions actually used on an explorer.

**Related:** [gas](glossary/gas.md) · [transaction](glossary/transaction.md) ·
[ethereum](glossary/ethereum.md)