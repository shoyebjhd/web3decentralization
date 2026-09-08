---
title: "Pillar 4: Software"
order: 6
course: decentralization-analyst
---

Software is the most overlooked pillar — and the most dangerous one. It asks:
**how many independent versions of the node software exist, and are they
actually in use?** A chain can be perfectly distributed in hardware and stake,
and still have a single point of failure in code.

## Why client diversity matters

If 100% of nodes run the *same* software, then one bug in that software is a
bug in the whole network:
- A consensus-breaking bug in one buggy client takes down the *entire* chain
  — a self-inflicted [51%-style](glossary/51-percent-attack.md) outage with no
  attacker.
- One maintainer or company controls upgrades of all clients = governance by
  codebase.

## What we actually measure

- **Number of independent clients** (e.g., Ethereum consensus: Prysm, Lighthouse,
  Teku, Nimbus...).
- **Usage share** — the real risk number. Diverse *options* with 95% running
  one client is still a 1-client network.
- **Shared code/stack** — "N different clients" is weaker if they share
  libraries, specs, or a foundation treasury.

## Reading the scores

| | Score | Reading |
|---|:---:|---|
| Ethereum | 88/100 | Best-in-class client diversity — several healthy consensus clients |
| Bitcoin | 70/100 | Bitcoin Core dominates ~95%; Knots & btcd are minorities |
| Near | 55/100 | A single primary client codebase |
| Polkadot | 68/100 | Strong client ecosystem, still heavily weighted to one codebase |

## The analyst's checklist

1. List the *implementations*, not the marketing page.
2. Find the real usage split (telemetry, block production share) — block-
   producing share is the truth.
3. Check whether the "independent" clients actually share code.

> "We have 3 clients!" is marketing. "Most blocks are made by client X" is a
> fact. Use the fact.

**Next lesson:** a hands-on lab — scoring a chain in the terminal.