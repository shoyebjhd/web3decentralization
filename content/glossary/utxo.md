---
title: "UTXO"
related: [bitcoin, transaction, wallet]
---

UTXO — Unspent Transaction Output — is Bitcoin's accounting model: your
"balance" is really a pile of unspent outputs from past transactions, and
spending means consuming some UTXOs and creating new ones (with change back
to you). No accounts, just a graph of spendable chunks.

## Why it matters

The UTXO model is why Bitcoin is simple to verify and hard to censor — every
coin's history is traceable, and validation is stateless math. It's also why
Bitcoin wallets manage "coin selection" behind the scenes, and why privacy
tools like CoinJoin work by mixing UTXOs. Ethereum chose accounts instead;
the trade-off shapes everything built on each.

**Related:** [bitcoin](bitcoin.md) · [transaction](transaction.md) ·
[wallet](wallet.md)