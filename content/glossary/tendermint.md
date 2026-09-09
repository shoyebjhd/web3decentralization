---
title: "Tendermint"
related: [consensus, proof-of-stake, validator]
---

Tendermint (now CometBFT) is the consensus engine behind Cosmos and many
app-chains: validators take turns proposing blocks and vote in two rounds,
finalizing each block instantly with no forks once two-thirds agree. It gives
deterministic, one-second finality.

## Why it matters

Tendermint-style BFT is the reason Cosmos chains feel instant — finality is
immediate, not probabilistic like Bitcoin's six confirmations. The cost is a
capped validator set (Cosmos Hub: 180), so the Nakamoto Coefficient of the
active set is the number that actually matters.

**Related:** [consensus](consensus.md) ·
[proof of stake](proof-of-stake.md) · [validator](validator.md)