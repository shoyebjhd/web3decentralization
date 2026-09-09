---
title: "Walkthrough: A Simple Storage Contract"
order: 3
course: smart-contracts
---

No coding experience needed — read this like a recipe. This is the classic
first contract (Solidity, Ethereum's main language), storing one number
anyone can read but only the owner can change.

```
contract SimpleStorage {
    uint256 private favoriteNumber;   // the stored value
    address public owner;             // who deployed it

    constructor() { owner = msg.sender; }

    function store(uint256 _n) public {
        require(msg.sender == owner, "not owner");
        favoriteNumber = _n;          // state change = costs gas
    }

    function retrieve() public view returns (uint256) {
        return favoriteNumber;        // read-only = free
    }
}
```

## Line by line

- **State variables** (`favoriteNumber`, `owner`) live on-chain permanently.
  Writing them costs [gas](glossary/gas.md); the chain stores them forever.
- **constructor** runs once at deployment, recording the deployer as owner.
- **`store`** changes state — costs gas, needs a signed
  [transaction](glossary/transaction.md), and rejects non-owners.
- **`retrieve`** is `view` (read-only): free, instant, no transaction needed.

## The three lessons hidden here

1. **Reads are free, writes cost.** Browsing contracts costs nothing; changing
   anything costs gas — the economic spam filter.
2. **Permissions are just `require` statements.** "Only owner" is one line of
   code — and forgetting it has caused hundred-million-dollar hacks.
3. **Everything is visible.** The code (if verified), every call, every
   stored value — all public on an explorer. Privacy must be designed in; it
   is never default.

> You can now read the skeleton of every contract: state, permissions, and
> which functions cost money. That's 80% of contract literacy.

**Next lesson:** tokens as contracts — ERC-20 anatomy.