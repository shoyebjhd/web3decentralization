# Data

**License: CC0 — public domain.** You may use, copy, modify, and redistribute
these datasets for any purpose, without attribution, including commercial use.

This is the open, reproducible foundation of W3D's decentralization scores.
Every number published on the live site can be verified against these files.

## Contents

- `methodology.md` — the four-pillar scoring methodology (infrastructure,
  capital, governance, software) and how each score is computed.
- `chains.csv` — per-chain composite decentralization scores and key metrics.
- `sources/` — where the raw inputs (validator sets, stake distribution,
  client counts, cloud hosting) are gathered.

## Use it

```csv
chain,name,consensus,composite
btc,Bitcoin,Proof of Work,84.8
eth,Ethereum,Proof of Stake,80.8
dot,Polkadot,NPoS,72.6
ada,Cardano,Ouroboros PoS,70.4
atom,Cosmos,CometBFT PoS,68.0
arb,Arbitrum,Optimistic Rollup,62.7
near,Near,Nightshade PoS,60.3
avax,Avalanche,Avalanche Consensus,57.2
sol,Solana,PoH + Tower BFT,53.2
sui,Sui,Mysticeti DPoS,49.2
apt,Aptos,AptosBFT PoS,49.1
xrp,XRP Ledger,UNL Consensus,43.2
```

## Contributing a chain audit

See `data/README.md` above and `CONTRIBUTING.md`. PRs that add or correct chain
data must include the underlying evidence (source links) so scores stay
reproducible.
