---
title: "Byzantine Generals Problem"
related: [consensus, proof-of-work, proof-of-stake]
---

The Byzantine Generals Problem asks: how do separated generals coordinate an
attack when messengers may lie and traitors may vote wrong? It's the abstract
version of decentralized consensus — agreeing on truth with untrusted,
potentially malicious participants and no commander.

## Why it matters

Every consensus mechanism is a proposed solution to this 1982 puzzle: PoW
answers with unforgeable cost, PoS with slashable stake, BFT voting with
supermajority rules. When someone claims a "new consensus breakthrough," ask
which assumption about traitors changed — the problem is provably hard, so
every solution trades something (speed, openness, or energy) to solve it.

**Related:** [consensus](glossary/consensus.md) ·
[proof of work](glossary/proof-of-work.md) · [proof of stake](glossary/proof-of-stake.md)