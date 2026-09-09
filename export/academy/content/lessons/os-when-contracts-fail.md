---
title: "When Contracts Fail: Hack Case Studies"
slug: "os-when-contracts-fail"
canonical_url: "https://web3decentralization.com/lesson/os-when-contracts-fail/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:52:57"
course: "smart-contracts-for-beginners"
course_title: "Smart Contracts for Beginners"
difficulty: "beginner"
order: "106"
---
Theory ends here. Each of these hacks taught the industry a rule — learn them cheaply, from history instead of your wallet.

## The DAO (2016) — reentrancy

An attacker recursively withdrew ETH before the balance updated — $60M gone, Ethereum forked to undo it. **Rule:** update state *before* sending funds (checks-effects-interactions), and get [audited](https://web3decentralization.com/glossary/smart-contract-audit/).

## Parity multisig (2017) — unprotected init

Someone claimed ownership of a shared library contract and self-destructed it, freezing ~$150M permanently. **Rule:** initialization functions need access control, and shared libraries are single points of failure.

## Oracle exploits (2020–forever) — price lies

Attackers used [flash loans](https://web3decentralization.com/glossary/flash-loan/) to warp thin-pool prices that lending protocols trusted, borrowing millions against fake [collateral](https://web3decentralization.com/glossary/collateral/) value. **Rule:** oracles must be manipulation-resistant (TWAPs, multiple sources, circuit breakers).

## Bridge hacks (2022–2023) — trusted verifiers

Ronin ($625M): compromised validator keys. Wormhole ($325M): signature verification bug. Nomad ($190M): a routine upgrade zeroed the security check and *anyone* could copy-paste the exploit. **Rule:** bridges concentrate risk exactly where attackers look — verify, multisig, and bug bounties or don't bridge size.

## The pattern across all of them

Small code, huge assumptions: "callers are honest," "prices are true," "keys are safe," "upgrades are careful." Audits catch bug *classes*, not broken assumptions — which is why economic design review matters as much as code review.

> Every hack was someone's tuition. The curriculum is public, the tuition is
> > optional — study the case files before depositing anywhere new.

**Next lesson:** oracles and off-chain data.
