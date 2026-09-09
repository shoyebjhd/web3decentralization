---
title: "L2 Fundamentals: The OP Stack Model"
order: 1
course: l2-path
---

**Objective:** understand what an L2 is, why the OP Stack design won, and what security you actually inherit from Ethereum.

An L2 processes transactions off Ethereum and settles proofs back to it. The [OP Stack](glossary/op-stack.md) made launching such chains a commodity: standard open-source components (execution, batching, proposing, fault proofs) that anyone can deploy — [Base](glossary/base-chain.md), OP Mainnet, and dozens more run it.

## Concept: execution vs settlement vs data

Every rollup splits three jobs: **execute** (run transactions fast off-chain), **settle** (post results + proofs to Ethereum), **data** (publish transaction data as [blobs](glossary/blobs.md) so anyone can verify). Ethereum provides settlement + data; the L2 provides speed. Security = Ethereum's, *provided* the data is really published and exits actually work.

## Hands-on lab (testnet, free)

1. Get Sepolia ETH from a [faucet](glossary/faucet.md).
2. Bridge a tiny amount to Base Sepolia via the official testnet bridge.
3. Compare: note the L1 transaction (expensive, slow) vs the L2 experience (cheap, fast).
4. Find both transactions on their respective explorers. You just used two chains at once.

## Safety checklist

- Only use official bridge domains (bookmark them).
- Testnet first, always — real funds only after the full loop works.
- Verify the L2's stage and upgrade keys on [L2Beat](glossary/l2beat.md) before trusting size to it.

## Related glossary

- [Layer 2](glossary/layer-2.md) · [Optimistic Rollup](glossary/optimistic-rollup.md) · [OP Stack](glossary/op-stack.md)

**Next lesson:** Bridging to Base, step by step.