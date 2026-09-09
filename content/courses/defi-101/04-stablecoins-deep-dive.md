---
title: "Stablecoins Deep Dive"
order: 4
course: defi-101
---

[Stablecoins](glossary/stablecoin.md) are DeFi's cash: dollars on-chain for
trading, lending, and saving without [volatility](glossary/volatility.md).
But "stable" describes a mechanism, not a guarantee — and mechanisms differ
enormously.

## The three designs

| Type | Backing | Examples | Failure mode |
|---|---|---|---|
| Fiat-backed | Dollars/T-bills in custody | USDC, USDT | Custodian freeze, reserve doubt |
| Crypto-backed | Over-collateralized on-chain | DAI | Collateral crash cascade |
| Algorithmic | Code + confidence | (UST — collapsed) | Death spiral |

## Due diligence in five questions

1. What exactly backs each token — and who attests it, how often?
2. Can the issuer freeze my balance? (Most fiat-backed: yes.)
3. Has it ever [depegged](glossary/depeg.md)? How far, how long, why?
4. Where does its yield come from — real revenue or token emissions?
5. What happens to it if its chain halts for a day?

## How beginners should use stables

- Hold operating cash and take profits in the most boring, most audited stables.
- Split across at least two issuers/models — no single point of stable failure.
- Treat 8%+ "stable" yields as risk labels, not gifts: the premium prices
  exactly the dangers above.

## The Terra lesson (required history)

UST promised algorithmic stability, grew to tens of billions on 20% Anchor
yields, then depegged and vaporized everything in days. The post-mortem fits
one sentence: yield without a revenue source is a countdown, and "stable" was
the marketing, not the mechanism.

> Stablecoins are tools, not savings accounts. Diversify issuers, discount
> yield, and remember every peg is a promise someone must keep.

**Next lesson:** yield, staking, and farming — risks first.