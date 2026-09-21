---
title: "Solana Decentralization Audit"
description: "chain: sol name: Solana consensus: Proof of History + PoS composite: 53."
---

# Solana Decentralization Audit

Solana is a high-throughput chain combining Proof-of-History with Tower BFT. This audit scores its decentralization across four pillars â€”
infrastructure, capital, governance, and software â€” using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 53.2 / 100** Â· *High throughput; offset by infrastructure & client concentration*

## Four pillars

- **Infrastructure (30%)** â€” 58/100 Â· Nakamoto 19 Â· 1,900 validators but heavy Hetzner / OVH reliance
- **Capital (25%)** â€” 48/100 Â· Nakamoto 2 Â· High insider allocation; vesting concentration
- **Governance (25%)** â€” 55/100 Â· Nakamoto 0 Â· Foundation-driven roadmap; limited on-chain gov
- **Software (20%)** â€” 50/100 Â· Nakamoto 2 Â· Agave + Firedancer (in rollout) â€” duopoly forming

## What the score means

- Infrastructure (58): 1,900 validators is a healthy count, but provider and (importantly) hosting concentration lowers resilience to cloud or ISP events.
- Capital (48): insider and vesting concentration is high, with a Gini of ~0.88.
- Software (50): a two-client duopoly is forming as Firedancer rolls out â€” better than one, still thinner than Ethereum.

## See it live

- [Interactive audit & scorecard](/terminal/chains/sol)
- [Embed this scorecard](/terminal/embed/card.html?chain=sol)
- Compare against other chains in the [terminal](/terminal/)
