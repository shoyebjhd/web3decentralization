---
title: "Fraud Proof"
related: [optimistic-rollup, data-availability, bridge]
---

A fraud proof is how optimistic systems catch cheating: anyone watching can
submit cryptographic evidence that a posted state transition was invalid,
triggering re-execution on-chain and slashing the liar. Security assumes at
least one honest watcher plus available data to check against.

## Why it matters

The whole optimistic-rollup model (and week-long withdrawal windows) rests on
this mechanism actually working in practice — funded watchers, published data,
and users patient enough to wait. "Valid unless challenged" is only as strong
as the challengers who show up.

**Related:** [optimistic rollup](glossary/optimistic-rollup.md) ·
[data availability](glossary/data-availability.md) · [bridge](glossary/bridge.md)