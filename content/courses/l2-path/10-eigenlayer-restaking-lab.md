---
title: "EigenLayer Restaking Lab"
order: 10
course: l2-path
---

**Objective:** understand restaking by walking through it hands-on — without risking a wei of real stake.

[EigenLayer](glossary/eigenlayer.md) lets staked ETH secure extra protocols for extra yield and extra slashing exposure. The mechanics are best learned by doing (on testnet), because the dashboards hide how many trust decisions each click contains.

## Concept refresher

Restake → delegate to operators → operators run AVS software → rewards stack, slashing stacks harder. [LRTs](glossary/lrt-token.md) add liquidity on top. Every layer adds yield and a new failure mode in equal measure.

## Hands-on lab (testnet, free)

1. On Hoodi/Sepolia testnet, explore the EigenLayer app: browse AVSs, operators, and their slashing terms. Change nothing yet.
2. For one AVS, read its slashing conditions end to end. Write down in plain words what behavior loses money.
3. Compare three operators: fee, AVS mix, track record. Note how concentrated delegation already looks even on testnet.
4. Simulate (on paper) a 10% slash event on a restaked position also looped through an LRT — trace every loss layer.

## Safety checklist

- Mainnet restaking is advanced territory: start with reading, graduate to dust amounts.
- Never restake what secures your core position until you can explain every slashing term.
- LRT + looping + restaking = leverage cubed. Paper-simulate first, always.

## Related glossary

- [EigenLayer](glossary/eigenlayer.md) · [Restaking](glossary/restaking.md) · [LRT Token](glossary/lrt-token.md)

**Path complete.** Keep going: [Decentralization Analyst](../decentralization-analyst/01-decentralization-is-not-a-buzzword.md) or audit live chains on the [terminal](https://web3decentralization.com/terminal/).