# W3D Terminal — WordPress-Native Shell

> The old React SPA build was retired (see git history + server backup
> `terminal_retired_20260910/`). The terminal is now 100% WordPress-native:
> a CPT of tools plus an interactive shell page. No build step, no Node
> runtime, no external APIs.

**License: MIT.** Live at https://web3decentralization.com/terminal/ —
15 tools at https://web3decentralization.com/terminal/tools/{slug}/.

## Architecture

```
WordPress page  /terminal/          → themes/w3d/page-terminal.php (xterm.js shell)
CPT w3d_tool    /terminal/tools/*   → themes/w3d/single-w3d_tool.php (15 tools)
Static assets   /terminal/embed/    → embeddable scorecards (backlink magnets)
                /terminal/og/       → per-chain share covers
                llms.txt / ai.txt   → LLM-readable summaries
Data            themes/w3d/assets/w3d-data.json (chains + glossary + tools)
```

- **Shell** (`page-terminal.php`): xterm.js (pinned CDN, the only external
  request on the page) + ~15 KB vanilla JS implementing `help list open
  glossary chain clear about`, `?tool=` deep links, search-as-you-type, and
  same-origin tool loading (fetches the tool page, extracts its calculator).
- **Tools** (`tools/*.html` in this repo = source): SEO article + fully
  self-contained vanilla-JS calculator each. Tested: `node
  scripts/test_calculators.js` (7 functional assertions incl. BIP173 + SHA-256d
  vectors) runs in CI.
- **Routing** (`.htaccess`): real files pass through; everything else under
  `/terminal/` routes to WordPress. The bare directory explicitly excluded
  from the file/dir passthrough (Apache would 403 otherwise).
- **BIP39 wordlist** lives in `themes/w3d/assets/bip39-english.txt`, fetched
  same-origin by the seed checker only.

## Rebuilding / forking

1. Import `tools/*.html` as `w3d_tool` posts (see `w3d_tool_import.php`
   pattern in project history — kept out of the repo; uses TITLE/META/CAT
   comment headers).
2. Ensure the `w3d_tool` CPT + `w3d_tool_category` taxonomy from
   `themes/w3d/functions.php` are active; flush rewrites.
3. Create the `terminal` page with the Terminal Shell template.
4. Regenerate `w3d-data.json` from your DB; purge cache.
