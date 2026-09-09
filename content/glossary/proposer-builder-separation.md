---
title: "Proposer-Builder Separation"
related: [mev, validator, mempool]
---

Proposer-builder separation (PBS) splits block production in two: specialized
*builders* compete to assemble the most profitable block (extracting
[MEV](glossary/mev.md)), while the *proposer* (validator) simply picks the
best bid — blind to its contents. Validators earn MEV revenue without running
extraction operations themselves.

## Why it matters

PBS democratized validator returns (solo stakers earn like professionals) at
the cost of concentrating *builder* power in a handful of sophisticated shops
— moving centralization pressure one layer sideways rather than removing it.
Whether that trade is healthy is the live MEV decentralization debate, and
censorship resistance of the builder relay set is the metric to watch.

**Related:** [MEV](glossary/mev.md) · [validator](glossary/validator.md) ·
[mempool](glossary/mempool.md)