---
title: "Cryptography"
related: [hash, public-key, private-key]
---

Cryptography is the math that keeps blockchains safe: one-way fingerprints
([hashes](hash.md)), a keypair where a public key derives an address and a
private key signs, and digital signatures that prove *you* authorized a
transaction without revealing the key.

## Why it matters

Crypto-replacements-of-trust only work because of these primitives. Anyone can
verify a signature, but no one can forge one without the private key — that's
what lets strangers transfer value over an open network with no middleman.
Understanding cryptography *slightly* is what separates confident users from
scared ones.

**Related:** [hash](hash.md) · [public key](public-key.md) ·
[private key](private-key.md)