---
title: "MEV-Boost"
related: [mev, proposer-builder-separation, validator]
---

MEV-Boost is the middleware implementing [proposer-builder separation](glossary/proposer-builder-separation.md)
on Ethereum: validators outsource block construction to specialized builders
via relays, accepting the most profitable header blindly. It now produces the
large majority of Ethereum blocks.

## How it works

Builders assemble MEV-optimized blocks and bid through relays; the proposer's
validator signs the winning header without seeing contents (protecting
against theft); payment settles on-chain to the proposer. Relay diversity is
the whole decentralization story.

## Why it matters for decentralization

MEV-Boost democratized MEV *revenue* (solo validators earn like pros) while
concentrating MEV *power* (a few builders + relays construct nearly
everything). Censorship compliance at the relay layer (OFAC-filtering relays
dominating share) proved the risk is real, not theoretical. Relay diversity
and enshrined PBS are the fixes being built.

## Risks & trade-offs

Relay oligopoly and censorship; builder centralization outpacing validator
decentralization; timing games; and the uncomfortable truth that "neutral"
infrastructure keeps needing patches against its own economics.

## FAQ

**Must validators use MEV-Boost?** No — it's opt-in middleware. Opting out
means leaving significant revenue on the table, which is why adoption is near
total despite being voluntary.

**Does it hurt Ethereum?** It centralizes block *building* while keeping
*proposing* decentralized — better than the alternative (integrated
builder-proposers), worse than the ideal (many builders).

**What fixes it?** Enshrined PBS (protocol-level separation) plus encrypted
mempools — removing trusted relays from the loop entirely.

**Related:** [MEV](glossary/mev.md) ·
[proposer-builder separation](glossary/proposer-builder-separation.md) ·
[validator](glossary/validator.md)