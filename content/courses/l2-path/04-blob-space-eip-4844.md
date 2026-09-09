---
title: "Blob Space and EIP-4844, Explained"
order: 4
course: l2-path
---

**Objective:** understand the data layer that made cheap L2s possible — and its limits.

Before [EIP-4844](glossary/eip-4844.md), rollups posted data as expensive L1 calldata. Now they attach [blobs](glossary/blobs.md): ~128 KB chunks on a separate fee market, pruned after ~18 days. L2 fees fell roughly 10x overnight.

## Concept: why temporary data is enough

Fraud and validity verification only need data *while challenges are possible*. After finality, history lives with indexers and explorers — the protocol guarantees availability during the window that matters, not eternal storage. Separate pricing means blob demand doesn't fight your wallet's gas price (until blobs themselves congest).

## Hands-on lab (free)

1. Open any recent Ethereum block on an explorer and find its blob count + blob base fee.
2. Compare an Arbitrum swap fee today vs pre-4844 charts (archived analyses).
3. Watch blob fees during a busy hour: note how an independent fee market behaves.

## Safety checklist

- Blob expiry means *you* archive anything you need permanently (tax records, proofs).
- Blob congestion still prices out small rollups first — diversification across L2s isn't just tribal.
- Don't confuse cheap fees with decentralization; the sequencer question is separate.

## Related glossary

- [EIP-4844](glossary/eip-4844.md) · [Blobs](glossary/blobs.md) · [Data Availability](glossary/data-availability.md)

**Next lesson:** sequencer risks — the centralization hiding in plain sight.