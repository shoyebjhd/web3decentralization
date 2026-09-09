---
title: "Deploy on Base Testnet"
order: 6
course: l2-path
---

**Objective:** deploy a real contract to Base Sepolia with zero real money at risk.

You already read a storage contract in Smart Contracts 101. Now ship one: the full loop from code to live testnet contract builds the muscle every later lesson assumes.

## Concept: what deploying means

Deployment sends a transaction whose *payload creates* a contract; the network returns its address. On testnets the mechanics are identical to mainnet — same tools, same explorers, free fake money.

## Hands-on lab (testnet, free)

1. Get Base Sepolia ETH from a [faucet](glossary/faucet.md).
2. In Remix (browser IDE, no install), paste the storage contract from Smart Contracts 101, compile, and deploy via injected provider to Base Sepolia.
3. Call `store(42)`, then `retrieve()` — read the values back.
4. Find your contract on the Base Sepolia explorer; verify the creation transaction and try reading it there too.

## Safety checklist

- Testnet wallet only — never connect a mainnet wallet to experimental tooling.
- Never paste mainnet keys or seeds into any IDE, tutorial site, or "helper" tool.
- Confirm the network badge says Sepolia *before* every deploy click.

## Related glossary

- [Faucet](glossary/faucet.md) · [Smart Contract](glossary/smart-contract.md) · [Base Chain](glossary/base-chain.md)

**Next lesson:** verifying contracts on explorers.