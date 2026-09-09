---
title: "How a Contract Executes"
order: 2
course: smart-contracts
---

Calling a contract means sending a [transaction](glossary/transaction.md) to
its address with instructions ("swap X for Y," "deposit Z"). Every node then
re-runs your call to verify the result — thousands of computers repeating
your computation so no one has to trust anyone.

## Gas: paying for every step

Each operation costs [gas](glossary/gas.md): simple transfers are cheap,
complex contract calls cost more. You set a max fee; validators take the
highest bidders first. Failed transactions still consume gas — the network
did the work even though your call reverted.

## The EVM in one paragraph

Ethereum's computer (the EVM) is deliberately simple and deterministic: same
input + same chain state = same output, on every node, forever. Determinism
is what makes decentralized verification possible — and why contracts can't
use randomness, clocks, or web data without help ([oracles](glossary/oracle.md),
commit-reveal schemes).

## Success vs revert

- **Success:** state changes, events logged, [gas](glossary/gas.md) consumed.
- **Revert:** a `require` failed (bad input, insufficient balance, expired
  deadline) — state rolls back, but gas is still spent. Reverts protect you;
  they are not errors to fear.

## Reading a transaction (try it)

Open any contract interaction on an explorer: From (you), To (contract),
Value, Input Data (the encoded call), gas used, and Logs (what the contract
announced). Those five fields are the complete story of every dApp action
you'll ever take.

> Execution is public rehearsal: your call performs on every node
> simultaneously, and the audience verifies each line.

**Next lesson:** walkthrough of a real (simple) contract.