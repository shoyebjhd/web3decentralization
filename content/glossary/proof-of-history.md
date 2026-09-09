---
title: "Proof of History"
related: [consensus, proof-of-stake, blockchain]
---

Proof of History (PoH) is Solana's clock-before-consensus trick: a verifiable
delay function stamps every event with a cryptographic timestamp, so validators
agree on *order* without talking to each other first. Consensus then only has
to agree the sequence is valid, which is much faster.

## Why it matters

PoH is why Solana is so fast — ordering is the expensive part of consensus,
and PoH pre-solves it. The trade-off is hardware: running the delay function
at speed needs serious machines, which pushes validators toward data centers
and feeds Solana's cloud-concentration weakness.

**Related:** [consensus](consensus.md) ·
[proof of stake](proof-of-stake.md) · [blockchain](blockchain.md)