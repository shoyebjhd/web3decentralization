---
chain: btc
name: Bitcoin
consensus: Nakamoto Proof of Work
composite: 84.8
live_validators: 26732
live_validators_source: bitnodes
live_nakamoto_33: 
live_nakamoto_source: audited
live_updated: 2026-09-10T07:35:22.996Z
lastmod: 2026-09-10
---

# Bitcoin Decentralization Audit

Bitcoin is the original cryptocurrency, capped at 21M coins and secured by proof-of-work mining. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 84.8 / 100** · *The benchmark for credible neutrality and Sybil resistance*

## Four pillars

- **Infrastructure (30%)** — 92/100 · Nakamoto 4 · 17,800+ reachable nodes across 100+ countries
- **Capital (25%)** — 78/100 · Nakamoto ~1,900,000 · Gini ~0.83; top wallets are exchanges, not individuals
- **Governance (25%)** — 95/100 · Nakamoto 0 · No on-chain governance; rough consensus + BIPs
- **Software (20%)** — 70/100 · Nakamoto 1 · Bitcoin Core dominates ~95%; Knots & btcd minority

## What the score means

- Governance (95): no single entity can change Bitcoin's rules — change requires rough consensus and Bitcoin Improvement Proposals across the wider community.
- Capital (78): the main caveat is concentration among exchange-owned wallets, though no party controls a network-threatening share of hash power.
- Software (70): the one weak pillar; Bitcoin Core's ~95% dominance means a severe Core bug could be systemic, though diverse node coverage softens the risk.

## See it live

- [Interactive audit & scorecard](/terminal/chains/btc)
- [Embed this scorecard](/terminal/embed/card.html?chain=btc)
- Compare against other chains in the [terminal](/terminal/)
