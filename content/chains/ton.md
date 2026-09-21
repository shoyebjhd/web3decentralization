---
title: "Toncoin (TON) Decentralization Audit"
description: "chain: ton name: Toncoin (TON) consensus: Proof of Stake â€” sharded masterchain + workchains related: [proof-of-stake, sharding, validator, layer-1, me..."
---

# Toncoin (TON) Decentralization Audit

Toncoin is the Layer 1 built inside Telegram's orbit. Architecturally it is a
sharded proof-of-stake network: a masterchain that finalizes state changes from
parallel shards (workchains, then shardchains under them), with validators
staking TON to secure the whole tree. Its decentralization question is whether a
chain designed for *messaging-scale* throughput can also hold *decentralization
scale* â€” and the audit surface is unusually interesting because its adoption
distillery is a single messaging app.

## Why it matters

TON's decentralization is best read as a story of two tensions:

- **Massive reach, narrow distribution:** Telegram gives the chain extraordinary
  user onboarding, but dependence on a single app's default choices is a
  governance and infrastructure concentration that validator counts won't show.
- **Sharding adds validators but also adds relationships:** more shards mean
  more validator positions and more stake spread (good for Nakamoto-style
  metrics), but the validator relationship to the core team remains the
  real question mark this audit has to dig past.

## What to watch

- **Masterchain vs. shardchain validator set:** who can propose to the
  masterchain is the controlling hand, regardless of total shard count.
- **Stake distribution:** TON's early allocation and foundation weight dominate
  the capital pillar, which is where composite scores are most sensitive.
- **App dependence:** the single-app distribution channel is the strongest
  real-world decentralization counterweight this chain carries.

## See it live

- [Interactive audit & scorecard](/terminal/chains/ton)
- [Run Toncoin in the terminal](/terminal/?tool=nakamoto-coefficient&chain=ton)
