---
title: "Bundler"
slug: "bundler"
canonical_url: "https://web3decentralization.com/glossary/bundler/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 07:52:59"
---
A bundler is the permissionless worker of **ERC-4337** account abstraction: it collects user operations from the mempool, bundles them into one on-chain transaction, and earns fees for the service. Anyone can run one — no license, no staking requirement.

## How it works

Users sign intents instead of raw transactions; bundlers package compatible operations (checking each wallet's validation logic and **paymaster** sponsorship), submit the bundle, and get paid from per-operation fees. Competition between bundlers sets the market price for inclusion.

## Why it matters for decentralization

Bundlers replace the centralized relayers of old meta-transactions with an open market — the design only stays censorship-resistant if many independent bundlers actually operate. Watch bundler concentration the way you watch mining pools: whoever packages transactions can delay or exclude them.

## Risks & trade-offs

Early centralization (a few professional bundlers dominate); reputation/spam dynamics in the alternative mempool; and UX dependence — if bundlers vanish, smart wallets stall even though funds stay safe.

## FAQ

**Do I choose a bundler?** Your wallet does, automatically — picking by fee and reliability, like gas price selection today.

**Can a bundler steal my funds?** No — it can only include your pre-signed operation or ignore it. Censorship, not theft, is the risk.

**Why not just use normal transactions?** Smart wallets *can't* — their logic needs the ERC-4337 flow. Bundlers are the price of programmable accounts.

## Related terms

**ERC-4337** ·
[account abstraction](https://web3decentralization.com/glossary/account-abstraction/) · **paymaster**
