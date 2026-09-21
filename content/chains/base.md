---
title: "Base Decentralization Audit"
description: "chain: base name: Base consensus: Optimistic Rollup (OP Stack) â€” settles to Ethereum related: [optimistic-rollup, op-stack, superchain, alternation, s..."
---

# Base Decentralization Audit

Base is the Coinbase-built Layer 2 â€” an Optimistic Rollup on the OP Stack that
borrows its security from Ethereum and adds faster, cheaper settlement. Because
it settles disputes and finality back to the L1, its *baseline* decentralization
inherits Ethereum's â€” but the question this audit actually answers is where Base
stops inheriting and starts deciding for itself.

## What an L2 inherits vs. decides

- **Inherits from Ethereum:** security, finality, data availability, censorship
  resistance of the settlement layer, and a huge share of composable liquidity.
- **Decides for itself:** who runs the sequencer, how contention is metered
  (op-priority-fee auctions), whether withdrawals can be challenged in time, and
  how upgrade keys are held.

## Why it matters

Base matters because it's the single biggest on-ramp of *retail* Ethereum L2
activity â€” and retail gravity is a decentralization double-edge. More users,
liquidity, and tooling diversity make the network harder to isolate from a
governance or regulatory angle; but concentrated sequencer operation by a single
large actor is exactly the kind of "technically permissionless, practically
single-operator" posture that audit after audit flags. Knowing which is true
here is knowing whether Base's decentralization is real or reputational.

## See it live

- [Interactive audit & scorecard](/terminal/chains/base)
- [Run Base in the terminal](/terminal/?tool=nakamoto-coefficient&chain=base)
