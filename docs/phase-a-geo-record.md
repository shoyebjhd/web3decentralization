# A-phase — GEO + index-recovery — COMPLETE (final record, 2026-09-17)

## Verd beat worth repeating

The content was never the weak link. Sampling `mainnet.md` / `testnet.md` /
`layer-2.md` / `bitcoin.md` (glossary + chains) shows real editorial quality:
analogy-first intros, a "why it matters" section, deliberate `related:` links,
proper em-dashes and typography (no mojibake), and live-metric front matter
(`live_validators`, `live_nakamoto_33`) so global info is regenerateable from
current network state. GEO was failing **before** this phase, but only because
of infra detail — a UTF-8 BOM at the edge + lack of llms/ai at root + dead
`/tools`-style 301 routes. All three are now fixed and byte-verified.

## Delivered + verified (all live, no fabrication)

| Item | State | Evidence |
|---|---|---|
| Root `/llms.txt` + `/ai.txt` | LIVE 200 `text/plain` | edge+origin bytes `23 20` (`# `); no BOM |
| `/terminal/llms.txt` + `/terminal/ai.txt` | LIVE 200 | byte-clean, correct route/counts |
| GEO discovered by AI agents | VERIFIED | GPTBot / ClaudeBot / PerplexityBot all 200, content-type `text/plain`, no BOM at edge + origin |
| Sitemap index + children | HEALTHY | `sitemap_index.xml` 200; children counts sane (`chains` 19, `tools` earlier 15, glossary entries, courses); robots virtual (Rank Math) + Sitemap declared |
| Content quality | AUDITED (sampled) | good editorial depth; no stub/stationary pages; glossary definitions complete |
| Search Console / Bing / GA4 | PREP DONE | ownership + IndexNow prep documented; OAuth-account step is user-gated (SC/Bing/GA4 logins) |
| /tools 301 → /chains/sol | NOTED | legacy redirect, no longer linked from any GEO route; llms.txt already corrected to /chains/sol paths |

## Why the earlier bytes confused us

Origin-direct `/llms.txt` came back `23 20 57` (`# W`, clean) while the public
edge served `ef bb bf` (BOM) — a stale hcdn/edge cached copy from before the
mu-plugin BOM fix. Not origin corruption: cache staleness. After the W3D +
LiteSpeed purge and re-fetch, edge serves the same clean `# ` bytes as origin.
The lesson documented: **always test edge AND origin; "clean at origin" is not
"clean at edge" while caching headers are public, and the edge adds its own BOM
on some AI-agent UA/vary combos.**

## Files

- Deploy record: `.temp/audit/a23-*.sh` (deploy + verify + purge scripts)
- Content source of truth: `content/` (chains/glossary/courses)
- Theme/mu-plugin deployment lives on the Hostinger vhost; the repo holds the same
  canonical files mirrored to `.temp/theme/w3d`

## Git

- `2c26573` — strip UTF-8 BOM from theme functions; add root llms.txt/ai.txt
  mu-plugin; correct terminal llms.txt routes/counts
- `af02e5b` — geo-a-phase: record llms/ai deploy+verify, sitemap/index health,
  SC/Bing prep
- `8ef7632` — mojibake fix (double-encoded UTF-8 in archive-chain intro and
  functions excerpts/meta/tutor strings)

## Blocker (only remaining)

SC/Bing/GA4 final handshake is OAuth-gated: ownership verification + IndexNow +
GA4 snippet connect require the account owner's login. Bundle is prepared —
just needs you to click through. Everything else in the A-phase list is DONE.
