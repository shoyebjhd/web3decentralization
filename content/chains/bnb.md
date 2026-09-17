---
chain: bnb
name: BNB Chain
consensus: Proof of Stake Authority (PoSA) — validator committee
related: [proof-of-stake, validator, staking, exchange, layer-1]
lastmod: 2026-09-13
---

# BNB Chain Decentralization Audit

BNB Chain is the Layer 1 built around BNB, the token of the largest centralized
crypto exchange. Its consensus is a Proof of Staked Authority (PoSA) hybrid: a
rotating committee of validators, chosen in part by stake, who take turns
producing blocks. For a decentralization audit, the design tension is right at
the front door — it is permissioned at the edges by the exchange's own
relationships, and that is both the network's speed and its soft spot.

## Why it matters

BNB Chain's decentralization story is the clearest case study of *who is inside
the validator committee* mattering more than *how many are in it*. The set is
large and rotates, but entry depends on validator relationships and BNB capital,
not open permissionlessness — so when the live score looks good on raw counts,
the honest question is whether the same actors could silently concentrate
committee seats. That's the difference between a score and an actual audit.

## What to watch

- **Validator committee size + rotation period** vs. the stake-weighted
  distribution — count doesn't equal spread.
- **Token concentration:** how much of BNB supply the exchange and its
  affiliates control is a governance + capital pillar issue, and it is the
  single most defensible metric in this audit's software/capital split.
- **Exchange dependence:** because the chain brands and is branded by a single
  large exchange, regulatory and reputational risk is itself a decentralization
  input that no validator count will capture.

## See it live

- [Interactive audit & scorecard](/terminal/chains/bnb)
- [Run BNB Chain in the terminal](/terminal/?tool=nakamoto-coefficient&chain=bnb)
