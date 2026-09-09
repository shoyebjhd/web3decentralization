---
title: "Chain Abstraction"
related: [interoperability, bridge, account-abstraction]
---

Chain abstraction is the UX endgame: users interact with *apps*, never chains
— no switching networks, no bridging manually, no gas-token Tetris. Solvers,
[account abstraction](glossary/account-abstraction.md), and shared standards
handle the cross-chain plumbing invisibly underneath.

## How it works

[intents](glossary/intent-based.md) ("swap X for Y, best execution") get
filled by competing solvers across chains; smart accounts manage gas and
routing; [bridges](glossary/bridge.md) and messaging layers settle behind the
scenes. The user signs once and receives the outcome.

## Why it matters for decentralization

Abstraction hides complexity — including *whose* infrastructure you're
trusting. A perfectly abstracted app on three centralized sequencers feels
identical to one on decentralized rails. The audit burden shifts from users
(who can't see) to analysts (who must): solver diversity, filler
competition, and fallback paths are the new decentralization metrics.

## Risks & trade-offs

Solver centralization and censorship; opaque routing hiding costs and risks;
single-interface dependence (one frontend, one point of failure); and the
eternal bridge risk underneath it all.

## FAQ

**Isn't this just better UX?** Yes — and UX that obscures trust assumptions
needs *more* auditing, not less. Convenience concentrates power by default.

**Who builds it?** Wallet teams, intent protocols, and modular stacks
converging on standards. No single owner — which is both the promise and the
coordination problem.

**What should I check as a user?** Where solvers compete (vs one filler),
what happens if the interface disappears (direct contract access?), and which
chains actually settle your funds.

**Related:** [interoperability](glossary/interoperability.md) ·
[bridge](glossary/bridge.md) · [account abstraction](glossary/account-abstraction.md)