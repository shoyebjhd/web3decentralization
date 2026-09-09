---
title: "Merkle Tree"
slug: "merkle-tree"
canonical_url: "https://web3decentralization.com/glossary/merkle-tree/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 03:26:10"
---
A Merkle tree is a structure that folds thousands of [hashes](https://web3decentralization.com/glossary/hash/) into a single root hash. Each transaction hashes, pairs of hashes hash again, and so on upward. To prove a transaction is inside a block, you only need log₂(n) of those hashes — not the whole block.

## Why it matters

Merkle trees are why light wallets work: a phone can verify "this transaction is in this block" by checking a handful of hashes instead of downloading the entire blockchain. Every major chain uses them; they're the quiet performance miracle under the hood.

## Related terms

[hash](https://web3decentralization.com/glossary/hash/) · [block](https://web3decentralization.com/glossary/block/) ·
[blockchain](https://web3decentralization.com/glossary/blockchain/)
