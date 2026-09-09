---
title: "Sequencer"
related: [rollup, layer-2, optimistic-rollup]
---

The sequencer is the operator that orders transactions on a rollup —
collecting user transactions, executing them, and posting batches to Ethereum.
Today nearly every major rollup runs *one* centralized sequencer, making it
the system's most obvious choke point.

## Why it matters

A single sequencer can theoretically censor, reorder for MEV, or halt the
chain by going offline (users can usually force-exit via L1, slowly and
painfully). Decentralizing sequencers — shared sequencing networks, based
rollups — is the industry's acknowledged hardest remaining problem, and the
main reason rollup infrastructure scores stay capped.

**Related:** [rollup](glossary/rollup.md) · [layer 2](glossary/layer-2.md) ·
[optimistic rollup](glossary/optimistic-rollup.md)