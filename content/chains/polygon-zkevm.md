---
title: "Polygon zkEVM Decentralization Audit"
description: "chain: polygon-zkevm name: Polygon zkEVM consensus: Zero-Knowledge Rollup (validity proof) â€” settles to Ethereum related: [zero-knowledge-proof, zk-ro..."
---

# Polygon zkEVM Decentralization Audit

Polygon zkEVM is a zero-knowledge rollup that proves its state transitions to
Ethereum with validity proofs â€” every batch comes with a cryptographic
attestation, so you don't have to *trust* the sequencer's arithmetic, only the
proof. That choices moves the decentralization question from "can anyone verify"
to "**who runs the proving + sequencing machinery, and can that be taken over**."

## Why it matters

A zk-rollup's decentralization profile looks different from an optimistic one,
and it's worth knowing the difference before you read the score:

- **No challenge window.** Unlike optimistic rollups, there's no
  assume-valid-until-disputed period â€” validity proofs are sound up front, so
  the "challenger diversity" pillar is defanged; the soft spot shifts to
  *prover concentration* and *who publishes state roots*.
- **Prover licensing is the new node:** running a full prover is materially
  heavier than running an L2 node, so real-world participation is thinner and
  more concentrated â€” a genuine decentralization cost many zk scorecards hide
  behind "no fraud assumptions."

## What to watch

- **Sequencer + prover operators:** one actor or several?
- **State-root publication + forced-inclusion:** can an external transaction
  put a state root on L1 when the sequencer misbehaves?
- **Upgradeability of the proving setup:** changes to zk-circuits are the
  governance equivalent of changing the rulebook, so timelock + delay matter.

## See it live

- [Interactive audit & scorecard](/terminal/chains/polygon-zkevm)
- [Run Polygon zkEVM in the terminal](/terminal/?tool=nakamoto-coefficient&chain=polygon-zkevm)
