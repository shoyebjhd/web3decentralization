---
title: "Runes Protocol"
related: [bitcoin, brc-20, ordinals, utxo]
---

Runes is Casey Rodarmor's UTXO-native fungible-token protocol for Bitcoin —
the cleaner successor to [BRC-20](glossary/brc-20.md): balances live in
[UTXOs](glossary/utxo.md) instead of inscription bloat, transfers work like
normal Bitcoin transactions, and indexers track far less junk.

## How it works

Etching creates a rune with supply rules; minting and transfers ride standard
UTXO mechanics (including OP_RETURN payloads), so wallets and infrastructure
handle runes almost like BTC itself. Launched at the 2024 halving to
spectacular fee mania.

## Why it matters for decentralization

UTXO-native design inherits Bitcoin's verification properties instead of
bolting on indexer-trust — strictly better architecture than BRC-20 for the
same speculation. It also concentrates new fee revenue to miners (security
budget!) while pricing out small payments during manias. Same trade, sharper
edges.

## Risks & trade-offs

Still indexer-dependent for balances; launch manias repeatedly break fee
estimators; most runes trend to zero like all memecoins; and protocol churn
(developers keep superseding standards) strands early tooling.

## FAQ

**Runes vs BRC-20?** Same casino, better plumbing: UTXO-native, lighter
indexing, saner wallets. Neither is enforced by Bitcoin consensus.

**Do runes help Bitcoin security?** Fee revenue, yes — manias pay miners real
money. Whether speculation-fees are a *healthy* security budget is the open
question.

**Should beginners touch them?** Only with dust money and a real Bitcoin
wallet that understands inscriptions. Exchange "runes" are IOUs, not runes.

**Related:** [bitcoin](glossary/bitcoin.md) · [BRC-20](glossary/brc-20.md) ·
[ordinals](glossary/ordinals.md) · [UTXO](glossary/utxo.md)