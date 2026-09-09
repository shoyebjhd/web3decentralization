---
title: "BitVM"
related: [bitcoin, rollup, zero-knowledge-proof]
---

BitVM is a design for Turing-complete contracts on Bitcoin *without* a fork:
two parties lock funds, one asserts computation results, disputes resolve
through an on-chain challenge game of pre-signed transactions. Optimistic
verification, Bitcoin-native, enormously complex in practice.

## How it works

Off-chain execution plus on-chain fraud resolution — the optimistic-rollup
playbook adapted to Bitcoin's limited scripting. Challenger and operator
exchange challenges through taproot trees; the chain only adjudicates
disagreements, which honest parties always win (in theory).

## Why it matters for decentralization

If it works at scale, Bitcoin gains rollup-like expressiveness without
changing consensus — the holy grail of conservative scaling. The honest
status: brilliant theory, brutal engineering reality (huge pre-signed
transaction trees, capital-intensive operators). Watch working deployments,
not whitepapers.

## Risks & trade-offs

Operator centralization (who can afford the challenge capital?); liveness
assumptions (someone must always watch); complexity risk in dispute trees;
and the graveyard of "Bitcoin L2s" that turned out to be multisig sidechains.

## FAQ

**BitVM vs real rollups?** Same security *model* (fraud proofs), vastly
harder engineering on Bitcoin script. Ethereum rollups inherit full
programmability; BitVM fights for every opcode.

**Is any BitVM live?** Bridges and early deployments claim lineage; verify
whether dispute resolution is actually trustless or committee-guarded.

**Why does it matter if it's so hard?** Because forkless scaling preserves
Bitcoin's governance conservatism — its most valuable property.

**Related:** [bitcoin](glossary/bitcoin.md) · [rollup](glossary/rollup.md) ·
[zero-knowledge proof](glossary/zero-knowledge-proof.md)