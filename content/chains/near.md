---
chain: near
name: Near
consensus: Nightshade Sharding + Doomslug PoS
composite: 60.3
live_validators: 423
live_validators_source: near-public-rpc
live_nakamoto_33: 9
live_nakamoto_source: computed
live_updated: 2026-09-10T07:35:22.996Z
lastmod: 2026-09-10
---

# Near Decentralization Audit

Near is a sharded proof-of-stake chain built for giant-scale performance with Nightshade sharding. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 60.3 / 100** · *Sharded validator scaling via Chunk-Only Producers; strong ecosystem DAOs offset by single-client core*

## Four pillars

- **Infrastructure (30%)** — 66/100 · Nakamoto 24 · ~250+ validators; Chunk-Only Producer model lowers barrier to entry across shards
- **Capital (25%)** — 56/100 · Nakamoto 7 · Broad stake distribution supported by active staking pools and liquid staking protocols
- **Governance (25%)** — 62/100 · Nakamoto 0 · Progressive decentralization via Community House, NDC (Near Digital Collective), and on-chain voting
- **Software (20%)** — 55/100 · Nakamoto 1 · Primary Rust `nearcore` codebase with independent RPC nodes and WebAssembly runtimes

## What the score means

- Infrastructure (66): A healthy Nakamoto Coefficient of ~24 places Near among the more resilient PoS networks in terms of validator collusion resistance.
- Capital (56): Staking is distributed across diverse pools and institutional validators, yielding a moderate Gini coefficient of ~0.84.
- Governance (62): Near has actively decentralized treasury governance to grassroots working groups and the Near Digital Collective (NDC), reducing direct foundation control.
- Software (55): While dependent on `nearcore`, the protocol's WASM smart contract layer and modular RPC ecosystem offer robust developer flexibility.

## See it live

- [Interactive audit & scorecard](/terminal/chains/near)
- [Embed this scorecard](/terminal/embed/card.html?chain=near)
- Compare against other chains in the [terminal](/terminal/)
