---
title: "Sequencer Risks: The Centralization in Plain Sight"
slug: "os-sequencer-risks"
canonical_url: "https://web3decentralization.com/lesson/os-sequencer-risks/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 08:18:42"
course: "l2-developer-path"
course_title: "L2 Developer Path"
difficulty: "beginner"
order: "105"
---
**Objective:** evaluate the single operator standing between you and every major L2.

The [sequencer](https://web3decentralization.com/glossary/sequencer/) orders transactions, captures MEV, and can halt, censor, or reorder at will. Nearly every large rollup runs exactly one today. Everything else about L2 security assumes this actor behaves — understand what happens when it doesn't.

## Concept: powers of the sequencer

- **Censorship:** exclude your transactions indefinitely (force-exits via L1 exist but are slow/technical).
- **MEV extraction:** reorder for profit ahead of users.
- **Liveness failure:** sequencer downtime = chain downtime for normal users.
- **Upgrade coupling:** same team usually holds upgrade keys — operational *and* governance centralization in one place.

## Hands-on lab (free)

1. For three L2s you use, document: who sequences, upgrade key holders/thresholds, force-exit path. (Sources: docs + L2Beat.)
2. Time a testnet force-withdrawal if supported — feel the friction you'd face in a real incident.
3. Compare against [shared sequencing](https://web3decentralization.com/glossary/shared-sequencing/) proposals: what changes, what doesn't.

## Safety checklist

- Size positions by sequencer trust: Stage-1 chains hold trading floats, not life savings.
- Know the force-exit clicks *before* the crisis.
- Track decentralization milestones (fault proofs → open sequencing) per chain you use.

## Related glossary

- [Sequencer](https://web3decentralization.com/glossary/sequencer/) · [Shared Sequencing](https://web3decentralization.com/glossary/shared-sequencing/) · [MEV](https://web3decentralization.com/glossary/mev/)

**Next:** the developer track — deploy on Base testnet.
