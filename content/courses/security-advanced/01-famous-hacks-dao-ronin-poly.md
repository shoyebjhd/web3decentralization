---
title: "Famous Hacks: DAO, Ronin, Poly Network"
order: 1
course: security-advanced
---

**Objective:** internalize the three hack archetypes that keep repeating — so you recognize the next one wearing new clothes.

## Concept: the DAO (2016) — code bug

A reentrancy bug let an attacker recursively drain $60M before balances updated. Ethereum forked to undo it. Lesson: update state *before* sending funds; audit for reentrancy first.

## Concept: Ronin (2022) — key compromise

Attackers social-engineered 5 of 9 validator keys and drained $625M over days, unnoticed. Lesson: multisig thresholds mean nothing if keys live in similar places/people; validator key hygiene *is* chain security.

## Concept: Poly Network (2021) — access control

A cross-chain manager contract let anyone become admin; $600M moved (then bizarrely returned). Lesson: privileged functions need airtight access control, and bridges concentrate risk exactly where attackers look.

## Hands-on lab (free)

1. Read one post-mortem each (official + independent analysis). Note what each victim *believed* was safe.
2. Map each hack to its bug class: reentrancy / key management / access control.
3. Check a protocol you use for the same three smells (audits, signers, admin functions).

## Safety checklist

- "Audited" ≠ safe — read *what* was audited, *when*, and whether code changed since.
- Multisigs are only as distributed as their key holders and locations.
- Bridges deserve the highest suspicion per dollar in crypto.

## Related glossary

- [Reentrancy](glossary/reentrancy.md) · [Multisig](glossary/multisig.md) · [Bridge](glossary/bridge.md)

**Next lesson:** the beginner audit checklist.