---
chain: xrp
name: XRP Ledger
consensus: XRP LCP (Federated)
composite: 43.2
---

# XRP Ledger Decentralization Audit

XRP Ledger is a fast, payment-focused ledger using validator-set (UNL) consensus. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 43.2 / 100** · *Performant federated design; structurally permissioned*

## Four pillars

- **Infrastructure (30%)** — 45/100 · Nakamoto 3 · ~120 validators, UNL curated by Ripple/XRPLF
- **Capital (25%)** — 35/100 · Nakamoto 1 · Ripple escrow holds ~40B XRP; high concentration
- **Governance (25%)** — 40/100 · Nakamoto 1 · Validator UNL effectively gates protocol upgrades
- **Software (20%)** — 55/100 · Nakamoto 1 · rippled is the dominant implementation

## What the score means

- Capital (35): the lowest pillar — Ripple escrow holds ~40 billion XRP, a very high concentration relative to supply.
- Governance (40): protocol upgrades are effectively gated by the curated validator UNL.
- Infrastructure (45): a small, curated validator set makes the network performant but not broadly permissionless.

## See it live

- [Interactive audit & scorecard](/terminal/chains/xrp)
- [Embed this scorecard](/terminal/embed/card.html?chain=xrp)
- Compare against other chains in the [terminal](/terminal/)
