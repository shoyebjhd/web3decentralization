#!/usr/bin/env python3
"""Generate content/chains/{slug}.md audits from the published chain HTML pages.

The chain HTML pages (chains/*.html) carry the full four-pillar breakdowns;
this script extracts them into beginner-friendly CC-BY markdown audits and
prints a pillar table for data/methodology.md.

Usage:  python scripts/gen_chain_audits.py
"""
import html
import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SRC = ROOT / "chains"
OUT = ROOT / "content" / "chains"

# html filename -> content slug (atom is WP-reserved -> cosmos)
META = {
    "btc":   ("Bitcoin", "the original cryptocurrency, capped at 21M coins and secured by proof-of-work mining"),
    "eth":   ("Ethereum", "the programmable 'world computer' chain that launched smart contracts and DeFi"),
    "dot":   ("Polkadot", "a sharded multi-chain network designed to connect many specialist chains"),
    "ada":   ("Cardano", "a peer-reviewed proof-of-stake chain built around slow, deliberate upgrades"),
    "atom":  ("Cosmos", "the 'internet of blockchains' using the CometBFT (Tendermint) consensus"),
    "arb":   ("Arbitrum", "an Ethereum rollup that settles on Ethereum L1 while running cheap, fast transactions"),
    "near":  ("Near", "a sharded proof-of-stake chain built for giant-scale performance with Nightshade sharding"),
    "avax":  ("Avalanche", "an EVM-compatible chain using the novel Avalanche consensus for fast finality"),
    "sol":   ("Solana", "a high-throughput chain combining Proof-of-History with Tower BFT"),
    "sui":   ("Sui", "an object-centric chain using the Mysticeti consensus for sub-second settlement"),
    "apt":   ("Aptos", "a Meta-born Move-language chain with parallel execution (AptosBFT)"),
    "xrp":   ("XRP Ledger", "a fast, payment-focused ledger using validator-set (UNL) consensus"),
}


def strip_tags(s):
    return re.sub(r"\s+", " ", re.sub(r"<[^>]+>", "", s)).strip()


def fetch(html_text):
    d = {}
    m = re.search(r"<strong>Composite decentralization</strong></td><td><strong>([\d.]+)\s*/\s*100</strong>", html_text)
    d["composite"] = m.group(1) if m else "?"
    m = re.search(r"<td>Consensus</td><td>([^<]+)</td>", html_text)
    d["consensus"] = html.unescape(m.group(1)).strip() if m else ""
    d["rows"] = []
    for p in ["Infrastructure", "Capital", "Governance", "Software"]:
        weights = ["30%", "25%", "25%", "20%"]  # placeholder to satisfy pattern
        m = re.search(rf"<td>{p} \((?:30|25|20)%\)</td><td>(\d+)/100</td><td>([^<]+)</td><td>([^<]*)", html_text)
        d["rows"].append([p, m.group(1) if m else "?", m.group(2).strip() if m else "", html.unescape(m.group(3).strip()) if m else ""])
    m = re.search(r'<p>Thesis:\s*"([^"]+)"', html_text)
    d["thesis"] = strip_tags(html.unescape(m.group(1))).rstrip(".") if m else ""
    m = re.search(r"<h2>What the Score Means</h2>\s*(.*?)(?=<h2>|<p>Over time)", html_text, re.S)
    d["bullets"] = [strip_tags(html.unescape(x)) for x in (re.findall(r"<li>(.*?)</li>", m.group(1), re.S) if m else [])]
    return d


def main():
    OUT.mkdir(parents=True, exist_ok=True)
    table_rows = []
    for fn, (name, what) in META.items():
        src = SRC / f"{fn}.html"
        if not src.exists():
            print(f"skip {fn}: file missing")
            continue
        data = fetch(src.read_text(encoding="utf-8"))
        pillar_rows = data["rows"]
        rows_md = "\n".join(
            f"- **{p[0]} ({pct})** — {p[1]}/100 · Nakamoto {p[2]} · {p[3]}"
            for p, pct in zip(pillar_rows, ["30%", "25%", "25%", "20%"]))
        bullets = "\n".join(f"- {b}" for b in data["bullets"][:4])
        slug = "cosmos" if fn == "atom" else fn
        audit = f"""---
chain: {slug}
name: {name}
consensus: {data['consensus']}
composite: {data['composite']}
---

# {name} Decentralization Audit

{name} is {what}. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: {data['composite']} / 100** · *{data['thesis']}*

## Four pillars

{rows_md}

## What the score means

{bullets}

## See it live

- [Interactive audit & scorecard](/terminal/chains/{slug})
- [Embed this scorecard](/terminal/embed/card.html?chain={slug})
- Compare against other chains in the [terminal](/terminal/)
"""
        (OUT / f"{slug}.md").write_text(audit, encoding="utf-8")
        table_rows.append([slug, *[p[1] for p in pillar_rows], data["composite"]])
        print(f"wrote content/chains/{slug}.md  (composite {data['composite']})")

    print("\n=== pillar table for methodology.md ===")
    print("| Chain | Infra | Capital | Gov | Software | Composite |")
    print("|-------|:-----:|:-------:|:---:|:--------:|:---------:|")
    hdr = "{:<8} {:<6} {:<8} {:<5} {:<9} {:<5}".format
    for r in table_rows:
        print("| {:<6} | {:>4} | {:>6} | {:>3} | {:>7} | **{:>4}** |".format(*r))


if __name__ == "__main__":
    main()