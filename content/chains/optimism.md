---
chain: optimism
name: Optimism
consensus: Optimistic Rollup (OP Stack) — settles to Ethereum
related: [optimistic-rollup, op-stack, superchain, sequencer, proposer-builder-separation]
lastmod: 2026-09-13
---

# Optimism Decentralization Audit

Optimism is an Optimistic Rollup on Ethereum with an unusual ambition: instead
of competing with other L2s, it published the OP Stack so that Base, and a dozen
other chains, could all run the same software and form a "Superchain." For a
decentralization audit, that choice is the story.

## Why it matters

Single-chain decentralization scores miss what Optimism is building a *catalog*
for. The Superchain thesis is that the *network* is the unit you audit: if many
chains share a rollup stackchers, an exploitable bug isn't one chain's problem —
it's a shared one, and the things you must trust (sequencer, fault-proving,
upgrade keys) are the same code everywhere. So Optimism's decentralization
questions radar look slightly different:

- **Sequencer:** who proposes order, and under what fee auction?
- **Fault challenge period + provers:** can withdrawals actually be challenged,
  and by whom, before finality?
- **Upgrade governance:** who holds the keys that can change the rules, and is
  there a delay/timelock so the community can react?

## What to watch

The honest soft spot in OP Stack L2s is that the *starter* configuration has a
single sequencer and single challenge window — decentralization of the proof
network is a gradual rollout, and the pace varies chain by chain. When you read
the live score, watch the software-pillar split between "sequencer operator"
and "challenger diversity" — that's where the real signal is.

## See it live

- [Interactive audit & scorecard](/terminal/chains/optimism)
- [Run Optimism in the terminal](/terminal/?tool=nakamoto-coefficient&chain=optimism)
