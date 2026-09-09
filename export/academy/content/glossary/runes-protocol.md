---
title: "Runes Protocol"
slug: "runes-protocol"
canonical_url: "https://web3decentralization.com/glossary/runes-protocol/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 07:52:59"
---
Runes is Casey Rodarmor's UTXO-native fungible-token protocol for Bitcoin — the cleaner successor to [BRC-20](https://web3decentralization.com/glossary/brc-20/): balances live in [UTXOs](https://web3decentralization.com/glossary/utxo/) instead of inscription bloat, transfers work like normal Bitcoin transactions, and indexers track far less junk.

## How it works

Etching creates a rune with supply rules; minting and transfers ride standard UTXO mechanics (including OP_RETURN payloads), so wallets and infrastructure handle runes almost like BTC itself. Launched at the 2024 halving to spectacular fee mania.

## Why it matters for decentralization

UTXO-native design inherits Bitcoin's verification properties instead of bolting on indexer-trust — strictly better architecture than BRC-20 for the same speculation. It also concentrates new fee revenue to miners (security budget!) while pricing out small payments during manias. Same trade, sharper edges.

## Risks & trade-offs

Still indexer-dependent for balances; launch manias repeatedly break fee estimators; most runes trend to zero like all memecoins; and protocol churn (developers keep superseding standards) strands early tooling.

## FAQ

**Runes vs BRC-20?** Same casino, better plumbing: UTXO-native, lighter indexing, saner wallets. Neither is enforced by Bitcoin consensus.

**Do runes help Bitcoin security?** Fee revenue, yes — manias pay miners real money. Whether speculation-fees are a *healthy* security budget is the open question.

**Should beginners touch them?** Only with dust money and a real Bitcoin wallet that understands inscriptions. Exchange "runes" are IOUs, not runes.

## Related terms

[bitcoin](https://web3decentralization.com/glossary/bitcoin/) · [BRC-20](https://web3decentralization.com/glossary/brc-20/) ·
[ordinals](https://web3decentralization.com/glossary/ordinals/) · [UTXO](https://web3decentralization.com/glossary/utxo/)
