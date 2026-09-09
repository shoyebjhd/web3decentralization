---
title: "Oracles and Off-Chain Data"
order: 7
course: smart-contracts
---

Contracts can't see the world — no prices, no weather, no scores. An
[oracle](glossary/oracle.md) delivers outside facts on-chain as data contracts
can use. Every DeFi protocol that touches real-world value depends on one,
which makes oracles the most under-appreciated attack surface in crypto.

## The designs, strongest first

1. **Decentralized networks** (Chainlink): many independent node operators
   report, outliers get cut, answers aggregate. Expensive to corrupt at scale.
2. **TWAPs** (Uniswap v3): time-weighted average prices from deep pools —
   manipulation requires sustaining distortion, which costs real money.
3. **Single reporters / admin feeds:** one key publishes "the price." Fast,
   cheap, and one bribe from catastrophe.

## How oracle failures actually play out

- Thin-pool spot price trusted directly → [flash-loan](glossary/flash-loan.md)
  warp → protocol lends millions against fantasy
  [collateral](glossary/collateral.md).
- Stale feeds in volatility → liquidations at wrong prices, or no
  liquidations while bad debt compounds.
- Compromised admin keys → attacker simply *publishes* the price they need.

## Evaluating any protocol's oracle (three questions)

1. **Source:** decentralized network, TWAP, or single feed?
2. **Staleness guards:** heartbeat checks, deviation thresholds, fallback
   feeds, circuit breakers?
3. **What breaks if it lies?** (Lending pylons collapse; AMMs barely notice.)

> A contract is only as truthful as its oracle. "Trustless" systems with
> trusted price feeds are trusts with extra steps — count them.

**Next lesson:** building safely, and where to go from here.