---
title: "Reading the Chain: Explorers and Data"
order: 7
course: blockchain-basics
description: "Blockchains are public, which means "do your own research" is a skill, not a."
---

Blockchains are public, which means "do your own research" is a skill, not a
slogan. This lesson makes you dangerous with a [block explorer](glossary/block-explorer.md)
in fifteen minutes.

## The four lookups

1. **Transaction hash** â†’ status (confirmed/pending/failed), from/to, value,
   fee, network. "Did it arrive?" ends here.
2. **Address** â†’ balance + full history. Whale-watch, treasury-audit, or
   check your own wallet without opening it.
3. **Block** â†’ who built it, how full, what fees prevailed. Congestion reads
   here first.
4. **Token contract** â†’ holders list, supply, verified code? Unverified code +
   concentrated holders = walk away.

## Verifying claims (the fun part)

- "Huge community treasury!" â†’ open the treasury address. Count it yourself.
- "Burned liquidity!" â†’ check the LP tokens: locked, burned, or sitting in a
  dev wallet?
- "Partnership with X!" â†’ find the on-chain transaction or it didn't happen.
- "Vitalik holds our token!" â†’ check whether he can *sell* it (or if it's a
  honeypot transfer he never touched).

## Metrics that matter vs theater

- **Matter:** Nakamoto Coefficient, client diversity, unlock schedules,
  holder concentration, real fee revenue.
- **Theater:** raw TPS claims, follower counts, "partnerships," exchange
  listing rumors, celebrity holdings.

> The explorer is the difference between believing a website and checking
> reality. Professionals check; amateurs trust. The data is free â€” use it.

**Next lesson:** blockchains in the real world â€” and their honest limits.