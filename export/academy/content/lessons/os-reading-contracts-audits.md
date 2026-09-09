---
title: "Reading Contracts and Audits"
slug: "os-reading-contracts-audits"
canonical_url: "https://web3decentralization.com/lesson/os-reading-contracts-audits/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:47:03"
course: "defi-101"
course_title: "DeFi 101"
difficulty: "beginner"
order: "106"
---
You don't need to code to do basic contract due diligence. Fifteen minutes on an explorer plus the right checklist filters out most disasters before money moves.

## The 10-minute contract check

1. **Verified code?** On Etherscan, unverified = unreadable = walk away. 2. **Holders:** top-heavy distribution or dev wallets with unlocks? 3. **Owner/admin functions:** can someone pause, mint, blacklist, or upgrade?    (Proxy contracts = rules can change under you.) 4. **Liquidity locks:** LP tokens locked/burned, or removable tomorrow    ([rug pull](https://web3decentralization.com/glossary/rug-pull/) fuel)? 5. **Age + volume:** real usage over time beats a week-old chart.

## Reading an audit (correctly)

A [smart-contract audit](https://web3decentralization.com/glossary/smart-contract-audit/) lists findings by severity — focus on: how many criticals/highs, were they fixed or merely "acknowledged," and has the code changed since the audit commit? An audit of v1 means nothing for the v3 rewrite holding your money now.

## Approvals: the permission you forgot

Every "Approve" grants a contract ongoing spending rights on a token. Hygiene: approve exact amounts when possible, revoke stale approvals periodically, and use a separate low-value wallet for experimental dApps. Unlimited approvals to unaudited contracts are how "I never sent anything" wallets still drain.

## Oracles and dependencies

Ask what price feed the protocol trusts ([oracle](https://web3decentralization.com/glossary/oracle/) risk), what it builds on ([composability](https://web3decentralization.com/glossary/composability/) risk), and who holds upgrade keys (governance-theater risk). Each answer is a line in your personal risk model.

> Audit the money path: where it enters, who can move it, and what happens on
> > the worst day. If any answer is "trust us," price it as unsecured.

**Next lesson:** bridges and cross-chain.
