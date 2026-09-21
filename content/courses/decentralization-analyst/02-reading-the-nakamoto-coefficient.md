---
title: "Reading the Nakamoto Coefficient"
order: 2
course: decentralization-analyst
description: "The [Nakamoto Coefficient](glossary/nakamoto-coefficient.md) is the single."
---

The [Nakamoto Coefficient](glossary/nakamoto-coefficient.md) is the single
most useful decentralization number in crypto. It answers: **how many
independent entities do you have to corrupt or control to compromise the
network?**

A coefficient of 1 means one entity can take over. A coefficient of 24 means
you'd need 24 independent actors working together. **Higher = safer.**

## How it's computed

Rank the biggest holders of some resource (hash power, stake, validators,
clients). Add them up largest-first until the cumulative share passes the
compromise threshold (usually ~33â€“34% or 51% for different attacks). The count
you reached is the Nakamoto Coefficient for that resource.

## The two traps

1. **Node count â‰  coefficient.** "10,000 validators!" is meaningless if 20
   pools control 51% of the stake. The coefficient counts *independent
   decision-makers*, not machines.
2. **One resource â‰  the whole network.** A chain can have a great validator
   coefficient (320 independent validators) and a software coefficient of
   **1** â€” if 100% of clients run a single codebase. Always ask *which
   resource* a coefficient refers to.

## Real examples from W3D

- **Bitcoin (infra â‰ˆ4):** ~17,800 nodes, but mining pools concentrate hash â€”
  a handful of pools approach the threshold. Strong overall, thanks to other
  pillars.
- **Polkadot (>90):** the most diffuse validator set in crypto.
- **Solana (â‰ˆ19):** meaningfully good validator dispersion, hurt elsewhere by
  cloud hosting.
- **Arbitrum (4 inherited):** security inherited from Ethereum's L1 â€” its own
  coefficient would be 1 (single sequencer).

## Practicing as an analyst

When you see a Nakamoto Coefficient, ask:
- Which resource is it measuring?
- What's the threshold (49%? 34%)?
- What does the *weakest* resource look like?

> A chain's true decentralization is its **worst** Nakamoto Coefficient across
> resources â€” the attacker takes the path of least resistance.

**Next lesson:** the Infrastructure pillar in depth.