---
title: "Yield, Staking and Farming: Risks First"
order: 5
course: defi-101
---

Every yield has a source. Lending interest comes from borrowers;
[staking](glossary/staking.md) rewards from issuance and fees; farm emissions
from dilution. This lesson teaches you to trace any [APY](glossary/apy.md)
back to its source — because unsourced yield is just someone else's exit.

## The yield ladder (risk order)

1. **Blue-chip lending** (USDC on Aave): single-digit, battle-tested, boring.
   The baseline everything else must beat *after* adjusting for risk.
2. **Native staking** (ETH/SOL direct): issuance + fees, lockups,
   [slashing](glossary/delegation.md) risk, validator choice matters.
3. **[Liquid staking](glossary/liquid-staking.md)**: staking yield + DeFi
   usability, minus a new layer of provider-concentration risk.
4. **LP + [farming](glossary/yield-farming.md)**: fees + emissions vs
   [impermanent loss](glossary/impermanent-loss.md) + contract risk. Only the
   fee part is real income.
5. **Points/meta-farming**: unpriced promises of future tokens. Lottery
   tickets, priced accordingly.

## APY literacy

- APY assumes compounding at the current rate — rates move, prices move harder.
- "APY paid in X" means your return is denominated in X's volatility.
- Distinguish nominal APY from realized return net of gas, IL, and the reward
  token's decline. Screenshots of 1,000% APY are advertisements for risk.

## The three questions before any deposit

1. **Where does the money come from?** (Borrowers? Issuance? Greater fools?)
2. **What breaks first?** (Oracle? Bridge? Admin key? Bank run?)
3. **Can I exit?** (Lockups, thin liquidity, and withdrawal queues decide.)

> If you can't explain the yield's source in one sentence, you're the source.

**Next lesson:** reading contracts and audits.