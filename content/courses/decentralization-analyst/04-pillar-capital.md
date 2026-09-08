---
title: "Pillar 2: Capital"
order: 4
course: decentralization-analyst
---

Capital is about **who owns the network.** Token and stake distribution decide
governing power and validator influence — and they're recorded on-chain
forever, so this is the most *auditable* pillar.

## What we actually measure

- **Stake distribution** — how evenly staked value is spread across
  validators. Extremely concentrated = a few giant pools run the chain.
- **Gini-style concentration** — one number for "how unequal is ownership?"
  (Higher = more unequal.)
- **Top-entity share** — the biggest whales, exchanges, and foundations.
- **Genesis/airdrop quality** — how the token *began*: broad airdrop or insider
  pre-mine. Distribution history is permanent.

## Reading the scores

| | Score | Reading |
|---|:---:|---|
| Bitcoin | 78/100 | Broad ownership, but top wallets are exchanges (custody pooling) |
| Ethereum | 72/100 | Massive distribution; caveats on liquid-staking + whale wallets |
| Solana | 48/100 | Notably concentrated stake among big validators |
| XRP | 35/100 | The weak pillar — very concentrated initial distribution |

## The two killer questions

1. **Who controls a compromising share of the stake?** If three liquid-staking
   providers or three exchanges can together control majority stake, capital
   concentration cancels out validator count.
2. **Is the token's story in its code?** Check the
   [tokenomics](glossary/tokenomics.md): unlock schedule, insider allocation,
   founding distribution. "Community airdrop" vs "foundation pre-mine" is a
   verifiable, permanent fact.

## Warning: the masquerade

A chain can have *perfect* infrastructure and still be controlled through
capital — because stake decides who validates and who votes. This is exactly
why W3D's [liquid-staking](glossary/liquid-staking.md) analysis exists: one
provider holding 30%+ of staked ETH quietly concentrates the whole network.

> In PoS, capital distribution **is** power distribution. Follow the stake,
> and you follow control.

**Next lesson:** the Governance pillar — who can change the rules?