---
title: "Merkle Tree"
related: [hash, block, blockchain]
---

A Merkle tree is a structure that folds thousands of [hashes](hash.md) into a
single root hash. Each transaction hashes, pairs of hashes hash again, and so
on upward. To prove a transaction is inside a block, you only need log₂(n) of
those hashes — not the whole block.

## Why it matters

Merkle trees are why light wallets work: a phone can verify "this transaction
is in this block" by checking a handful of hashes instead of downloading the
entire blockchain. Every major chain uses them; they're the quiet performance
miracle under the hood.

**Related:** [hash](hash.md) · [block](block.md) ·
[blockchain](blockchain.md)