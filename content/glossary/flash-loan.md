---
title: "Flash Loan"
related: [defi, smart-contract, liquidation]
---

A flash loan lets anyone borrow millions with zero collateral — provided the
loan is repaid *within the same transaction*. If repayment fails, the whole
transaction reverts as if it never happened. Aave pioneered them; attackers
love them for funding million-dollar exploits from nothing.

## Why it matters

Flash loans democratized attacks: no capital needed, just a clever exploit.
Most nine-figure DeFi hacks used one — borrowing huge, manipulating an
oracle or pool, repaying, and pocketing the difference in seconds. For users,
the lesson is indirect but vital: unaudited protocols holding your funds can
be drained by anyone with an internet connection and an idea.

**Related:** [DeFi](defi.md) · [smart contract](smart-contract.md) ·
[liquidation](liquidation.md)