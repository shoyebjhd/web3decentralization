---
title: "Hash"
related: [cryptography, block, merkle-tree]
---

A hash is a fixed-length fingerprint computed from any data — a transaction, a
block, a file — by a one-way function (SHA-256 on Bitcoin). Same input always
produces the same hash, but you can't work backwards from the hash to the
input.

## Why it matters

Hashes are what make blockchains tamper-evident: change one character of any
old transaction and every hash above it changes, which everyone's node would
notice. They're also the engine of mining (hashing repeatedly until a target
is met) and of tracking data integrity anywhere.

**Related:** [cryptography](cryptography.md) · [block](block.md) ·
[merkle tree](merkle-tree.md)