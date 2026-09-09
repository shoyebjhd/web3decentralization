---
title: "Intent-Based"
slug: "intent-based"
canonical_url: "https://web3decentralization.com/glossary/intent-based/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 07:52:59"
---
Intent-based design flips transactions upside down: instead of specifying *how* (exact contract calls, routes, slippage), you declare *what you want* ("swap 1 ETH for ≥3,000 USDC") and competing solvers fill it. UniswapX and across-protocol intents pioneered the pattern.

## How it works

Your signed intent enters a competitive marketplace; solvers race to execute it best, keeping the spread as profit. Dutch auctions typically drive the price toward optimal; [MEV](https://web3decentralization.com/glossary/mev/) that once taxed you now partly returns as price improvement — solvers bidding against each other share value back to win your flow.

## Why it matters for decentralization

Intents move power from infrastructure (who orders blocks) to marketplaces (who fills orders) — decentralization migrates from validators to solver competition. A market with three dominant solvers is the new mining pool: watch filler diversity, not just chain metrics.

## Risks & trade-offs

Solver oligopoly and censorship; opaque execution (verify outcomes, not paths); exclusive order flow deals recreating gatekeepers; and complexity that resists casual auditing.

## FAQ

**Intents vs limit orders?** Limit orders specify price on one venue; intents specify outcomes across all venues, filled by whoever does it best.

**Do intents fix MEV?** They redirect it — searchers compete to give *you* better prices instead of sandwiching you. Better equilibrium, same players.

**What can go wrong?** Solver failure mid-fill, exclusive-flow centralization, and users approving intents they don't understand. Outcome guarantees beat mechanism trust — read the guarantee.

## Related terms

[DEX aggregator](https://web3decentralization.com/glossary/dex-aggregator/) ·
[MEV](https://web3decentralization.com/glossary/mev/) · [DeFi](https://web3decentralization.com/glossary/defi/)
