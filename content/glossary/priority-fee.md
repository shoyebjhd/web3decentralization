---
title: "Priority Fee"
related: [gas, base-fee, validator]
---

The priority fee ("tip") is the optional extra you pay validators to jump the
queue — on top of the burned [base fee](glossary/base-fee.md). Set it high in
a gas war (NFT mints, liquidations); set it near zero when the chain is quiet
and you'll still confirm.

## Why it matters

Tips are where MEV-adjacent games play out: searchers outbid you, wallets
overpay by default, and during manias the tip dwarfs the base fee. Learning
to set fees manually — base plus a sane tip — routinely saves frequent users
more than any "gas token" gimmick ever will.

**Related:** [gas](glossary/gas.md) · [base fee](glossary/base-fee.md) ·
[validator](glossary/validator.md)