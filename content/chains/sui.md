---
chain: sui
name: Sui
consensus: Delegated PoS (Mysticeti / Narwhal-Bullshark)
composite: 49.2
---

# Sui Decentralization Audit

Sui is an object-centric chain using the Mysticeti consensus for sub-second settlement. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 49.2 / 100** · *Ultra-fast object-centric execution; constrained by single-client architecture and validator stake concentration*

## Four pillars

- **Infrastructure (30%)** — 54/100 · Nakamoto 14 · ~110 active validators with significant cloud hosting clustering (AWS/GCP/OVH)
- **Capital (25%)** — 46/100 · Nakamoto 3 · Concentrated early investor allocations and foundation delegation weights
- **Governance (25%)** — 50/100 · Nakamoto 0 · Mysten Labs & Sui Foundation lead core upgrades and network parameters
- **Software (20%)** — 45/100 · Nakamoto 1 · Single production client implementation (Rust sui-node)

## What the score means

- Infrastructure (54): A Nakamoto Coefficient of ~14 means colluding or censoring the top 14 validators could halt consensus. Hardware requirements prevent standard consumer nodes from validating.
- Capital (46): Initial token distribution heavily favored core contributors, early venture backers, and the community reserve, leading to a high Gini coefficient (~0.89).
- Software (45): Sui runs almost exclusively on the reference `sui-node` implementation. A consensus-breaking bug in the primary codebase would affect 100% of the active network.

## See it live

- [Interactive audit & scorecard](/terminal/chains/sui)
- [Embed this scorecard](/terminal/embed/card.html?chain=sui)
- Compare against other chains in the [terminal](/terminal/)
