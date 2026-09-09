---
title: "How a Blockchain Records Truth"
slug: "how-blockchains-record-truth"
canonical_url: "https://web3decentralization.com/lesson/how-blockchains-record-truth/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-07 04:57:26"
course: "crypto-fundamentals-from-zero"
course_title: "Crypto Fundamentals from Zero"
difficulty: "beginner"
order: "103"
---
## Blocks, hashes, and the chain

A blockchain is best understood as a **cryptographic spreadsheet of history** that anyone can read and nobody can quietly edit.

- **Block** — a batch of transactions plus a timestamp.
- **Hash** — a fingerprint of the block’s data. Change one character anywhere and the hash changes completely.
- **Chain** — each block stores the hash of the previous block, so every block "locks" all the ones before it.

To rewrite history you would have to recompute every hash from the point of change onward — and outpace the honest majority. That gets harder with every passing block, which is why confirmed transactions are called **final**.

## Consensus rules for everyone

Consensus simply means "the majority agree on the same history." Bitcoins proof-of-work and Ethereum’s proof-of-stake are two different ways to organize that agreement. You do not need to grok the math yet — just remember the question this course keeps asking:

**Mental model:** A blockchain is trustworthy to the degree that *many independent parties* — not one privileged server — participate in running it. That idea (called decentralization) will become your analytical lens for every network you study.
