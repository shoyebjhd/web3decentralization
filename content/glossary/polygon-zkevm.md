---
title: "Polygon zkEVM"
related: [zk-rollup, ethereum, validity-proof]
---

Polygon zkEVM is a zero-knowledge rollup aiming for full EVM equivalence:
deploy Ethereum contracts unchanged, with [validity proofs](glossary/validity-proof.md)
settling to Ethereum. The pitch is Ethereum's developer experience at L2
prices with cryptographic (not optimistic) security.

## How it works

Batches execute off-chain, ZK proofs attest correctness, Ethereum verifies
cheaply. EVM equivalence means existing tooling, wallets, and contracts work
unaltered — the lowest migration friction in the ZK space.

## Why it matters for decentralization

EVM-equivalence concentrates developer mindshare (good for adoption) while
the prover/sequencer stack remains operated — validity is trustless, liveness
isn't yet. Like all ZK rollups, grade operator independence separately from
cryptographic guarantees.

## Risks & trade-offs

Operator centralization (sequencer + prover); proving costs passed to users;
competition from maturing optimistic ecosystems; and Polygon's multi-product
strategy splitting focus.

## FAQ

**zkEVM vs optimistic rollups?** Math-proof finality in minutes vs
challenge-window finality in a week. Stronger guarantees, heavier machinery.

**Can I use MetaMask unchanged?** Yes — that's the entire point of EVM
equivalence. Same addresses, same tooling.

**Who runs it?** Polygon Labs operates proving and sequencing today, with
staged decentralization milestones published.

**Related:** [ZK rollup](glossary/zk-rollup.md) ·
[ethereum](glossary/ethereum.md) · [validity proof](glossary/validity-proof.md)