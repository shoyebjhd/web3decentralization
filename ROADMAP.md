# Roadmap

**Goal:** Become the world's #1 open-source learning hub for Web3 / crypto
**beginners** — free forever, community-built, citation-grade data.

North-star metrics (6-month targets):

| Metric | Today | Target (Month 6) |
|--------|-------|------------------|
| Monthly organic visitors | ~0 | 10,000+ |
| GitHub stars | 0 | 1,000+ |
| Backlinks | 0 | 100+ |
| Learning paths | 2 | 6+ |
| Courses | 2 | 8+ |
| Lessons | 10 | 60+ |
| Glossary terms | ~34 | 300+ |
| Interactive labs | 9 | 20+ |
| Chains audited | 12 | 25+ |
| Contributors | 0 | 20+ |

## Phase 1 — Open-source launch (Weeks 1–2)
- [x] Git repo, licenses (MIT / CC-BY-4.0 / CC0)
- [x] Readme/docs: CONTRIBUTING, CODE_OF_CONDUCT, SECURITY, CHANGELOG
- [x] Terminal production build vendored into `terminal/` (source was not
      retained on the server — reconstruction tracked separately)
- [x] CI: repo validator + PHP lint + static smoke test (GitHub Actions)
- [ ] PUSH repo to GitHub (needs `gh auth login` / repo creation)
- [ ] GitHub Pages demo of the terminal (needs repo to exist)
- [ ] Reconstruct React/Vite source (optional but makes contributions easy)
- [ ] `good first issue` starter tasks

## Phase 2 — Traffic blitz (Weeks 2–4)
- [x] Launch pack prepared: `outreach/launch-blast.md` (Show HN + Reddit +
      dev.to), `outreach/awesome-lists.md` (submissions + plumbing text)
- [x] GitHub Pages demo tooling + workflow (deploy once repo exists)
- [ ] PUSH repo to GitHub (needs `gh auth login`)
- [ ] Post Show HN
- [ ] Post Reddit data drops (r/CryptoCurrency, r/ethereum, r/solana, ...)
- [ ] Awesome-list + directory submissions
- [ ] StackExchange / Crypto.SE citations
- [ ] First GA4 visitors trend visible (baseline via GA4 dashboard)

## Phase 3 — Content scale (Months 1–2)
- [ ] Add 4 learning paths: Blockchain Basics, Wallets & Security 101,
      DeFi 101, Smart Contracts for Beginners
- [ ] Glossary 34 → 200+ terms
- [ ] Labs 9 → 15+
- [ ] Courses 2 → 5+

## Phase 4 — Community (Months 2–3)
- [ ] 5+ external contributors
- [ ] Public roadmap + discussions
- [ ] Contributor recognition (badges, `contributors.md`)

## Phase 5 — AI + SEO compounding (Months 3–6)
- [ ] Keep `llms.txt` / `ai.txt` current (AI-assistant citations)
- [ ] Chain coverage 12 → 25+
- [ ] Backlink growth via embeddable scorecards + CC0 datasets
- [ ] 10k+ monthly visitors, 100+ backlinks

## Notes
- Revenue (affiliates/ads) is deliberately deferred until visitors prove out;
  the open layer is the traffic engine. See internal `PLAN.md`.
- Everything here is open — if you want to accelerate any line, PR it in.
