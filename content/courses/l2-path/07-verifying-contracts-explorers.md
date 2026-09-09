---
title: "Verifying Contracts on Explorers"
order: 7
course: l2-path
---

**Objective:** prove a deployed contract matches its advertised code — the single most useful 5-minute check in DeFi.

"Verified" on Etherscan means the published source compiles to the on-chain bytecode. Unverified = unreadable logic = walk away with size.

## Concept: what verification proves (and doesn't)

It proves *this source* produces *that bytecode* — nothing about whether the source is safe, honest, or final (proxies can swap logic later). Verification is necessary, never sufficient.

## Hands-on lab (testnet, free)

1. Take your lesson-6 contract address; check its explorer page — unverified initially.
2. Verify it (flatten or standard-json input via the explorer UI).
3. Read a function on-chain: call `retrieve()` through the explorer's contract tab.
4. Now inspect a *proxy*: find an implementation address slot and note how the logic could change without the address changing.

## Safety checklist

- Interact only with verified contracts when money is involved.
- For proxies, audit the *implementation*, not the friendly front address.
- Check the contract's age and transaction history — fresh + huge inflows = investigate first.

## Related glossary

- [Smart Contract Audit](glossary/smart-contract-audit.md) · [Block Explorer](glossary/block-explorer.md) · [Transaction](glossary/transaction.md)

**Next lesson:** gas optimization 101.