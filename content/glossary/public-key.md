---
title: "Public Key"
related: [private-key, address, cryptography]
---

A public key is the half of a keypair that's safe to share. Your wallet derives
an [address](address.md) from it; the public key proves a digital signature
truly came from the matching private key — without revealing the key itself.

## Why it matters

The public/private split is the heart of crypto identity: you can *prove*
ownership and authorize spending with the private key while exposing only the
public side. Share your public key and address freely; share the private key
once and you've lost everything tied to it.

**Related:** [private key](private-key.md) · [address](address.md) ·
[cryptography](cryptography.md)