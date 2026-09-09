---
title: "Automated Market Maker"
related: [decentralized-exchange, liquidity, smart-contract]
---

An automated market maker (AMM) is a DEX design with no order book: traders
swap against a pool of tokens, and a formula (usually `x * y = k`) sets the
price automatically. [Liquidity](liquidity.md) providers deposit both tokens
and earn a cut of every trade.

## Why it matters

AMMs (Uniswap pioneered them) made permissionless listing possible — anyone
can create a market in seconds, no exchange approval needed. The costs are
borne by LPs: [impermanent loss](impermanent-loss.md), and by traders:
[slippage](slippage.md) in thin pools.

**Related:** [decentralized exchange](decentralized-exchange.md) ·
[liquidity](liquidity.md) · [smart contract](smart-contract.md)