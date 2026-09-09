---
title: "Proto-Danksharding"
related: [eip-4844, blobs, sharding, ethereum]
---

Proto-danksharding is the nickname for [EIP-4844](glossary/eip-4844.md): the
first step toward full danksharding, introducing [blobs](glossary/blobs.md)
and a separate data fee market without yet scaling to dozens of blobs per
block or adding sampling. "Proto" because the architecture is final but the
capacity isn't.

## How it works

Same mechanics as 4844 — blob-carrying transactions, 18-day retention,
independent pricing. Full danksharding later multiplies blob capacity ~64x
and adds [data-availability sampling](glossary/data-availability-sampling.md)
so light clients can verify huge blocks by checking random pieces.

## Why it matters for decentralization

The roadmap's core promise: scale data throughput while keeping validator
hardware requirements flat, so home stakers never get priced out. Every step
that raises throughput *without* raising node costs protects the validator
set's breadth — the metric infrastructure scoring watches most.

## Risks & trade-offs

Interim capacity still congests; sampling cryptography is complex and young;
and each upgrade is a coordination event where client diversity gets stress-tested.

## FAQ

**Is proto-danksharding the same as sharding?** Related but different: no
execution sharding here, just cheaper data. Full danksharding scales the data
layer; execution stays on rollups.

**When is full danksharding?** Multi-year roadmap, delivered in stages. Each
stage is a separate hard fork with its own testing.

**Does it help L1 fees?** Barely — it's an L2 scaling upgrade wearing an L1
hard fork's clothes.

**Related:** [EIP-4844](glossary/eip-4844.md) · [blobs](glossary/blobs.md) ·
[sharding](glossary/sharding.md) · [ethereum](glossary/ethereum.md)