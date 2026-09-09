---
title: "Tokens, Coins, and Standards"
order: 6
course: blockchain-basics
---

A **coin** powers its own chain (BTC, ETH, SOL) — it pays for security and
fees. A **token** lives on someone else's chain as a [smart contract](glossary/smart-contract.md)
(USDT on Ethereum, UNI, game items). Standards like [ERC-20](glossary/erc-20.md)
make tokens interoperable: build once, work in every wallet and exchange.

## The token zoo

- **Payment coins** (BTC, LTC): money-first, simplest thesis.
- **Platform coins** (ETH, SOL): fuel for computation; demand tracks usage.
- **Stablecoins** (USDC, DAI): pegged dollars; differ by backing (see the
  [stablecoin lesson](../defi-101/04-stablecoins-deep-dive.md)).
- **Governance tokens** ([UNI, ARB](glossary/governance-token.md)): votes with
  a price tag — and whale-concentration caveats.
- **NFTs** ([ERC-721](glossary/nft.md)): unique items, not interchangeable money.
- **Wrapped assets** ([WBTC](glossary/wrapped-token.md)): IOUs for
  cross-chain use, custodian risk included.

## Reading any token in 60 seconds

1. Coin or token? Which chain secures it?
2. [Max supply](glossary/max-supply.md) vs [circulating](glossary/circulating-supply.md)
   vs unlock schedule ([vesting](glossary/vesting.md))?
3. What is it *for* — fee fuel, votes, access, or pure speculation?
4. Who holds the big wallets (explorers don't lie)?

## Why standards matter more than tokens

ERC-20 did for assets what the web's HTTP did for pages: one interface, infinite
compatible tools. New standards (NFTs, soulbound, tokenized real-world assets)
follow the same playbook — the standard, not any single token, is the durable
innovation.

> Tokens are easy to create and hard to value. The standard tells you the
> mechanics; the distribution tells you the truth.

**Next lesson:** reading the chain — explorers and data.