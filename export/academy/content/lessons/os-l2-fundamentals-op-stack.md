---
title: "L2 Fundamentals: The OP Stack Model"
slug: "os-l2-fundamentals-op-stack"
canonical_url: "https://web3decentralization.com/lesson/os-l2-fundamentals-op-stack/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 08:18:42"
course: "l2-developer-path"
course_title: "L2 Developer Path"
difficulty: "beginner"
order: "101"
---
**Objective:** understand what an L2 is, why the OP Stack design won, and what security you actually inherit from Ethereum.

An L2 processes transactions off Ethereum and settles proofs back to it. The [OP Stack](https://web3decentralization.com/glossary/op-stack/) made launching such chains a commodity: standard open-source components (execution, batching, proposing, fault proofs) that anyone can deploy — [Base](https://web3decentralization.com/glossary/base-chain/), OP Mainnet, and dozens more run it.

## Concept: execution vs settlement vs data

Every rollup splits three jobs: **execute** (run transactions fast off-chain), **settle** (post results + proofs to Ethereum), **data** (publish transaction data as [blobs](https://web3decentralization.com/glossary/blobs/) so anyone can verify). Ethereum provides settlement + data; the L2 provides speed. Security = Ethereum's, *provided* the data is really published and exits actually work.

## Hands-on lab (testnet, free)

1. Get Sepolia ETH from a [faucet](https://web3decentralization.com/glossary/faucet/).
2. Bridge a tiny amount to Base Sepolia via the official testnet bridge.
3. Compare: note the L1 transaction (expensive, slow) vs the L2 experience (cheap, fast).
4. Find both transactions on their respective explorers. You just used two chains at once.

## Safety checklist

- Only use official bridge domains (bookmark them).
- Testnet first, always — real funds only after the full loop works.
- Verify the L2's stage and upgrade keys on [L2Beat](https://web3decentralization.com/glossary/l2beat/) before trusting size to it.

## Related glossary

- [Layer 2](https://web3decentralization.com/glossary/layer-2/) · [Optimistic Rollup](https://web3decentralization.com/glossary/optimistic-rollup/) · [OP Stack](https://web3decentralization.com/glossary/op-stack/)

**Next lesson:** Bridging to Base, step by step.
