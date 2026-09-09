---
title: "NEAR Protocol Decentralization Audit 2026"
slug: "near"
canonical_url: "https://web3decentralization.com/chains/near/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-08 08:54:59"
---
## Near Protocol Decentralization Score at a Glance

| Metric | Value |
| --- | --- |
| **Composite decentralization** | **60.3 / 100** |
| Consensus | Nightshade Sharding + Doomslug PoS |
| Launched | 2020 |
| Validators | ~250+ (Chunk-Only Producers + Block Producers) |
| Software clients | 1 (nearcore) + Light Clients |
| Gini coefficient | ~0.84 |

Thesis: "Sharded validator scaling via Chunk-Only Producers; strong ecosystem DAOs offset by single-client core." Methodology on our [methodology page](https://web3decentralization.com/methodology/); live run in the [Web3 Decentralization Intelligence Terminal](https://web3decentralization.com/terminal/).

## Four-Pillar Breakdown

| Pillar (weight) | Score | Nakamoto Coeff | Key Finding |
| --- | --- | --- | --- |
| Infrastructure (30%) | 66/100 | 24 | ~250+ validators; Chunk-Only Producer model lowers barrier to entry across shards |
| Capital (25%) | 56/100 | 7 | Broad stake distribution supported by active staking pools and liquid staking protocols |
| Governance (25%) | 62/100 | 0 | Progressive decentralization via Community House, NDC (Near Digital Collective), and on-chain voting |
| Software (20%) | 55/100 | 1 | Primary Rust `nearcore` codebase with independent RPC nodes and WebAssembly runtimes |

**Composite = 0.30(66) + 0.25(56) + 0.25(62) + 0.20(55) = 60.3.**

## Infrastructure & Outage Exposure

Near Protocol achieves scalability through dynamic state sharding (Nightshade). To combat the high validator hardware requirements common in sharded chains, Near introduced Chunk-Only Producers (COPs), enabling lighter hardware nodes to validate individual shards. This architectural choice broadens geographical and hardware decentralization compared to monolithic Layer 1 networks.

## What the Score Means

- **Infrastructure (66):** A healthy Nakamoto Coefficient of ~24 places Near among the more resilient PoS networks in terms of validator collusion resistance.
- **Capital (56):** Staking is distributed across diverse pools and institutional validators, yielding a moderate Gini coefficient of ~0.84.
- **Governance (62):** Near has actively decentralized treasury governance to grassroots working groups and the Near Digital Collective (NDC), reducing direct foundation control.
- **Software (55):** While dependent on `nearcore`, the protocol's WASM smart contract layer and modular RPC ecosystem offer robust developer flexibility.

## Frequently Asked Questions

### Is Near Protocol decentralized?

Yes. Near Protocol demonstrates strong decentralization across validator participation, sharded chunk production, and community-driven governance, earning an above-average composite score of 60.3/100.

### What is Near's Nakamoto Coefficient?

Near Protocol boasts an infrastructure Nakamoto Coefficient of approximately 24, requiring 24 independent validator entities to coordinate in order to halt block production.

### How does sharding affect Near's decentralization?

Nightshade sharding allows validation duties to be split into chunks, lowering the hardware requirements for Chunk-Only Producers and preventing the centralization seen in single-state-machine architectures.

## Final Verdict

Near Protocol strikes an admirable balance between high transaction scalability, user-friendly account abstractions, and decentralized consensus. Its chunk-producer innovations provide a blueprint for maintaining decentralization while scaling network throughput.

*Written by The W3D Team ([about](https://web3decentralization.com/about/) · [methodology](https://web3decentralization.com/methodology/)). Independent research estimate, not investment advice.*

## Cite / Embed This Score

You can embed a live version of the Near Protocol scorecard on your own page. It is self-contained (no external scripts) and updates with the same methodology. A short citation line to this page is included automatically.

[Embedded interactive](https://web3decentralization.com/terminal/embed/card.html?chain=near)

<iframe src="https://web3decentralization.com/terminal/embed/card.html?chain=near" width="100%" height="420" style="border:0;border-radius:8px" loading="lazy" title="Near Protocol decentralization scorecard"></iframe>
Prefer a plain citation? Use the persistent URL [web3decentralization.com/chains/near/](https://web3decentralization.com/chains/near/).

  **Open Source & Free** — This audit is published under [CC-BY-4.0](https://creativecommons.org/licenses/by/4.0/).
  Raw data & methodology are [CC0](https://creativecommons.org/publicdomain/zero/1.0/).
  [📝 View/Edit on GitHub](https://github.com/shoyebjhd/web3decentralization/tree/main/content/chains/near.md)
