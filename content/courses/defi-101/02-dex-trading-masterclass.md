---
title: "DEX Trading Masterclass"
order: 2
course: defi-101
---

A [decentralized exchange](glossary/decentralized-exchange.md) lets you trade
from your own wallet — no account, no custody, no permission. This lesson is
the complete mechanics: how prices form, where your money leaks, and how to
trade without donating to bots.

## How AMMs price your trade

Most DEXs are [automated market makers](glossary/automated-market-maker.md):
a pool holds two tokens, and the `x * y = k` formula reprices after every
swap. Big trade relative to pool size = big price move against you. That
movement is [slippage](glossary/slippage.md).

## The costs nobody lists

1. **Slippage** — set tolerance tight (0.5–1% for majors); loose tolerance is
   a [sandwich attack](glossary/sandwich-attack.md) invitation.
2. **Price impact warning** — if the UI flashes >2–3%, shrink the trade or
   find deeper [liquidity](glossary/liquidity.md).
3. **Gas** — complex routes cost more; failed transactions still cost gas.
4. **MEV** — your visible pending swap is someone's profit opportunity
   ([front-running](glossary/front-running.md)).

## The professional routine

1. Verify the DEX domain yourself; bookmark it.
2. Check the token contract on an explorer (verified code, sane holders).
3. For size, route via a [DEX aggregator](glossary/dex-aggregator.md).
4. Set slippage deliberately, review the full quote (rate + fee + impact),
   then confirm in-wallet — reading what you're actually signing.
5. Never approve unlimited spending when a limited approval works.

## Limit orders and perps (know they exist)

Spot swaps are lesson one. Beyond them: on-chain limit orders, and leveraged
[perpetual futures](glossary/perpetual-futures.md) — the latter liquidates
beginners professionally. Master spot first; treat leverage as a separate
education with its own tuition.

> On a DEX you are the trader, the compliance officer, and the security team.
> Act like all three and the bots eat someone else.

**Next lesson:** lending and borrowing.