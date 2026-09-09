---
title: "ZK Rollup"
related: [rollup, zero-knowledge-proof, layer-2]
---

A ZK rollup executes transactions off-chain and posts a
[zero-knowledge proof](zero-knowledge-proof.md) to Ethereum proving the new
state is correct. No challenge window, no trust in watchers — the math itself
guarantees validity, and withdrawals finalize in minutes.

## Why it matters

ZK rollups are the endgame scaling design: Ethereum-level security with
near-instant finality. They're harder to build (proving is computationally
heavy), and most still run centralized sequencers and upgrade keys — so the
*prover* is trustless while the *operator* often isn't, yet.

**Related:** [rollup](rollup.md) ·
[zero-knowledge proof](zero-knowledge-proof.md) · [layer 2](layer-2.md)