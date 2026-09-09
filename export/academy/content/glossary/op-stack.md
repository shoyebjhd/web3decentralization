---
title: "OP Stack"
slug: "op-stack"
canonical_url: "https://web3decentralization.com/glossary/op-stack/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 07:52:59"
---
The OP Stack is **Optimism's** open-source, modular toolkit for launching L2 chains: pick execution, settlement, and data layers like Lego, deploy your own rollup, optionally join the **Superchain**. [Base](https://web3decentralization.com/glossary/base-chain/) is its most famous deployment.

## How it works

Standardized, MIT-licensed components (op-node, op-batcher, op-proposer) plus fault-proof and governance modules. Chains built on it share Ethereum-grade tooling and can opt into shared sequencing, bridging, and Collective governance — or run fully solo.

## Why it matters for decentralization

Open-source rollup kits commoditize launching chains — good for experimentation, risky in aggregate: dozens of OP Stack chains mostly running centralized sequencers multiplies the *number* of trusted operators faster than it decentralizes any of them. Judge each deployment's operator set, not the shared brand.

## Risks & trade-offs

Fork drift (customized stacks diverging from audited code); shared-upgrade dependencies; sequencer centralization replicated per chain; and governance overlap when chains join the Collective.

## FAQ

**OP Stack vs Arbitrum Orbit?** Competing modular visions: OP Stack bets on shared standards + collective governance; Orbit bets on customization freedom. Both are legitimate; neither is decentralized by default.

**Do I need to care as a user?** Only for security assumptions: which sequencer, which bridge, which upgrade keys — per chain, every time.

**Is the stack really open source?** Yes, MIT — anyone can fork it entirely, which is the ultimate decentralization backstop.

## Related terms

**Optimism** ·
**superchain** · [Base](https://web3decentralization.com/glossary/base-chain/) ·
[optimistic rollup](https://web3decentralization.com/glossary/optimistic-rollup/)
