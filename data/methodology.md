# W3D Decentralization Scoring Methodology

Every chain on the Web3 Decentralization Terminal is scored across **four
pillars**. Each pillar is a 0–100 score; the **composite** is a weighted
average. This document explains how each pillar is computed so any score can be
reproduced and challenged.

## The four pillars

| Pillar | Weight | What it measures |
|--------|:------:|------------------|
| Infrastructure | 30% | How many independent operators run the network (nodes, validators, miners) and how concentrated that set is. |
| Capital | 25% | How distributed token ownership and staked value are. |
| Governance | 25% | Who can actually change the rules — proposal, voting, and upgrade power. |
| Software | 20% | How diverse the client implementations are (a single client = single point of failure). |

## Pillar definitions

### Infrastructure (30%)
- Count of active validators/miners and nodes.
- **Nakamoto Coefficient (infra):** the minimum number of entities whose
  combined control would exceed a compromise threshold.
- Penalize heavy cloud-hosting concentration (e.g. a large share of nodes on a
  single provider like AWS/Hetzner).

### Capital (25%)
- Stake/ownership distribution (Gini-style concentration).
- Share held by top entities, exchanges, and foundations.
- Distribution quality at genesis/airdrop (permanent on-chain history).

### Governance (25%)
- Whether upgrades require broad consensus or a few signers.
- On-chain vs off-chain decision power; veto/emergency authority.
- Participation and proposal diversity.

### Software (20%)
- Number of independent client implementations.
- How evenly they're used (client diversity).
- Dependency on a single codebase.

## Composite formula

```
composite = 0.30*infra + 0.25*capital + 0.25*governance + 0.20*software
```

## Current composite scores

| Chain | Infra | Capital | Gov | Software | Composite |
|-------|:-----:|:-------:|:---:|:--------:|:---------:|
| btc | — | — | — | — | **84.8** |
| eth | — | — | — | — | **80.8** |
| dot | — | — | — | — | **72.6** |
| ada | — | — | — | — | **70.4** |
| atom | — | — | — | — | **68.0** |
| arb | — | — | — | — | **62.7** |
| near | — | — | — | — | **60.3** |
| avax | — | — | — | — | **57.2** |
| sol | — | — | — | — | **53.2** |
| sui | — | — | — | — | **49.2** |
| apt | — | — | — | — | **49.1** |
| xrp | — | — | — | — | **43.2** |

> Pillar-level numbers are published in the interactive terminal and the
> per-chain audits. This table is a summary; full pillar breakdowns live in
> `content/chains/`.

## Reproducibility

- Raw inputs and source links are in `data/sources/`.
- Scores are refreshed as on-chain data changes (validator sets, stake,
  client usage).
- To propose a score correction, open a PR with the underlying evidence.

**License: CC0.** Use and build on this freely.
