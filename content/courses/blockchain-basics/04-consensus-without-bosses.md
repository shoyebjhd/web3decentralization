---
title: "Consensus Without Bosses"
order: 4
course: blockchain-basics
---

[Consensus](glossary/consensus.md) is how strangers agree on one history with
no referee. Every design answers the same attack: what stops someone from
voting a thousand times ([Sybil](glossary/sybil-attack.md)) or rewriting the
past? The answers differ — the question never changes.

## The three families

**Proof of Work** — vote with electricity. Miners burn energy guessing hashes;
rewriting history means out-burning everyone ([mining](glossary/mining.md)).
Security = physical cost. Cost = energy use.

**Proof of Stake** — vote with money at risk. Validators lock
[stake](glossary/staking.md); misbehavior gets slashed. Security = financial
cost. Cost = capital concentration ([delegation](glossary/delegation.md)
pools, liquid staking giants).

**BFT voting** (Tendermint-style) — known validator sets vote in rounds;
finality is instant once two-thirds agree. Security = honest supermajority.
Cost = capped, permissioned-ish sets.

## Forks: what disagreement looks like

When nodes run incompatible rules, history splits — a [fork](glossary/fork.md).
Soft forks tighten rules compatibly; hard forks break them (Bitcoin → Bitcoin
Cash). Forks are governance made visible: the chain follows whichever rules
the economic majority enforces.

## How to judge any mechanism (the analyst's three)

1. **What does an attack cost, in what currency?** (Electricity? Stake?
   Bribing 12 validators?)
2. **Who earns the rewards, and how concentrated?**
3. **What happens on the worst day?** (Try the outage simulator on the
   [terminal](https://web3decentralization.com/terminal/).)

> Consensus is applied game theory: make honesty profitable and attacks
> ruinous, then let strangers act in self-interest. Every mechanism is that
> sentence with different numbers.

**Next lesson:** public vs private vs permissioned chains.