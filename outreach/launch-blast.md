# Launch Blast — Day-of Outreach (Phase 2)

Use these in this order on launch day. Each piece is ready to paste, then
lightly customize. Post the repo first, **then** the community drops (so
comments can link to a live repo).

Launch order:
1. Push repo to GitHub (user action).
2. Post **Show HN** (greatest single spike).
3. Post **Reddit data drops** (steady long tail + backlinks).
4. Submit to **Awesome lists** + directories (permanent SEO/authority links).
5. Optional: dev.to / Hashnode crossposts.

---

## 1 — Show HN (Hacker News)

**Title:**
```
Show HN: An open-source, free crypto/Web3 learning hub with a live decentralization terminal
```

**Text:**
```markdown
Today I'm open-sourcing the platform behind web3decentralization.com — a free,
beginner-focused Web3 learning hub whose hardest asset is a real, measurable
one:

There's a live "decentralization terminal" that scores 12 L1 blockchains
(Bitcoin → XRP) across four pillars — infrastructure, capital, governance,
software — computing a Nakamoto Coefficient and a single composite score for
each. Methodology and raw data are published (CC0) so every number is
checkable. (e.g. BTC 84.8, DOT 72.6, SOL 53.2)

Why it matters: most "decentralization" claims are marketing. This turns it
into a reproducible number, and the scorecards are embeddable anywhere — a
free citation slot for any chain's community.

Learning side: structured paths from absolute zero (what is a blockchain →
wallets → DeFi), a growing glossary, interactive labs, quizzes, and
certificates. All free, no signup walls, no ads.

The whole thing is open source:
- Code (terminal + WP theme): MIT
- Learning content (courses/glossary/lessons): CC-BY-4.0
- Datasets + methodology: CC0
- Repo: https://github.com/web3decentralization/web3decentralization
- Live tool: https://web3decentralization.com/terminal/

Contributions welcome — especially glossary terms and chain audits
(first-issue friendly). Looking for honest feedback on the scoring model
more than anything.
```

**Timing tips**: post Tue/Wed/Thu ~7am Pacific. Keep the URL out of the title
(Show HN auto-links the repo). Don't reply to the first comment as "OP" unless
engaging genuinely.

---

## 2 — Reddit data drops

See `reddit-data-drops.md` for the chain-data posts. Below is an **additional
set focused on the open-source learning-hub pivot** (post these in
r/Web3, r/BlockchainStartups, r/CryptoCurrency, r/ethereum).

### 2a. r/Web3 + r/BlockchainStartups — the open hub

**Title:** We open-sourced a free Web3 learning hub (courses, glossary, live chain-decentralization data) — contributions welcome

**Body:**
```markdown
Web3 adoption still dies at the jargon wall — "zk-rollup", "Nakamoto
Coefficient", "consensus", "slashing". And 90% of "learn crypto" sites are
either paywalled or pumping tokens.

So we built and just open-sourced the alternative:

- A learning-path structure from absolute zero (blockchain basics → wallets
  → staking → DeFi), with quizzes + certificates, all free
- A glossary written in plain English with cross-links
- Interactive labs that embed a live decentralization terminal — check the
  Nakamoto Coefficient and four-pillar score for 12 L1s right in the lesson
- The datasets + methodology are public (CC0), the code is MIT, the content
  is CC-BY-4.0 — anyone can contribute

Repo: https://github.com/web3decentralization/web3decentralization
Live: https://web3decentralization.com/learn/

If you're a dev or educator: the fastest way to help is adding a glossary
term (there's a template) or auditing a chain. Beginners welcome.
```

### 2b. r/CryptoCurrency — "learn every sphere"

**Title:** [Educational] I open-sourced my crypto learning platform so you can fact-check the decentralization scores yourself

**Body:**
```markdown
Quick background: I built a tool that scores 12 chains on decentralization
(infrastructure/capital/governance/software pillars → Nakamoto Coefficient +
composite). People kept asking "how is BTC 84.8 computed?" — fair, so I've
open-sourced the whole thing with the methodology and raw data public.

What's free now:
- Live terminal: link/ to compare chains, run outage stress tests
- Beginner learning paths + quizzes + certificates
- A plain-English glossary
- Per-chain audits with embeddable scorecards

Everything: link-to-repo. Contributions (glossary, chain audits) very welcome.

No token, no signup wall, no paid tier. Just trying to make the "how
decentralized is X" claim auditable.
```

### 2c. r/webdev + r/programming — dev angle

**Title:** I vendored a React SPA's production build because the source was lost — a cautionary tale (and an open PR invitation)

**Body:**
```markdown
Story: the runtime for web3decentralization.com's terminal (scores 12 chains
on decentralization) was built by a previous collaborator and only shipped as
a minified Vite bundle. The source was never backed up anywhere — so on
day one of open-sourcing it, the repo contains the production build, a
validator that checks asset integrity, and a roadmap item to reconstruct the
source. Contributors wanting a meaty first issue: re-implement the terminal
in React/Vite against the public methodology. That's the whole point of
publishing it: turn a lost-source liability into a community asset.

Repo: https://github.com/web3decentralization/web3decentralization
Methodology + data (CC0): /data/methodology.md
```

---

## 3 — Awesome lists & directories

See `awesome-lists.md` for the exact submission text + where to add links.

---

## 4 — dev.to / Hashnode crossposts

Post a trimmed version of README.md as "How to build an open-source learning
platform off a live-data tool" on both. Include the embeddable scorecard iframe
so readers interact inline:

```html
<iframe src="https://web3decentralization.com/terminal/embed/card.html?chain=btc"></iframe>
```

---

## Success meter (what "worked" looks like)

- Show HN: >40 points, 15+ comments
- Reddit: 2+ posts with >100 upvotes combined; any comment thread >20
- 3+ external backlinks within 2 weeks (monitor GSC "Links")
- First FRONT-PAGE AWESOME-LIST green check