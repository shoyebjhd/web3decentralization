---
title: "Gas Optimization 101"
slug: "os-gas-optimization-101"
canonical_url: "https://web3decentralization.com/lesson/os-gas-optimization-101/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 08:18:42"
course: "l2-developer-path"
course_title: "L2 Developer Path"
difficulty: "beginner"
order: "108"
---
**Objective:** stop overpaying for computation — as a user today, as a builder tomorrow.

Every EVM operation has a price. Users optimize by *when* and *how* they transact; builders optimize by writing less work into contracts.

## Concept: where gas actually goes

Storage writes dominate (20,000 gas per fresh slot vs 100 for arithmetic). Loops over unbounded arrays, redundant checks, and chatty cross-contract calls are the classic wasters. On L2s, data posting dominates instead — different bottleneck, same discipline.

## Hands-on lab (free)

1. Compare gas used by a simple transfer vs a swap vs an NFT mint on an explorer — feel the 10-100x spreads.
2. Toggle a wallet's fee settings (low/market/aggressive) on testnet; watch confirmation times differ.
3. For builders: pack two `uint256` into one slot pattern, or cache array length outside loops — measure the difference on a testnet deploy.

## Safety checklist

- Lowballing gas on time-sensitive DeFi exits (liquidations, claims) costs more than it saves.
- "Gas tokens" and refund gimmicks are mostly dead — ignore them.
- On L2s, watch the *data* component; blob congestion is the new fee spike.

## Related glossary

- [Gas](https://web3decentralization.com/glossary/gas/) · [Gwei](https://web3decentralization.com/glossary/gwei/) · [Base Fee](https://web3decentralization.com/glossary/base-fee/)

**Next lesson:** reading L2Beat like an auditor.
