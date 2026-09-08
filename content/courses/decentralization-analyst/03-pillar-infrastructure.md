---
title: "Pillar 1: Infrastructure"
order: 3
course: decentralization-analyst
---

Infrastructure is the most tangible pillar: **who runs the computers that run
the network.** It's the difference between a network on 10,000 scattered hobby
boxes and one running on three servers in one AWS region.

## What we actually measure

- **Count** — active validators/miners/nodes. More is a *starting point*, not
  proof.
- **Nakamoto Coefficient (infra)** — how many independent operators hold a
  compromising share of validating power.
- **Geographic spread** — nodes concentrated in one country or one data
  center are one political/engineering event away from takedown.
- **Cloud concentration** — if ~45% of nodes run on AWS/Hetzner, a cloud
  outage is a network outage. (W3D runs real outlet-stress simulations for
  this.)

## Reading the scores

| | Score | What it means |
|---|:---:|---|
| Bitcoin | 92/100 | ~17,800 nodes, >100 countries — the gold standard |
| Ethereum | 84/100 | Great node base; caveats on liquid-staking-provider weight |
| Solana | 58/100 | ~1,900 validators (impressive count) but ~45% cloud hosting |
| XRP | 45/100 | Tiny default UNL validator set — few checkpoints, easily censored |

## The analyst's test

Ask three questions about *any* chain:

1. **Who's in the server room?** (Data center vs. home validators, plus
   geographic distribution.)
2. **How much power does one operator have?** Check the Nakamoto coefficient
   for validators/miners — the weakest link is what matters.
3. **What happens on a bad day?** Simulate an outage (try the W3D stress
   simulator on the [terminal](https://web3decentralization.com/terminal/)):
   does the chain pause, or does it keep rolling?

> Infrastructure is where "decentralized" is most often *visibly* earned — or
> where a snazzy website hides a server closet.

**Next lesson:** the Capital pillar — follow the tokens and the stake.