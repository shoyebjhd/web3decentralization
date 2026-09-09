---
title: "Sequencer Risks: The Centralization in Plain Sight"
order: 5
course: l2-path
---

**Objective:** evaluate the single operator standing between you and every major L2.

The [sequencer](glossary/sequencer.md) orders transactions, captures MEV, and can halt, censor, or reorder at will. Nearly every large rollup runs exactly one today. Everything else about L2 security assumes this actor behaves — understand what happens when it doesn't.

## Concept: powers of the sequencer

- **Censorship:** exclude your transactions indefinitely (force-exits via L1 exist but are slow/technical).
- **MEV extraction:** reorder for profit ahead of users.
- **Liveness failure:** sequencer downtime = chain downtime for normal users.
- **Upgrade coupling:** same team usually holds upgrade keys — operational *and* governance centralization in one place.

## Hands-on lab (free)

1. For three L2s you use, document: who sequences, upgrade key holders/thresholds, force-exit path. (Sources: docs + L2Beat.)
2. Time a testnet force-withdrawal if supported — feel the friction you'd face in a real incident.
3. Compare against [shared sequencing](glossary/shared-sequencing.md) proposals: what changes, what doesn't.

## Safety checklist

- Size positions by sequencer trust: Stage-1 chains hold trading floats, not life savings.
- Know the force-exit clicks *before* the crisis.
- Track decentralization milestones (fault proofs → open sequencing) per chain you use.

## Related glossary

- [Sequencer](glossary/sequencer.md) · [Shared Sequencing](glossary/shared-sequencing.md) · [MEV](glossary/mev.md)

**Next:** the developer track — deploy on Base testnet.