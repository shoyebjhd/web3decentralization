---
title: "Aptos Decentralization Audit"
description: "chain: apt name: Aptos consensus: AptosBFT (Proof of Stake + Block-STM) composite: 49."
live_validators: 85
live_validators_source: aptos-public-fullnode
live_nakamoto_33: 14
live_nakamoto_source: computed-live
live_updated: 2026-09-21T12:29:30.461Z
lastmod: 2026-09-21
---

# Aptos Decentralization Audit

Aptos is a Meta-born Move-language chain with parallel execution (AptosBFT). This audit scores its decentralization across four pillars â€”
infrastructure, capital, governance, and software â€” using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 49.1 / 100** Â· *High parallel throughput via Block-STM; moderated by institutional capital and enterprise node concentration*

## Four pillars

- **Infrastructure (30%)** â€” 56/100 Â· Nakamoto 18 Â· ~145 active validators with high concentration in AWS, GCP, and tier-3 colocation facilities
- **Capital (25%)** â€” 45/100 Â· Nakamoto 3 Â· High venture capital and foundation token distribution; significant foundation delegation weight
- **Governance (25%)** â€” 48/100 Â· Nakamoto 0 Â· Aptos Labs and Aptos Foundation drive core AIP (Aptos Improvement Proposal) roadmaps
- **Software (20%)** â€” 45/100 Â· Nakamoto 1 Â· Single primary production client codebase (Rust-based aptos-core)

## What the score means

- Infrastructure (56): An infrastructure Nakamoto Coefficient of ~18 reflects reasonable stake distribution across the top 18 validator entities, though hosting provider overlap remains an attack surface.
- Capital (45): Token allocations reflect traditional Web3 venture backing, resulting in an elevated Gini coefficient of ~0.90 and high foundation staking control.
- Software (45): 100% of network state transitions are verified using the single official `aptos-core` client. Client diversity remains an area for future architectural maturity.

## See it live

- [Interactive audit & scorecard](/terminal/chains/apt)
- [Embed this scorecard](/terminal/embed/card.html?chain=apt)
- Compare against other chains in the [terminal](/terminal/)
