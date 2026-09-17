# Gap analysis — content & lesson coverage — verdict (2026-09-17)

## Bottom line

No content gap survives scrutiny. There is a *design* asymmetry — 12 hand-authored
chain pages plus 7 data-generated chain pages (all 19 from `w3d-data.json`) — but
no rendered 404, no stub page, no thin lesson. The 7 "extra" slugs previously
flagged as possible missing pages (`base`, `optimism`, `polygon`, `bnb`, `ton`,
`polygon-zkevm`, `blast`) are confirmed **generated, not absent**: they render
200 with real payloads.

## Verified (edge probes, 2026-09-17)

| Chain slug | Status | Rendered bytes |
|---|---|---|
| bitcoin | 301→`/chains/bitcoin/` | 200 (authored) |
| ethereum | 301→… | 200 (authored) |
| solana | 301→… | 200 (authored) |
| cosmos | 200 | 51,042 |
| xrp | 200 | 51,337 |
| sui | 200 | 52,346 |
| near | 200 | 52,596 |
| base | 200 | 63,268 |
| arbitrum | 301→… | 200 |
| optimism | 200 | 48,702 |
| polygon | 200 | 48,210 |
| bnb | 200 | 48,140 |
| ton | 200 | 47,780 |
| blast | 200 | 62,056 |

- All 301s are canonical trailing-slash redirects (SEO-correct), not dead routes.
- Chain pages are populated from live RPC data: `live_validators`, `live_nakamoto_33`,
  per-pillar scores. No empty front-matter.
- Lessons per track: 5–10 across 8 courses; smallest lesson 1,284 B (a genuine
  lean defi lesson, not a stub). Courses: blockchain-basics, crypto-fundamentals,
  decentralization-analyst, defi-101, l2-path, security-advanced, smart-contracts,
  wallets-security.
- Glossary: 217 entries, uniform ≥600 B, all with front-matter + related links.

## What is NOT a gap (deliberate design, not debt)

- **7 data-generated chains**: chosen because their GEO value is a live audit
  (validator count, Nakamoto, RPC health), not hand prose.
- **No per-chain "score card" ambiguity**: `composite` vs `live_*` — audited base
  + live delta is the documented methodology, not inconsistency.

## Recommendation

Ship with confidence. No content work is required before the GEO F-portal
handshake (Search Console / Bing / GA4 ownership) and the index-recovery
evidence already staged in the A-phase record.
