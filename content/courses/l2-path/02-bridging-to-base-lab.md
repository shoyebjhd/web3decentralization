---
title: "Lab: Bridging to Base Safely"
order: 2
course: l2-path
---

**Objective:** move assets between Ethereum and Base without becoming a bridge-hack statistic.

[Bridges](glossary/bridge.md) lock assets on one chain and mint representations on the other. The official Base bridge is the safest path; third-party bridges trade speed for extra trust assumptions.

## Concept: what the bridge actually does

Your ETH locks in an Ethereum contract; an equal amount appears on Base. Coming back reverses it (with the ~7-day optimistic challenge window for withdrawals to L1). Every step is verifiable on both explorers — the bridge has no magic, only contracts you should read.

## Hands-on lab (testnet, free)

1. On Sepolia, open the official Base testnet bridge (verify domain twice).
2. Bridge 0.01 test ETH → Base Sepolia. Record both transaction hashes.
3. On Base Sepolia, confirm balance, then bridge 0.005 back. Watch the challenge timer start.
4. Look up the bridge contracts on Etherscan: find the lock contract and your deposit event.

## Safety checklist

- Official bridge only for size; third-party bridges only for small, urgent amounts.
- Never bridge during active exploit rumors — pause and verify on official channels.
- Keep a record of every crossing (hashes both sides) for taxes and recovery.
- Remember: bridged assets inherit the *bridge's* security, not just the chains'.

## Related glossary

- [Bridge](glossary/bridge.md) · [Base Chain](glossary/base-chain.md) · [Transaction](glossary/transaction.md)

**Next lesson:** Optimism vs Arbitrum vs Base — choosing your L2.