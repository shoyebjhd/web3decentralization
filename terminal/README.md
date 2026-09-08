# W3D Decentralization Intelligence Terminal

> A free, interactive tool that audits the **decentralization** of major
> blockchains — live on
> [web3decentralization.com/terminal](https://web3decentralization.com/terminal/).

**License: MIT** (this app). The data it renders is CC0 — see `../data/`.

## What it does

- **Nakamoto Coefficient** per chain — how many independent entities would need
  to collude to compromise the network.
- **Four-pillar composite score** (0–100): infrastructure, capital, governance,
  and software diversity — see `../data/methodology.md`.
- **Blackout / outage stress simulation** and audit-grade **PDF/CSV export**.
- **Embeddable scorecards** at `/terminal/embed/card.html?chain=<slug>` —
  free to embed anywhere (a backlink magnet).
- **`llms.txt` / `ai.txt`** — machine-readable summaries so AI assistants and
  LLMs can cite the data.

## This repository's copy

This directory contains the **current production build** of the terminal
(preserved from the live site, 2026-09-08). The original React/Vite **source
has not been recovered** — the minified bundle below is the working app.

```
terminal/
├── index.html            # entry (includes boot shim + router prefix fix)
├── assets/               # minified JS/CSS/fonts (production build)
├── embed/                # embeddable scorecard widgets
├── og/                   # per-chain OG share covers
├── llms.txt / ai.txt     # LLM-readable site summaries
└── manifest.webmanifest  # PWA metadata
```

## Run it locally

The build is fully static. Serve this folder and open `index.html`:

```bash
cd terminal
python -m http.server 8080   # then open http://localhost:8080
```

> Note: asset URLs are absolute (`/terminal/...`) as deployed. To host at a
> sub-path (e.g. GitHub Pages), prefix the repo path or serve from a path
> mirroring `/terminal/`.

## Status

- [x] Production build vendored & working
- [ ] Reconstruct the React/Vite source (see `ROADMAP.md` Phase 1)
- [ ] Make asset paths relative so the demo runs on GitHub Pages at any path
- [ ] CI build + lint pipeline

## Contributing

Issues and PRs welcome — look for `good first issue`. If you're a contributor,
the fastest entry is the embeddable scorecard or the `llms.txt` layer.