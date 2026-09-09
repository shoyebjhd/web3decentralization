---
title: "Reading Contracts and Audits"
order: 6
course: defi-101
---

You don't need to code to do basic contract due diligence. Fifteen minutes on
an explorer plus the right checklist filters out most disasters before money
moves.

## The 10-minute contract check

1. **Verified code?** On Etherscan, unverified = unreadable = walk away.
2. **Holders:** top-heavy distribution or dev wallets with unlocks?
3. **Owner/admin functions:** can someone pause, mint, blacklist, or upgrade?
   (Proxy contracts = rules can change under you.)
4. **Liquidity locks:** LP tokens locked/burned, or removable tomorrow
   ([rug pull](glossary/rug-pull.md) fuel)?
5. **Age + volume:** real usage over time beats a week-old chart.

## Reading an audit (correctly)

A [smart-contract audit](glossary/smart-contract-audit.md) lists findings by
severity — focus on: how many criticals/highs, were they fixed or merely
"acknowledged," and has the code changed since the audit commit? An audit of
v1 means nothing for the v3 rewrite holding your money now.

## Approvals: the permission you forgot

Every "Approve" grants a contract ongoing spending rights on a token. Hygiene:
approve exact amounts when possible, revoke stale approvals periodically, and
use a separate low-value wallet for experimental dApps. Unlimited approvals
to unaudited contracts are how "I never sent anything" wallets still drain.

## Oracles and dependencies

Ask what price feed the protocol trusts ([oracle](glossary/oracle.md) risk),
what it builds on ([composability](glossary/composability.md) risk), and who
holds upgrade keys (governance-theater risk). Each answer is a line in your
personal risk model.

> Audit the money path: where it enters, who can move it, and what happens on
> the worst day. If any answer is "trust us," price it as unsecured.

**Next lesson:** bridges and cross-chain.