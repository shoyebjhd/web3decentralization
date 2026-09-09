---
title: "BRC-20"
slug: "brc-20"
canonical_url: "https://web3decentralization.com/glossary/brc-20/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 07:52:59"
---
BRC-20 is an experimental fungible-token standard on Bitcoin, built on [Ordinals](https://web3decentralization.com/glossary/ordinals/) inscriptions: JSON blobs declaring deploy, mint, and transfer operations, tracked off-chain by indexers. No smart contracts — social consensus plus indexer software *is* the ledger.

## How it works

Deploy declares supply; users inscribe mint operations; transfers move inscribed sats. Indexers scan Bitcoin blocks and maintain balances. Everyone must trust the same indexer rules, because Bitcoin itself enforces none of this.

## Why it matters for decentralization

BRC-20 stress-tests what "Bitcoin-native" means: tokens secured by Bitcoin's fees and block space but governed by off-chain indexer consensus — a new trust layer wearing orange branding. Fascinating experiment, weaker guarantees than either L1 assets or real L2s. Fee spikes during manias also tax every other Bitcoin user.

## Risks & trade-offs

Indexer centralization (few implementations, social-consensus upgrades); no contract enforcement (double-spend handling is convention); wallet complexity (inscription management is unforgiving); and mania-driven fee markets pricing out payments.

## FAQ

**BRC-20 vs ERC-20?** ERC-20 is enforced by Ethereum code; BRC-20 is enforced by indexer operators agreeing. Different universes of assurance.

**Why build tokens without contracts?** Bitcoin maximalist aesthetics plus speculation. The honest answer includes both ideology and casino demand.

**Future?** **Runes** fixed several BRC-20 inefficiencies (UTXO-native design). The meta keeps evolving.

## Related terms

[bitcoin](https://web3decentralization.com/glossary/bitcoin/) ·
[ordinals](https://web3decentralization.com/glossary/ordinals/) · [token](https://web3decentralization.com/glossary/token/)
