---
title: "Recovery Without a Seed: Risks and Realities"
order: 5
course: security-advanced
---

**Objective:** understand every non-seed recovery path honestly — what saves you, what exposes you, and what's marketing.

## Concept: the options, ranked by trust

1. **Multisig quorum** (lose 1 of 3): no third party involved. Gold standard.
2. **[Social recovery](glossary/social-recovery.md):** guardians co-sign a reset. Trusts your circle's honesty + availability.
3. **Custodial recovery:** exchange/app resets your password. Full trust in the company (and its hackers, acquirers, regulators).
4. **Shamir shards:** seed split into pieces needing a threshold. Elegant, operationally fiddly, shard-storage discipline required.
5. **"AI/encrypted cloud backup":** convenience products holding encrypted keys. Read who holds the decryption path — that's your custodian with better branding.

## Hands-on lab (free)

1. Inventory *your* current recovery paths: list every way back into each wallet/exchange you use.
2. Grade each: whom do you trust, what breaks if they're evil/offline/hacked?
3. Close the worst gap this week (e.g., add a second backup location, or migrate one custodial balance to multisig).

## Safety checklist

- Every recovery path is also an attack path — count them like an adversary would.
- "Forgot password" flows on custodial apps are phishing's favorite costume. Verify domains ruthlessly.
- Document the map for heirs without putting secrets in it.

## Related glossary

- [Social Recovery](glossary/social-recovery.md) · [Seed Phrase](glossary/seed-phrase.md) · [Multisig](glossary/multisig.md)

**Path complete.** You now think in threat models, not tips. Teach one person the SIM-swap lockdown — that's how the ecosystem hardens.