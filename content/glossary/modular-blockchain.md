---
title: "Modular Blockchain"
related: [layer-1, layer-2, data-availability]
---

A modular blockchain splits duties across specialized layers — one chain for
execution, another for settlement, another for
[data availability](data-availability.md) — instead of one "monolithic" chain
doing everything. Ethereum's rollup-centric roadmap is the flagship example.

## Why it matters

Modularity is how blockchains scale without demanding supercomputer
validators: each layer stays light enough for ordinary participants, which
protects decentralization while throughput grows. The trade-off is complexity —
bridges between layers become the new trust points to audit.

## Modular vs monolithic

A **monolithic** chain (Solana-style) does execution, settlement, and data
availability in one place: simpler, faster, but every validator must handle
everything — pushing hardware requirements up and participation down. A
**modular** stack splits the job so each layer stays verifiable on modest
hardware. Neither is categorically "more decentralized": monoliths
concentrate validator power through hardware costs; modular stacks distribute
it across layers but add bridge and sequencing trust points. Judge systems,
not slogans — count independent operators at *every* layer.

**Related:** [layer 1](layer-1.md) · [layer 2](layer-2.md) ·
[data availability](data-availability.md)