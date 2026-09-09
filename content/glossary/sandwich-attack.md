---
title: "Sandwich Attack"
related: [mev, front-running, slippage]
---

A sandwich attack wraps your trade in two attacker trades — buy just before
you, sell just after — profiting from the price move your own order caused.
Your [slippage](slippage.md) tolerance is literally their profit margin: the
higher you set it, the bigger sandwich they can build.

## Why it matters

Sandwiches are the clearest proof that "decentralized" doesn't mean "fair":
the rules are public and the exploitation is automatic. Keep slippage tight,
use MEV-protected RPCs, and treat any unexpectedly bad execution price as a
sandwich until proven otherwise.

**Related:** [MEV](mev.md) · [front-running](front-running.md) ·
[slippage](slippage.md)