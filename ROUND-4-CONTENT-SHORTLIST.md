# Round 4 — Content Shortlist (2026-09-14)

Six ranked, high-intent articles grounded in current coverage gaps.
Every internal link below was verified live (200, sitemap-listed) on the day of writing.
Gap basis: the site covers these clusters only as ~500-word glossary stubs, lesson units,
or tool/terminal pages — no dedicated **post** exists for any of them.

Ranking = (estimated search intent/volume) x (fit with the decentralization/self-custody
authority angle) x (internal-link synergy) x (low authoring effort per dollar).

---

## #1 How a Crypto Transaction Actually Works: Mempool → Fee Market → Confirmation

- **Target keywords:** "how do crypto transactions work", "what is a mempool", "crypto transaction fees explained", "why is my transaction pending"
- **Intent:** informational, beginner→mid (huge volume; "pending transaction" is high-frustration search).
- **Why it's a gap:** only `glossary/mempool`, `glossary/gas-fees`, `glossary/priority-fee`, `glossary/confirmation` stubs exist; no post narrates the full lifecycle.
- **Angle:** decentralization, not just a fee explainer — mempool "mev-ification" and why RPC/node centralization affects *your* transaction ordering.
- **Outline (H2s):** 1) Life of a transaction, step by step  2) The mempool — where transactions wait  3) Fee markets: base fee + priority fee (EIP-1559)  4) Why transactions get "stuck"  5) Nodes, RPCs and the centralization wrinkle  6) Checking your own transaction on a block explorer.
- **Links out (verified):** `/what-is-blockchain/`, `/glossary/mempool/`, `/glossary/gas-fees/`, `/glossary/priority-fee/`, `/glossary/confirmation/`, `/infrastructure-decentralization-explained/`, `/terminal/tools/gas-estimator-l2/`.
- **Links in:** add to Related block on `/what-is-blockchain/`, `/proof-of-stake-vs-proof-of-work/`, `/terminal/`; "Read the full guide" from `glossary/mempool` (via glossary related-articles block in template).
- **CTA:** `/terminal/tools/gas-estimator-l2/` + glossary pill.
- **Category:** Web3 · **Est. words:** 1,400–1,700 · **Effort:** Low · **Priority:** 1

---

## #2 Solo Staking vs Staking Pools vs Delegation (and Why It's a Decentralization Question)

- **Target keywords:** "solo staking vs staking pools", "delegated staking vs staking pool", "is staking decentralized", "liquid staking risk"
- **Intent:** commercial/investigation, mid-advanced. Grows with the PoS narrative + hub traffic.
- **Why it's a gap:** `glossary/solo-staking`, `glossary/staking-pool`, `glossary/delegation`, `glossary/liquid-staking`, `glossary/validator` all exist as stubs; `what-is-staking` and `how-to-stake-crypto` are beginner "how do I stake" posts, not an operator-distribution analysis.
- **Angle:** capital-pillar pillar — cross-reference live hub scores; link Lido/pool concentration; tie to Nakamoto Coefficient.
- **Outline (H2s):** 1) The three ways to "stake"  2) Solo staking: cost, risk, ceiling  3) Pools & liquid staking: the centralization trade  4) Delegation on PoS chains (who actually votes?)  5) How to read a chain's capital concentration  6) Verdict by use case.
- **Links out (verified):** `/what-is-staking/`, `/how-to-stake-crypto/`, `/glossary/solo-staking/`, `/glossary/delegation/`, `/glossary/liquid-staking/`, `/capital-decentralization-explained/`, `/glossary/nakamoto-coefficient/`, `/chains/`, `/proof-of-stake-vs-proof-of-work/`, `/terminal/tools/staking-rewards-compare/`.
- **Links in:** `/chains/` hub intro "Staking & pools → read more"; `/what-is-staking/` related; `/glossary/staking-pool/` + `/glossary/delegation/` full-guide.
- **CTA:** `/terminal/tools/staking-rewards-compare/` + hub cards.
- **Category:** Guides · **Est. words:** 1,500–1,800 · **Effort:** Medium · **Priority:** 2

---

## #3 Address Poisoning & Dusting Attacks: the New Way Wallets Get Drained

- **Target keywords:** "address poisoning attack", "crypto dusting attack", "wallet drained how", "fake token in wallet"
- **Intent:** protective, high-urgency (large "my wallet was drained" query set; virality-friendly PSA format.
- **Why it's a gap:** only `glossary/address-poisoning` + `glossary/dusting-attack` stubs and a lab lesson (`lesson/os-sim-swap-address-poisoning-lab`). No post warns + prevents.
- **Angle:** safety-first; concrete copy-paste checklist; ties back to scams + self-custody.
- **Outline (H2s):** 1) What these attacks actually are  2) How poisoning happens on-chain (watched-address spam)  3) Dusting 101: why fake tokens land in your wallet  4) Red-flag walkthroughs  5) Prevention checklist (verify on explorer, no blind copy-paste, revoke, burn-to-zero)  6) If you already interacted: what to do.
- **Links out (verified):** `/glossary/address-poisoning/`, `/glossary/dusting-attack/`, `/crypto-scams-guide/`, `/how-to-send-crypto-safely/`, `/glossary/honeypot/`, `/lesson/os-sim-swap-address-poisoning-lab/`, `/terminal/tools/address-checker/`, `/glossary/sim-swap/`.
- **Links in:** `/crypto-scams-guide/` + `/how-to-send-crypto-safely/` related; glossary stubs → full guide.
- **CTA:** `/terminal/tools/address-checker/`.
- **Category:** Web3 (safety) · **Est. words:** 1,300–1,600 · **Effort:** Low · **Priority:** 3

---

## #4 How to Verify a Smart Contract Before You Interact

- **Target keywords:** "how to verify a smart contract", "is this contract a scam", "read smart contract code", "squid game token rug"
- **Intent:** protective + a bit technical; beginner-mid ("is X safe?"); high click-through when published near trends.
- **Why it's a gap:** `glossary/smart-contract-audit` + `glossary/source-verified`? no; only the `os-verifying-contracts-explorers` lesson covers mechanics without beginner framing; no post.
- **Angle:** empowerment — "you don't need to be a dev"; workflow on Etherscan/explorers, checks for ownership/multisig, audit claims, honeypot detection.
- **Outline (H2s):** 1) Why verification matters (the rug risk)  2) Reading a contract page like a checklist  3) Verified source vs unaudited  4) Ownership, admin keys and whether they can drain you  5) Red flags (honeypots, disabled sells, tax games)  6) A 10-minute verify workflow + when to call in an auditor.
- **Links out (verified):** `/glossary/smart-contract-audit/`, `/glossary/honeypot/`, `/glossary/rug-pull/`, `/glossary/multisig/`, `/lesson/os-verifying-contracts-explorers/`, `/crypto-scams-guide/`, `/what-is-a-decentralized-exchange-dex/`.
- **Links in:** `/crypto-scams-guide/`, `/best-defi-platforms-for-beginners/`, `/lesson/os-verifying-contracts-explorers/`.
- **CTA:** `glossary/multisig` + `/terminal/tools/multisig-setup-planner/`.
- **Category:** Guides · **Est. words:** 1,400–1,700 · **Effort:** Medium · **Priority:** 4

---

## #5 The Oracle Problem, Explained in Plain English

- **Target keywords:** "oracle problem", "what is a blockchain oracle", "oracle centralization risk", "Chainlink explained"
- **Intent:** informational, mid; strong "aha" + link-bait for HN/r/ethereum-type audiences (good outreach fuel).
- **Why it's a gap:** single `glossary/oracle` stub; nothing narratives why blockchains *need* oracles and why oracles are a centralization pinch-point.
- **Angle:** decentralization-first — "oracles are the feed that make chains useful, and the leak in purity"; ping the DeFi angle.
- **Outline (H2s):** 1) Why a blockchain can't fetch prices  2) What an oracle actually is  3) Oracle models: centralized → decentralized → optimistic  4) The oracle problem as a trust problem  5) Real-world examples: price feeds, weather, cross-chain  6) What to check before trusting a feed.
- **Links out (verified):** `/glossary/oracle/`, `/glossary/smart-contract/`, `/what-is-defi-decentralized-finance/`, `/glossary/stablecoin/`, `/glossary/market-maker/`, `/infrastructure-decentralization-explained/`, `/what-is-web3-decentralization/`, `/glossary/cefi/`.
- **Links in:** `/what-is-defi-decentralized-finance/` (DeFi terms section), `/what-is-web3-decentralization/`.
- **CTA:** glossary pill + `/terminal/`.
- **Category:** Web3 · **Est. words:** 1,200–1,500 · **Effort:** Low · **Priority:** 5

---

## #6 Multisig for Everyone: when a 2-of-3 Wallet Beats a Single Hardware Wallet

- **Target keywords:** "what is a multisig wallet", "how to set up multisig", "2-of-3 wallet", "multisig vs hardware wallet"
- **Intent:** investigation/decision, mid-advanced; differentiator (few beginner blogs cover operational multisig).
- **Why it's a gap:** `glossary/multisig` + `glossary/social-recovery` stubs + `/terminal/tools/multisig-setup-planner/` tool, no post.
- **Angle:** threat-modeling self-custody — theft vs loss vs coercion; when a single seed is the wrong abstraction.
- **Outline (H2s):** 1) The single-point-of-failure problem  2) How multisig actually works (m-of-n)  3) Threat matrix: single key vs multisig  4) 2-of-3, 3-of-5: how to choose  5) Social recovery as the hybrid  6) A practical setup walkthrough.
- **Links out (verified):** `/glossary/multisig/`, `/glossary/social-recovery/`, `/cold-wallet-vs-hot-wallet/`, `/what-is-a-seed-phrase/`, `/terminal/tools/multisig-setup-planner/`, `/crypto-scams-guide/`.
- **Links in:** `/cold-wallet-vs-hot-wallet/` + `/what-is-a-seed-phrase/` related; glossary stubs.
- **CTA:** `/terminal/tools/multisig-setup-planner/`.
- **Category:** Guides · **Est. words:** 1,400–1,700 · **Effort:** Medium · **Priority:** 6

---

## Publishing notes (all posts)

- `post_type=post`, author alex-vance (ID 2), category assigned, Rank Math title+description set.
- Authoring+publish path identical to rounds 2-3 (`deploy_articles.py`; sequential; sitemap regenerate; W3D cache purge; verify 200 + title).
- Every post gets the standard Related block + glossary pill(s); where noted, add the missing "related articles" link on the glossary stub (template wish-list item — flag if more than 3 stubs need it).
- Cross-post / outreach fuel available for #1, #3, #5 (Reddit/HN-ready PSA angles) in Pack III style.