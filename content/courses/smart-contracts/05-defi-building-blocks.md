---
title: "DeFi Building Blocks: How Protocols Compose"
order: 5
course: smart-contracts
---

[Composability](glossary/composability.md) means contracts call each other:
a vault deposits into a lending pool that prices via a DEX
[oracle](glossary/oracle.md). One user action can ripple through five
protocols in a single [transaction](glossary/transaction.md) — atomic, so it
all succeeds or all reverts together.

## The standard stack (bottom to top)

1. **Assets** ([ERC-20s](glossary/erc-20.md), ETH, stables) — the raw material.
2. **DEXs/AMMs** — price discovery + swapping.
3. **Lending pools** — interest + leverage, priced by oracles.
4. **Vaults/aggregators** ([Yearn-style](glossary/yield-vault.md)) — automated
   strategies across 1–3.
5. **Front ends** — the website you click, which is *not* the protocol (the
   contracts work identically without it).

## Why composability multiplies both innovation and risk

- **Innovation:** a new product launches by wiring existing contracts —
  days, not years; no partnerships needed.
- **Risk:** every dependency is a failure point you inherit. Oracle wrong?
  Lending pool below drains. Base DEX exploited? Everything stacked on its
  prices follows. The 2022 collapses were composability cascades wearing
  different logos.

## Reading a protocol's dependencies (5 minutes)

List what it calls: which DEX for prices, which oracle, which bridge for
cross-chain assets, who holds upgrade keys. That list *is* its risk profile —
a protocol is only as trustless as its most trusted dependency.

> Money Legos snap together beautifully and transmit cracks perfectly. Build
> on audited bases, and know exactly which bricks you're standing on.

**Next lesson:** when contracts fail — famous hacks as case studies.