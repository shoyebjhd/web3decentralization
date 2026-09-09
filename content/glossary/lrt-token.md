---
title: "LRT Token"
related: [restaking, liquid-staking, eigenlayer]
---

LRTs (liquid restaking tokens) are tradeable receipts for
[restaked](glossary/restaking.md) positions: deposit stETH or ETH into
[EigenLayer](glossary/eigenlayer.md) via a protocol, receive an LRT, keep
earning (and keep the receipt liquid for DeFi). Ether.fi, Renzo, and Kelp
pioneered the category.

## How it works

Same pattern as liquid staking, one floor up: the protocol manages operators
and AVS selection; you hold a token tracking your share plus accumulated
rewards. The LRT itself becomes DeFi collateral — lent, looped, and
leveraged across protocols.

## Why it matters for decentralization

LRTs decide *who* restakes at scale: a handful of large issuers choosing
operators for everyone concentrates the exact power restaking was meant to
distribute. Issuer diversity, operator sets, and withdrawal mechanics are the
three numbers that matter.

## Risks & trade-offs

Depegs when withdrawals queue or AVSs slash; looped leverage amplifying
shocks; smart-contract stacking (LRT protocol + EigenLayer + AVS = three
audits to trust); and points-farming distorting honest yield signals.

## FAQ

**LRT vs LST?** LST = liquid *staking* (Ethereum yield). LRT = liquid
*restaking* (Ethereum yield + AVS rewards + AVS slashing risk).

**Can LRTs depeg?** Yes — they're market-priced claims, not redemptions on
demand. Queues and fear both gap the price.

**Who picks the operators?** The LRT issuer — which is precisely the
centralization question to ask before depositing.

**Related:** [restaking](glossary/restaking.md) ·
[liquid staking](glossary/liquid-staking.md) · [EigenLayer](glossary/eigenlayer.md)