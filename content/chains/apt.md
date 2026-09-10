---
chain: apt
name: Aptos
consensus: AptosBFT (Proof of Stake + Block-STM)
composite: 49.1
live_validators: 84
live_validators_source: aptos-public-fullnode
live_nakamoto_33: 14
live_nakamoto_source: computed-live
live_updated: 2026-09-10T08:20:26.156Z
lastmod: 2026-09-10
---

# Aptos Decentralization Audit

Aptos is a Meta-born Move-language chain with parallel execution (AptosBFT). This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 49.1 / 100** · *High parallel throughput via Block-STM; moderated by institutional capital and enterprise node concentration*

## Four pillars

- **Infrastructure (30%)** — 56/100 · Nakamoto 18 · ~145 active validators with high concentration in AWS, GCP, and tier-3 colocation facilities
- **Capital (25%)** — 45/100 · Nakamoto 3 · High venture capital and foundation token distribution; significant foundation delegation weight
- **Governance (25%)** — 48/100 · Nakamoto 0 · Aptos Labs and Aptos Foundation drive core AIP (Aptos Improvement Proposal) roadmaps
- **Software (20%)** — 45/100 · Nakamoto 1 · Single primary production client codebase (Rust-based aptos-core)

## What the score means

- Infrastructure (56): An infrastructure Nakamoto Coefficient of ~18 reflects reasonable stake distribution across the top 18 validator entities, though hosting provider overlap remains an attack surface.
- Capital (45): Token allocations reflect traditional Web3 venture backing, resulting in an elevated Gini coefficient of ~0.90 and high foundation staking control.
- Software (45): 100% of network state transitions are verified using the single official `aptos-core` client. Client diversity remains an area for future architectural maturity.

## See it live

- [Interactive audit & scorecard](/terminal/chains/apt)
- [Embed this scorecard](/terminal/embed/card.html?chain=apt)
- Compare against other chains in the [terminal](/terminal/)
