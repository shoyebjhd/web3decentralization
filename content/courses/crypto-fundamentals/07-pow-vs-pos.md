---
title: "Proof of Work vs Proof of Stake"
order: 7
course: crypto-fundamentals
---

Every blockchain needs [consensus](glossary/consensus.md): a way for thousands
of independent computers to agree on what happened. Today there are two major
systems — and this one decision says a lot about a network's
[decentralization](glossary/decentralization.md).

## Proof of Work (PoW) — "show the work"

Miners race to find a number that fits the network's target — actually solving
a pointless math problem that's expensive in electricity. Whoever wins proposes
the next block ([mining](glossary/mining.md)).

- **Security comes from physical cost.** Rewriting history means paying more
  electricity than the whole honest network.
- **Anyone can join** with hardware. No permission.
- **Cost:** enormous energy use. That's the famous Bitcoin criticism, and the
  reason PoS was invented.

## Proof of Stake (PoS) — "money at risk"

Validators [stake](glossary/staking.md) real tokens as collateral. They're
chosen to propose/confirm blocks in proportion to what they've staked and risk
losing it if they misbehave ("slashing").

- **Security comes from financial cost.** Misbehave and you lose your stake.
- **Cheap to run** — no racing hardware, just an honest machine.
- **Cost:** it tends to concentrate power — the biggest pools attract the most
  stake, which is a real decentralization question.

## Which is "more decentralized"?

Neither, on its own. Everything depends on *distribution*:

- PoW is decentralized if hash power is spread across many independent miners
  (and not a few giant pools).
- PoS is decentralized if stake is spread across many independent validators
  (and not one [liquid-staking provider](glossary/liquid-staking.md)).

That's exactly what W3D measures — not "PoW vs PoS" marketing, but who
actually holds the power. Try it on the
[decentralization terminal](https://web3decentralization.com/terminal/).

**Next lesson:** staking and earning on your crypto.