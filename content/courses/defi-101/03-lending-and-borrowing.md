---
title: "Lending and Borrowing"
order: 3
course: defi-101
---

DeFi lending pools (Aave, Compound, MakerDAO) let anyone earn interest on
deposits or borrow against [collateral](glossary/collateral.md) — no credit
score, just math. Rates float with supply and demand, visible to everyone.

## How it works

1. **Lend:** deposit assets → receive interest-bearing tokens tracking your
   share. Withdraw anytime (if [liquidity](glossary/liquidity.md) allows).
2. **Borrow:** lock collateral worth more than the loan (over-collateralized),
   draw stablecoins or other assets, pay floating interest.
3. **Health factor:** the ratio keeping you alive. Fall too low → automatic
   [liquidation](glossary/liquidation.md), no margin call, no mercy.

## The numbers that matter

- **LTV (loan-to-value):** how much you can borrow per collateral dollar.
  Lower LTV = safer position.
- **Liquidation threshold & penalty:** the tripwire and its fee (often 5–15%
  on top of your loss).
- **Utilization/APY:** high borrowing demand = high lender yield — and thin
  exit liquidity.

## Three beginner-safe patterns

1. Lend stablecoins on a blue-chip pool for modest, battle-tested yield.
2. Borrow *less than half* of your max against non-volatile collateral.
3. Never borrow to buy more of the same volatile asset (recursive leverage
   looks brilliant until the cascade).

## The red zone

Borrowing volatile assets, max-LTV positions, and "looping" strategies are
how portfolios vaporize in a weekend. Cascading liquidations don't negotiate
— and they cluster exactly when everything else is also crashing.

> Lending earns; borrowing rents risk. Keep the rented risk small enough that
> a bad weekend is a lesson, not an obituary.

**Next lesson:** stablecoins deep dive.