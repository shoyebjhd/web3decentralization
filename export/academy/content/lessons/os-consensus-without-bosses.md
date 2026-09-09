---
title: "Consensus Without Bosses"
slug: "os-consensus-without-bosses"
canonical_url: "https://web3decentralization.com/lesson/os-consensus-without-bosses/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:52:57"
course: "blockchain-basics"
course_title: "Blockchain Basics"
difficulty: "beginner"
order: "104"
---
[Consensus](https://web3decentralization.com/glossary/consensus/) is how strangers agree on one history with no referee. Every design answers the same attack: what stops someone from voting a thousand times ([Sybil](https://web3decentralization.com/glossary/sybil-attack/)) or rewriting the past? The answers differ — the question never changes.

## The three families

**Proof of Work** — vote with electricity. Miners burn energy guessing hashes; rewriting history means out-burning everyone ([mining](https://web3decentralization.com/glossary/mining/)). Security = physical cost. Cost = energy use.

**Proof of Stake** — vote with money at risk. Validators lock [stake](https://web3decentralization.com/glossary/staking/); misbehavior gets slashed. Security = financial cost. Cost = capital concentration ([delegation](https://web3decentralization.com/glossary/delegation/) pools, liquid staking giants).

**BFT voting** (Tendermint-style) — known validator sets vote in rounds; finality is instant once two-thirds agree. Security = honest supermajority. Cost = capped, permissioned-ish sets.

## Forks: what disagreement looks like

When nodes run incompatible rules, history splits — a [fork](https://web3decentralization.com/glossary/fork/). Soft forks tighten rules compatibly; hard forks break them (Bitcoin → Bitcoin Cash). Forks are governance made visible: the chain follows whichever rules the economic majority enforces.

## How to judge any mechanism (the analyst's three)

1. **What does an attack cost, in what currency?** (Electricity? Stake?    Bribing 12 validators?) 2. **Who earns the rewards, and how concentrated?** 3. **What happens on the worst day?** (Try the outage simulator on the    [terminal](https://web3decentralization.com/terminal/).)

> Consensus is applied game theory: make honesty profitable and attacks
> > ruinous, then let strangers act in self-interest. Every mechanism is that
> > sentence with different numbers.

**Next lesson:** public vs private vs permissioned chains.
