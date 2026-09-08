---
chain: arb
name: Arbitrum
consensus: Optimistic Rollup (L1 Ethereum Settlement + BOLD Fraud Proofs)
composite: 62.7
---

# Arbitrum Decentralization Audit

Arbitrum is an Ethereum rollup that settles on Ethereum L1 while running cheap, fast transactions. This audit scores its decentralization across four pillars —
infrastructure, capital, governance, and software — using the methodology in
[data/methodology.md](../../data/methodology.md).

**Composite decentralization score: 62.7 / 100** · *High security inherited from Ethereum L1; Stage 1 rollup with active DAO governance and permissionless fraud proofs*

## Four pillars

- **Infrastructure (30%)** — 64/100 · Nakamoto 4 (L1 DA) · Centralized sequencer managed by Offchain Labs; offset by Ethereum L1 data availability and permissionless BOLD validation
- **Capital (25%)** — 58/100 · Nakamoto 6 · Widely distributed ARB governance token via decentralized community airdrop and active treasury
- **Governance (25%)** — 68/100 · Nakamoto 0 · Fully on-chain Arbitrum DAO with binding execution; 9/12 multisig Security Council emergency backup
- **Software (20%)** — 60/100 · Nakamoto 1 · Arbitrum Nitro architecture with multi-language Stylus (Rust, C++) VM support

## What the score means

- Infrastructure (64): The sequencer is a single point of failure for real-time latency, but the BOLD (Bounded Liquidity Delay) permissionless dispute protocol ensures verifiable state settlement without centralized gatekeeping.
- Capital (58): ARB token distribution was among the broadest in crypto history, preventing single-whale governance capture.
- Governance (68): Arbitrum features one of the most mature on-chain DAOs in the ecosystem, with code-enforced treasury execution and democratic constitutional upgrades.
- Software (60): The Nitro execution environment provides battle-tested EVM equivalency alongside WASM-based Stylus execution.

## See it live

- [Interactive audit & scorecard](/terminal/chains/arb)
- [Embed this scorecard](/terminal/embed/card.html?chain=arb)
- Compare against other chains in the [terminal](/terminal/)
