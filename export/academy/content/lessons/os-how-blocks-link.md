---
title: "How Blocks Link Together"
slug: "os-how-blocks-link"
canonical_url: "https://web3decentralization.com/lesson/os-how-blocks-link/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:52:57"
course: "blockchain-basics"
course_title: "Blockchain Basics"
difficulty: "beginner"
order: "102"
---
A [block](https://web3decentralization.com/glossary/block/) is a batch of [transactions](https://web3decentralization.com/glossary/transaction/) plus three critical ingredients: a timestamp, a fingerprint of the previous block, and proof the block follows the rules. That fingerprint chain is the entire security model — understand it and you understand "immutable."

## The link, concretely

Each block header contains the [hash](https://web3decentralization.com/glossary/hash/) of the header before it. Change one character of any old transaction → its block's hash changes → the next block's "previous hash" no longer matches → every later block breaks. To rewrite history you'd have to redo the proof for every block after your edit, faster than the honest network extends the chain. On big networks, that's physically and economically infeasible.

## What's inside a block

- **Transaction list** (summarized by a [Merkle root](https://web3decentralization.com/glossary/merkle-tree/) —   one hash committing to thousands of transactions). - **Previous block hash** — the link backward. - **Timestamp + height** — when, and block number N in the chain. - **Consensus proof** — the nonce meeting difficulty (PoW) or validator   signatures (PoS).

## Why "immutable" has an asterisk

Immutability is economic, not magical: it holds while rewriting costs more than it's worth. Tiny chains with little hash power or stake get rewritten ([51% attacks](https://web3decentralization.com/glossary/51-percent-attack/)) regularly. "Immutable" always means "*prohibitively* expensive to mutate" — and the price tag is the network's decentralization.

> The chain is a snowball of proofs rolling downhill: each new block buries
> > the past deeper. Finality is just depth plus cost.

**Next lesson:** nodes and networks — who actually runs all this?
