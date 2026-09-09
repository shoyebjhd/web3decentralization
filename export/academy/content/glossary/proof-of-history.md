---
title: "Proof of History"
slug: "proof-of-history"
canonical_url: "https://web3decentralization.com/glossary/proof-of-history/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:31:11"
---
Proof of History (PoH) is Solana's clock-before-consensus trick: a verifiable delay function stamps every event with a cryptographic timestamp, so validators agree on *order* without talking to each other first. Consensus then only has to agree the sequence is valid, which is much faster.

## Why it matters

PoH is why Solana is so fast — ordering is the expensive part of consensus, and PoH pre-solves it. The trade-off is hardware: running the delay function at speed needs serious machines, which pushes validators toward data centers and feeds Solana's cloud-concentration weakness.

## Related terms

[consensus](https://web3decentralization.com/glossary/consensus/) ·
[proof of stake](https://web3decentralization.com/glossary/proof-of-stake/) · [blockchain](https://web3decentralization.com/glossary/blockchain/)
