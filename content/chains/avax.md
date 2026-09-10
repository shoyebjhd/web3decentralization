---
chain: avax
name: Avalanche
consensus: Snowman / Avalanche PoS
composite: 57.2
live_validators: 605
live_validators_source: avax-public-api
live_nakamoto_33: 24
live_nakamoto_source: computed-live
live_updated: 2026-09-10T08:20:26.156Z
lastmod: 2026-09-10
---

# Avalanche Decentralization Audit

Avalanche is an EVM-compatible chain using the novel Avalanche consensus for fast finality. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 57.2 / 100** · *Subnet flexibility; primary network still hyperscaler-dependent*

## Four pillars

- **Infrastructure (30%)** — 62/100 · Nakamoto 28 · ~1,700 validators; meaningful AWS concentration
- **Capital (25%)** — 55/100 · Nakamoto 5 · Foundation + insider unlocks remain influential
- **Governance (25%)** — 58/100 · Nakamoto 0 · Off-chain ACPs; subnet sovereignty model
- **Software (20%)** — 52/100 · Nakamoto 1 · AvalancheGo dominant; coreth EVM client

## What the score means

- Infrastructure (62): good validator count, but AWS reliance reduces single-outage resilience.
- Capital (55): foundation and insider unlocks retain notable influence over token economics.
- Software (52): a single dominant client (AvalancheGo) with coreth further back, limiting diversity.

## See it live

- [Interactive audit & scorecard](/terminal/chains/avax)
- [Embed this scorecard](/terminal/embed/card.html?chain=avax)
- Compare against other chains in the [terminal](/terminal/)
