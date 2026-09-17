# Web3-Decentralization — Phase A (GEO / index-recovery) — DONE RECORD

Date: 2026-09-17 · Branch: main · Prior commit that closed the GEO/llms pair:
`2c26573 strip UTF-8 BOM from theme functions; add root llms.txt/ai.txt mu-plugin; correct terminal llms.txt routes/counts`

## Whatever follows in this file is the post-deploy GEO/SEO verification log.
Nothing more to deploy for A1/A3 — both verified live.

---

## A1 — llms.txt/ai.txt (LLM-agent discoverability) — DONE + verified
mu-plugin: `mu-plugins/w3d-llms-txt.php` -> serves root `/llms.txt` + `/ai.txt` (+ `/terminal/*`).
Live probes (public edge AND origin-direct, AI UAs GPTBot/ClaudeBot/PerplexityBot/Googlebot):
- `/llms.txt` -> 200 `text/plain; charset=UTF-8`, first 3 bytes `23 20 57` (`# W`) — clean, no BOM, at edge+origin.
- `/ai.txt`   -> 200, first 3 bytes `23 20 41` (`# A`) — clean.
- `/terminal/llms.txt`, `/terminal/ai.txt` -> 200, clean.
- llms.txt contains: 19 chains (18 mainnet visible), 15 tools, 7 courses, 217 glossary — all live CPT counts
  (no stale hand-rolled lists). No dead routes linked.
- robots.txt: virtual (Rank Math), no AI-agent blocks, Sitemap declared.
- cache: purged (w3d + LiteSpeed) post-deploy; origin and edge confirmed byte-clean afterward.
- AI-agent UA access verified at both origin-direct and Hostinger hcdn edge.

## A3 — sitemap + index health — DONE + verified
- sitemap_index.xml 200, all child sitemaps reachable (counts in earlier table): pages/chains/glossary x2/tool/course + kban.
- noindex hygiene: llms/llms-glossary/tool paths no noindex leak (checked robots meta on live).
- no dead routes in geo-main links. Old `/tools/` -> 301 /chains/sol (pre-existing, nothing links it now).

## A2 — Search Console / Bing / GA4 — PREPARED (account-gated; not OAuth-completable from shell)
- IndexNow: key present, llms/ai + chains ping ready; needs SC/Bing OAuth to fully wire + GA4 gtag.
- sitemap/IndexNow submission bundle documented in .temp/audit (sitemap children URLs + counts table).
- Deferred to user: SC ownership verification (DNS/HTML token), GA4 measurement ID insertion, Bing Webmaster + IndexNow ping enable, GA4 consent-mode toggle.
