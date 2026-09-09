---
title: "Nodes and Networks"
order: 3
course: blockchain-basics
---

A [node](glossary/node.md) is a computer running the blockchain's software
and holding (some of) its history. Thousands of independent nodes, run by
different people in different places, *are* the network — there is no central
server room to find.

## The species of nodes

- **Full nodes** verify everything: every transaction, every block, from
  [genesis](glossary/genesis-block.md). The backbone of trustlessness.
- **Miners/validators** also propose blocks (and earn rewards) on top of
  verifying.
- **Light clients** check only proofs ([Merkle branches](glossary/merkle-tree.md))
  — enough for phones and browsers without downloading terabytes.
- **Archive nodes** keep every historical state, serving explorers and analysts.

## Why node distribution is the decentralization question

Count means little; *independence* means everything. Ten thousand nodes on
three cloud providers in two countries can be switched off by two companies
and one government request. Geography, ownership, hosting, and client
diversity are the real metrics — exactly what W3D's infrastructure pillar
scores.

## Can you run one?

On many chains, yes, on a laptop (Bitcoin, Ethereum light/full) — syncing
takes time and disk, but no permission. On heavy chains (Solana-class),
requirements price out hobbyists, which is itself a decentralization datum.
Running a node is the most direct way to stop trusting and start verifying.

> Every node is a vote that the rules are the rules. The more independent
> voters, the harder the election is to steal.

**Next lesson:** consensus without bosses.