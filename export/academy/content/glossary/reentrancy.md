---
title: "Reentrancy"
slug: "reentrancy"
canonical_url: "https://web3decentralization.com/glossary/reentrancy/"
source: "web3decentralization.com"
license: "MIT"
da: "59"
lastmod: "2026-09-09 05:06:27"
---
Reentrancy is the bug that stole $60M in The DAO hack: a contract sends funds *before* updating its own balance, so a malicious receiver contract calls back in and withdraws again — and again — draining the vault in one transaction. The fix (update state first) is one line; forgetting it cost a blockchain its innocence.

## Why it matters

It's the canonical example of why "audited" matters and why ordering operations correctly is security-critical in finance code. Modern libraries and reentrancy guards make it rarer, but every new developer rediscovers it — when an audit flags reentrancy risk, treat it as a five-alarm finding, not a note.

## Related terms

[smart contract](https://web3decentralization.com/glossary/smart-contract/) ·
[smart contract audit](https://web3decentralization.com/glossary/smart-contract-audit/) ·
[flash loan](https://web3decentralization.com/glossary/flash-loan/)
