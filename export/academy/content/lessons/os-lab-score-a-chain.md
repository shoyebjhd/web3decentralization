---
title: "Lab: Score a Chain in the Terminal"
slug: "os-lab-score-a-chain"
canonical_url: "https://web3decentralization.com/lesson/os-lab-score-a-chain/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 03:34:43"
course: "certified-decentralization-analyst"
course_title: "Certified Decentralization Analyst"
difficulty: "advanced"
order: "407"
---
Now you'll apply all four pillars to a real chain. This is a hands-on lab: open the [Decentralization Terminal](https://web3decentralization.com/terminal/) and practice the analyst's workflow.

## Step 1 — Open a chain

Open the terminal and click a chain you're curious about (try **Solana** — almost every pillar has a clear weakness; then **Polkadot** — very different story).

## Step 2 — Read each pillar

Answer, in your own words:

- **Infrastructure:** how many validators? How concentrated? Any cloud/region   dependence? What does its Nakamoto Coefficient say? - **Capital:** how evenly is stake spread? Do a few pools/exchanges dominate?   What was the initial distribution like? - **Governance:** on-chain or off-chain? Is there a multisig, a foundation, a   council with special power? - **Software:** how many clients? What's actually making the blocks?

## Step 3 — Find the weakest link

A chain is only as decentralized as its worst pillar. Write one sentence:

> "Solana's weakest pillar is _______, because _______, and the practical
> > risk is _______."

## Step 4 — Run a stress test

Use the terminal's **outage simulator** (e.g., take down the top cloud provider, or the top staking pool) and watch the network's reaction. Ask: is there a single point of failure the simulator exposes?

## Step 5 — Compare to the published audit

Now open `content/chains/sol.md` (or the chain you chose) and compare your independent reading with W3D's published pillars. Where you differ, go check the **methodology** — this is how seasoned analysts catch stale or wrong data.

## Deliverable for this lesson

Fill in the table:

| Chain | Infra | Capital | Gov | Software | Weakest pillar | One-line risk |
| --- | --- | --- | --- | --- | --- | --- |
|  |  |  |  |  |  |  |

> You've now performed, start to finish, the exact analysis the W3D terminal
> > automates — with your own eyes instead of a scorecard.
