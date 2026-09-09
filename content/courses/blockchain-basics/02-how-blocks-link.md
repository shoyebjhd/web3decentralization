---
title: "How Blocks Link Together"
order: 2
course: blockchain-basics
---

A [block](glossary/block.md) is a batch of [transactions](glossary/transaction.md)
plus three critical ingredients: a timestamp, a fingerprint of the previous
block, and proof the block follows the rules. That fingerprint chain is the
entire security model — understand it and you understand "immutable."

## The link, concretely

Each block header contains the [hash](glossary/hash.md) of the header before
it. Change one character of any old transaction → its block's hash changes →
the next block's "previous hash" no longer matches → every later block breaks.
To rewrite history you'd have to redo the proof for every block after your
edit, faster than the honest network extends the chain. On big networks,
that's physically and economically infeasible.

## What's inside a block

- **Transaction list** (summarized by a [Merkle root](glossary/merkle-tree.md) —
  one hash committing to thousands of transactions).
- **Previous block hash** — the link backward.
- **Timestamp + height** — when, and block number N in the chain.
- **Consensus proof** — the nonce meeting difficulty (PoW) or validator
  signatures (PoS).

## Why "immutable" has an asterisk

Immutability is economic, not magical: it holds while rewriting costs more
than it's worth. Tiny chains with little hash power or stake get rewritten
([51% attacks](glossary/51-percent-attack.md)) regularly. "Immutable" always
means "*prohibitively* expensive to mutate" — and the price tag is the network's
decentralization.

> The chain is a snowball of proofs rolling downhill: each new block buries
> the past deeper. Finality is just depth plus cost.

**Next lesson:** nodes and networks — who actually runs all this?