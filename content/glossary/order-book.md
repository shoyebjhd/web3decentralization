---
title: "Order Book"
related: [exchange, market-maker, liquidity]
---

An order book is the classic exchange engine: a live list of buy orders (bids)
and sell orders (asks) at each price, matched by the exchange. The gap
between best bid and best ask is the spread; deep books mean stable prices.

## Why it matters

Order books concentrate [liquidity](glossary/liquidity.md) at specific prices
(unlike AMMs, which spread it everywhere), so professionals prefer them for
size and precision. On-chain order books (dYdX-style) prove DEXs can do
precision too — at the cost of speed infrastructure that often recentralizes
matching. Spread + depth tell you instantly whether a market is healthy.

**Related:** [exchange](glossary/exchange.md) ·
[market maker](glossary/market-maker.md) · [liquidity](glossary/liquidity.md)