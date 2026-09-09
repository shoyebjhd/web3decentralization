---
title: "Paymaster"
related: [account-abstraction, erc-4337, gas, bundler]
---

A paymaster is an [ERC-4337](glossary/erc-4337.md) contract that pays gas on a
user's behalf — enabling gasless transactions, fees in any token, and dApps
that sponsor their users' onboarding. You sign intent; the paymaster settles
the bill under programmable rules.

## How it works

Inside ERC-4337's flow, the paymaster contract validates sponsorship policy
(allowlisted app? spending cap? token accepted?) and fronts the ETH. It can
pull payment in ERC-20s, enforce per-user limits, or subsidize fully.
[Bundlers](glossary/bundler.md) include the sponsored operation like any other.

## Why it matters for decentralization

Paymasters remove crypto's cruelest UX tax — "buy ETH before using anything" —
without reintroducing custodians: policy is code, verifiable on-chain. The
watch-point is dependence: if one paymaster subsidizes a whole ecosystem, its
policy choices (and outages) become choke points. Diverse, competing
paymasters keep the property that matters.

## Risks & trade-offs

Sponsorship abuse (bots draining subsidies); paymaster centralization per app;
policy bugs locking users out; and obscured true costs when fees hide inside
"free" UX.

## FAQ

**Is gasless really free?** No — someone pays (the app, a sponsor, or you in
another token). "Gasless" means invisible, not absent.

**Do I trust the paymaster?** With your transaction flow, partially — it can
refuse service but (in standard designs) can't steal funds. Verify its policy
code like any contract.

**Paymaster vs relayer?** Same idea, new standard: paymasters are the
ERC-4337-native, permissionless version of old meta-transaction relayers.

**Related:** [account abstraction](glossary/account-abstraction.md) ·
[ERC-4337](glossary/erc-4337.md) · [gas](glossary/gas.md) ·
[bundler](glossary/bundler.md)