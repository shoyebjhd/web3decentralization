---
title: "Blobs"
related: [eip-4844, data-availability, rollup, proto-danksharding]
---

Blobs are large binary data chunks rollups attach to Ethereum blocks since
[EIP-4844](glossary/eip-4844.md) — up to ~128 KB each, priced on their own
fee market, and auto-deleted after about 18 days. They're how L2s publish
transaction data without paying L1 execution prices.

## How it works

A rollup bundles thousands of L2 transactions, posts the bundle as blob data,
and references it from an L1 transaction. Consensus nodes hold blobs just
long enough for fraud/validity verification; then they're pruned to keep node
requirements low. Indexers and the rollups themselves keep permanent copies
for explorers.

## Why it matters for decentralization

Blobs are the price mechanism that keeps settlement decentralized: if posting
data to Ethereum cost 10x more, rollups would retreat to trusted data
committees. Cheap on-chain availability preserves the "verify, don't trust"
property for anyone running a node.

## Risks & trade-offs

Fixed blob space means congestion returns under heavy demand; pruned history
centralizes archival power in a few indexers; and blob-fee spikes can still
freeze small rollups out during manias.

## FAQ

**Blobs vs calldata?** Calldata lives forever and costs execution-gas prices;
blobs are temporary and ~10x cheaper — purpose-built for rollup data.

**Who stores blobs long-term?** Rollup teams, explorers, and archivists — not
the protocol. Verify-then-prune is the whole design.

**Can blob fees spike?** Yes — EIP-4844 added a separate fee market that also
gets expensive when blob demand exceeds supply.

**Related:** [EIP-4844](glossary/eip-4844.md) ·
[data availability](glossary/data-availability.md) · [rollup](glossary/rollup.md) ·
[proto-danksharding](glossary/proto-danksharding.md)