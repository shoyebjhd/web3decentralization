---
title: "Reentrancy"
related: [smart-contract, smart-contract-audit, flash-loan]
---

Reentrancy is the bug that stole $60M in The DAO hack: a contract sends funds
*before* updating its own balance, so a malicious receiver contract calls
back in and withdraws again — and again — draining the vault in one
transaction. The fix (update state first) is one line; forgetting it cost a
blockchain its innocence.

## Why it matters

It's the canonical example of why "audited" matters and why ordering
operations correctly is security-critical in finance code. Modern libraries
and reentrancy guards make it rarer, but every new developer rediscovers it —
when an audit flags reentrancy risk, treat it as a five-alarm finding, not a
note.

**Related:** [smart contract](glossary/smart-contract.md) ·
[smart contract audit](glossary/smart-contract-audit.md) ·
[flash loan](glossary/flash-loan.md)