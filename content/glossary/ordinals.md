---
title: "Ordinals"
related: [bitcoin, nft, taproot]
---

Ordinals inscribe data directly onto individual satoshis — numbering them in
mined order and attaching images, text, or code — creating Bitcoin-native
NFTs without any sidechain. Enabled by [Taproot](glossary/taproot.md) and
SegWit discount mechanics, they exploded in 2023.

## Why it matters

Ordinals reopened Bitcoin's culture war: purists call them spam bloating the
chain; builders call them fee revenue securing mining post-subsidy. Whatever
your view, they proved demand for Bitcoin block space beyond payments — and
forced everyone to price what "spam" is worth when fees pay for security.

## Inscriptions: how they work

An inscription writes arbitrary data (image, text, code, even
[BRC-20](glossary/brc-20.md) token operations) into a transaction's witness
section, permanently attaching it to a specific satoshi. The sat's ordinal
number orders it; explorers index it; wallets trade it. No smart contract
involved — Bitcoin's base layer simply carries the bytes forever, which is
exactly why critics call it chain bloat and supporters call it permissionless
publishing.

**Related:** [bitcoin](glossary/bitcoin.md) · [NFT](glossary/nft.md) ·
[taproot](glossary/taproot.md)