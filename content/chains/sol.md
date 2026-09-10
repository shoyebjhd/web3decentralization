---
chain: sol
name: Solana
consensus: Proof of History + PoS
composite: 53.2
live_validators: 675
live_validators_source: solana-public-rpc
live_nakamoto_33: 18
live_nakamoto_source: computed-live
live_updated: 2026-09-10T08:20:26.156Z
lastmod: 2026-09-10
---

# Solana Decentralization Audit

Solana is a high-throughput chain combining Proof-of-History with Tower BFT. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 53.2 / 100** · *High throughput; offset by infrastructure & client concentration*

## Four pillars

- **Infrastructure (30%)** — 58/100 · Nakamoto 19 · 1,900 validators but heavy Hetzner / OVH reliance
- **Capital (25%)** — 48/100 · Nakamoto 2 · High insider allocation; vesting concentration
- **Governance (25%)** — 55/100 · Nakamoto 0 · Foundation-driven roadmap; limited on-chain gov
- **Software (20%)** — 50/100 · Nakamoto 2 · Agave + Firedancer (in rollout) — duopoly forming

## What the score means

- Infrastructure (58): 1,900 validators is a healthy count, but provider and (importantly) hosting concentration lowers resilience to cloud or ISP events.
- Capital (48): insider and vesting concentration is high, with a Gini of ~0.88.
- Software (50): a two-client duopoly is forming as Firedancer rolls out — better than one, still thinner than Ethereum.

## See it live

- [Interactive audit & scorecard](/terminal/chains/sol)
- [Embed this scorecard](/terminal/embed/card.html?chain=sol)
- Compare against other chains in the [terminal](/terminal/)
