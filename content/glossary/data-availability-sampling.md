---
title: "Data Availability Sampling"
related: [data-availability, celestia, modular-blockchain]
---

Data-availability sampling (DAS) lets light clients verify giant blocks by
checking tiny random pieces: if enough random samples are available, the
whole block is (probably) available — with mathematical guarantees that
strengthen as more light clients sample. Full danksharding depends on it.

## How it works

Block data gets erasure-coded (reconstructible from any sufficient subset),
then light nodes request random chunks. A withholding attacker must hide so
much data that sampling *will* catch them. Security scales with the sampler
count — more phones checking, safer the chain.

## Why it matters for decentralization

DAS is what makes massive throughput compatible with home verification: blocks
can grow 100x while light clients do *less* work, not more. Without it,
scaling means datacenter nodes and the slow death of independent
verification. It's the least-hyped, most-load-bearing primitive in the
scaling roadmap.

## Risks & trade-offs

Unproven at full scale (adversarial testing ongoing); honest-majority-of-samplers
assumptions; complexity in client software; and the gap between theory papers
and production incidents yet to happen.

## FAQ

**DAS vs full nodes?** Complementary: full nodes verify everything, samplers
verify availability cheaply. Together they cover correctness + data.

**Who samples?** Any light client — wallets, phones, browsers. The more, the
safer, automatically.

**Is it live?** [Celestia](glossary/celestia.md) pioneered production DAS;
Ethereum's version arrives with full danksharding stages.

**Related:** [data availability](glossary/data-availability.md) ·
[Celestia](glossary/celestia.md) · [modular blockchain](glossary/modular-blockchain.md)