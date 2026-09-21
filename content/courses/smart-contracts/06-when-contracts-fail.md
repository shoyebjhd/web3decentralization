---
title: "When Contracts Fail: Hack Case Studies"
order: 6
course: smart-contracts
description: "Theory ends here."
---

Theory ends here. Each of these hacks taught the industry a rule â€” learn them
cheaply, from history instead of your wallet.

## The DAO (2016) â€” reentrancy

An attacker recursively withdrew ETH before the balance updated â€” $60M gone,
Ethereum forked to undo it. **Rule:** update state *before* sending funds
(checks-effects-interactions), and get [audited](glossary/smart-contract-audit.md).

## Parity multisig (2017) â€” unprotected init

Someone claimed ownership of a shared library contract and self-destructed
it, freezing ~$150M permanently. **Rule:** initialization functions need
access control, and shared libraries are single points of failure.

## Oracle exploits (2020â€“forever) â€” price lies

Attackers used [flash loans](glossary/flash-loan.md) to warp thin-pool
prices that lending protocols trusted, borrowing millions against fake
[collateral](glossary/collateral.md) value. **Rule:** oracles must be
manipulation-resistant (TWAPs, multiple sources, circuit breakers).

## Bridge hacks (2022â€“2023) â€” trusted verifiers

Ronin ($625M): compromised validator keys. Wormhole ($325M): signature
verification bug. Nomad ($190M): a routine upgrade zeroed the security check
and *anyone* could copy-paste the exploit. **Rule:** bridges concentrate risk
exactly where attackers look â€” verify, multisig, and bug bounties or don't
bridge size.

## The pattern across all of them

Small code, huge assumptions: "callers are honest," "prices are true,"
"keys are safe," "upgrades are careful." Audits catch bug *classes*, not
broken assumptions â€” which is why economic design review matters as much as
code review.

> Every hack was someone's tuition. The curriculum is public, the tuition is
> optional â€” study the case files before depositing anywhere new.

**Next lesson:** oracles and off-chain data.