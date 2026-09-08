---
title: "How to Read a Block Explorer"
---

A [block explorer](glossary/block-explorer.md) is how you verify everything
that happens on-chain. This guide teaches the four lookups that settle 90% of
questions. Etherscan (Ethereum), Solscan (Solana), and Mempool.space (Bitcoin)
all work the same way.

## Lookup 1 — a transaction

Paste a transaction hash (0x…). You get:

- **Status:** Confirmed/Pending/Failed. A *failed* transaction still cost gas.
- **From / To:** the sending and receiving [addresses](glossary/address.md).
- **Value:** what actually moved (and the fee).
- **Network:** which chain this is on. Wrong chain = different truth.

> *"Did my payment arrive?"* → paste the hash. If it says Confirmed and the To
> address is yours, it arrived. Done.

## Lookup 2 — an address

Paste any address. You get its **balance** and **transaction history**
([address](glossary/address.md)). Useful for:

- Check whether a "whale" really holds what they claim.
- Check a token contract's activity (see Lookup 4).
- Audit a [treasury](glossary/treasury.md) or airdrop wallet.

## Lookup 3 — a block

Open the latest block and read: transactions count, fee range, and who built
it (the miner/validator). Watch for **huge average fees** — that means the
network is congested ([gas](glossary/gas.md) is high).

## Lookup 4 — a token contract

Paste a contract address to see **holders list**, **supply**, and **contract
code**. Before touching any token, check:

- Is the code "verified"? Unverified code = unreadable logic = risky.
- Holder list: is supply concentrated in a few wallets?
- Is there a "renounced owner" note? (Ownership can include a
  [rug-pull](glossary/rug-pull.md) switch.)

## Pro tip: the explorer is the liar detector

Every dApp, every "yield," every airdrop claim collapses under the same
question: *show me the transaction.* If it's on-chain, an explorer will show
it. If it's not, no dashboard can make it real.

> Explorers turn "trust the website" into "show the receipt." That shift is
> the entire philosophical leap crypto asks you to make.

**Related:** [block explorer](glossary/block-explorer.md) ·
[transaction](glossary/transaction.md) · [address](glossary/address.md)