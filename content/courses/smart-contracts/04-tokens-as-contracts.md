---
title: "Tokens as Contracts: ERC-20 Anatomy"
order: 4
course: smart-contracts
---

An [ERC-20](glossary/erc-20.md) token isn't a coin object — it's a contract
holding a spreadsheet: addresses mapped to balances, plus rules for moving
numbers between rows. "Sending tokens" = the contract subtracting from your
row and adding to theirs.

## The five functions that matter

- `totalSupply()` — how many exist.
- `balanceOf(address)` — anyone's balance, publicly readable.
- `transfer(to, amount)` — move your own tokens.
- `approve(spender, amount)` — let a dApp spend up to X of yours (the
  permission behind every DEX trade — and every approval-scam drain).
- `transferFrom(from, to, amount)` — the dApp moving approved tokens.

## What this explains

- **Why approvals are dangerous:** `approve` hands a contract a blank check
  up to the amount. Unlimited approvals to shady contracts = the #1 drain
  vector. (Revoke stale ones regularly.)
- **Why tokens can be frozen:** many ERC-20s include blacklist/pause
  functions controlled by the issuer — USDC can freeze sanctioned addresses.
  "Decentralized token" with an admin freeze switch is custodial with extra
  steps.
- **Why fake tokens work:** deploying an ERC-20 costs minutes. Same name,
  same symbol, different contract address — the address is the identity, and
  the name means nothing.

## The 30-second token check (reprise)

Contract verified? Holder distribution sane? Admin functions (mint/pause/
blacklist) present and owned by whom? Liquidity locked? Four questions,
one explorer, most scams filtered.

> A token is a spreadsheet with rules. Read the rules (the contract), count
> the rows (holders), and check who holds the eraser (admin keys).

**Next lesson:** DeFi building blocks — how protocols compose.