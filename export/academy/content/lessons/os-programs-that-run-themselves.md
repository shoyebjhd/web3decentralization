---
title: "Programs That Run Themselves"
slug: "os-programs-that-run-themselves"
canonical_url: "https://web3decentralization.com/lesson/os-programs-that-run-themselves/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 04:52:57"
course: "smart-contracts-for-beginners"
course_title: "Smart Contracts for Beginners"
difficulty: "beginner"
order: "101"
---
A [smart contract](https://web3decentralization.com/glossary/smart-contract/) is a program stored on a blockchain that executes exactly as written — no operator, no pause button, no "we'll look into it." Deploy it, and it runs for as long as the chain does, treating a billionaire and a stranger identically.

## Why that's radical

Every app you've ever used runs on someone's server, subject to their terms, outages, and pivots. A smart contract's "server" is thousands of independent nodes that all verify every step. The operator can't change the rules, freeze your position out of spite, or quietly edit the database — the code is the entire relationship.

## What they actually do (concrete)

- Hold money and release it on conditions (escrow without the agent). - Issue [tokens](https://web3decentralization.com/glossary/token/) with fixed rules (no secret minting). - Run exchanges ([AMMs](https://web3decentralization.com/glossary/automated-market-maker/)) and lending   pools with no employees. - Govern treasuries ([DAOs](https://web3decentralization.com/glossary/dao/)) by vote-counting code.

## What they can't do

- Browse the web (hence [oracles](https://web3decentralization.com/glossary/oracle/) for outside data). - Be patched like normal software (deployed code is final — upgrades need   special proxy designs, which are themselves trust points). - Forgive mistakes: a bug is a permanent, public, exploitable bug.

## The mental model

Think vending machine, not servant: insert the right input, the mechanism dispenses the guaranteed output — and no pleading changes the mechanism. "Code is law" is the promise; this path teaches you when the law has loopholes.

> A smart contract is a promise that enforces itself. The skill is reading
> > the promise before trusting the enforcement.

**Next lesson:** how a contract actually executes.
