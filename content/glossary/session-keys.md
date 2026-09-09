---
title: "Session Keys"
related: [account-abstraction, wallet, dapp]
---

Session keys are limited-permission keys for blockchain apps: instead of
approving every move (or handing over god-mode access), your smart wallet
issues a temporary key allowed to do *only* specific actions — play this
game, trade under this size, expire in an hour. Gaming and high-frequency
dApps depend on them.

## How it works

Under [account abstraction](glossary/account-abstraction.md), the wallet's
validation logic recognizes session keys with encoded policies (contract
allowlist, value caps, expiry). The session key signs freely within policy;
anything outside reverts. Revocation is one transaction.

## Why it matters for decentralization

Session keys make self-custody *usable* at app speed — the missing piece
between vault-grade security and playable UX. Done right, users keep
sovereignty while apps feel Web2-smooth. Done sloppily (over-broad policies,
hidden approvals), they're just prettier unlimited approvals.

## Risks & trade-offs

Policy bugs granting more than intended; phishing that tricks users into
issuing sessions (same social attacks, new UX); revocation UX most wallets
haven't built well; and app dependence on wallet support.

## FAQ

**Session keys vs approvals?** Approvals grant contracts rights over *funds*;
sessions grant keys rights over *actions* — scoped, expiring, revocable.
Strictly better primitive, when wallets support it.

**What should a safe session look like?** Named app, explicit contract list,
spending cap, short expiry. Anything vaguer deserves rejection.

**Mainstream yet?** Gaming chains and smart wallets lead; EOA users wait for
migration tooling. The direction is one-way.

**Related:** [account abstraction](glossary/account-abstraction.md) ·
[wallet](glossary/wallet.md) · [dApp](glossary/dapp.md)