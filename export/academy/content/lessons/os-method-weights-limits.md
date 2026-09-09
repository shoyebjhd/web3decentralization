---
title: "Method: Weights, Limits & Best Practices"
slug: "os-method-weights-limits"
canonical_url: "https://web3decentralization.com/lesson/os-method-weights-limits/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 03:34:43"
course: "certified-decentralization-analyst"
course_title: "Certified Decentralization Analyst"
difficulty: "advanced"
order: "408"
---
Before you start citing composite scores, you need to understand how they're built — and their honest limitations. This lesson is the analyst's code of conduct.

## The composite formula

``` composite = 0.30·infrastructure + 0.25·capital + 0.25·governance + 0.20·software ```

Those weights are a **judgment call**, not a law of physics: - Infrastructure gets the most weight because a chain you can't run is   decentralised in name only. - Capital and governance are close behind — they decide *control*. - Software gets 20%: rare but catastrophic.

Changing the weights changes the ranking. BTC stays top under most weightings; XRP and Aptos stay low; the middle (Solana/Sui/Avalanche) shuffles. **Always state which weights you used** when quoting scores.

## What the data is not

- **Not real-time.** Validator sets, stake splits, and client mix change; the   audits are refreshed periodically. - **Not exhaustive.** No methodology measures everything (social   concentration, regulatory jurisdictions, off-chain dependencies). - **Not a price prediction.** Decentralization is a security property, not a   thesis about token value (protocols with low scores can still be useful).

## Best practices when you quote W3D data

1. Link the **methodology** — let people verify the formula. 2. Name the pillar, not just the composite. "BTC 84.8" is a headline;    "Bitcoin's software pillar is 70 because Core dominates ~95%" is analysis. 3. Give the date. Data ages fast in this space. 4. Prefer the [CC0 dataset](https://github.com/shoyebjhd/web3decentralization/blob/main/data/chains.csv) so anyone can re-run your math.

## How to challenge a score (and be right)

The whole point of open methodology is that a score is a *hypothesis* you can test. To argue "ETH should be an 82 not an 80.8":

- Point at the specific pillar that's wrong. - Bring newer data (validator share, client usage, a governance change). - Update the relevant `content/chains/*.md` + `data/chains.csv` in a PR —   that's the mechanism this repo is built on.

> The final skill of an analyst is *epistemic humility*: knowing exactly which
> > parts of the number are measurement and which are judgment.

**Congratulations — you've completed the Decentralization Analyst path.** Consider earning a certificate on the live site, then teach someone else what you learned: the best test of understanding is explaining a Nakamoto Coefficient to a friend in one minute.
