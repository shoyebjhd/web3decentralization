# Web3Decentralization Open Academy — World's First 100% Forkable Crypto Learning Hub

[![DA 59](https://img.shields.io/badge/DA-59-blue)](https://web3decentralization.com)
[![333 pages](https://img.shields.io/badge/pages-333-green)](https://web3decentralization.com/sitemap_index.xml)
[![MIT License](https://img.shields.io/badge/license-MIT-yellow)](https://opensource.org/licenses/MIT)
[![Built with OpenCode Antigravity](https://img.shields.io/badge/built%20with-OpenCode%20Antigravity-purple)](https://web3decentralization.com)

Built on an expired 59-DA domain, open-sourced for the community. This directory
is the full source of [web3decentralization.com](https://web3decentralization.com):
every glossary term, lesson, chain audit, and course — fork it, improve it, host it.

## Contents

| Path | What | Count |
|------|------|------:|
| `content/glossary/` | Plain-English crypto terms, cross-linked | 187 |
| `content/lessons/` | Full course lessons with tables, labs, checklists | 65 |
| `content/chains/` | Per-chain decentralization audits (4-pillar scores) | 12 |
| `content/courses/` | Course descriptions + lesson rosters | 6 |

Every file carries frontmatter: `title`, `slug`, `canonical_url` (the live page —
link back to it, don't compete with it), `source`, `license` (MIT), `da`, and
`lastmod` (from the live post's modification time, so forks can sync). Lessons
add `course`, `course_title`, `difficulty` (beginner/intermediate/advanced derived
from section order), and `order`.

## How to contribute

1. **Fork** this repo.
2. Fix a typo, improve a lesson, add a term, challenge a score (with data).
3. Open a **PR** — merged content is auto-deployed to the live site.
4. To re-export from live WordPress after a merge, maintainers run the
   `w3d_export_academy.php` routine (kept out of the repo; uses only WP-CLI).

Guidelines: plain English, beginner-first, one concept per file, no hype, no
financial advice, cite sources for data claims. Cite methodology page when
quoting scores: https://web3decentralization.com/methodology/

## License

MIT — fork it, translate it, sell courses built on it. Attribution appreciated:
link back to the canonical URL in each file's frontmatter.

## Phase 2: NotebookLM Short Videos (coming)

188 glossary terms = 188 free short videos. Each lesson and term page already
carries a hidden 3-bullet video source block (hook / concept / takeaway) ready
to feed NotebookLM's free tier — see `notebooklm-source` divs on the live site.
