---
title: "Lab: SIM-Swap and Address-Poisoning Defense"
order: 3
course: security-advanced
description: "Attacker ports your number via carrier social engineering â†’ intercepts SMS 2FA â†’ resets email â†’ resets exchange â†’ withdraws."
---

**Objective:** close the two non-crypto attack paths that drain the most real users: phone-number takeover and history poisoning.

## Concept: SIM-swap

Attacker ports your number via carrier social engineering â†’ intercepts SMS 2FA â†’ resets email â†’ resets exchange â†’ withdraws. No malware, no blockchain exploit â€” pure telecom weakness.

## Concept: address poisoning

Attacker sends dust from look-alike addresses (same first/last characters as your contacts) so your history-copy grabs *their* address next time. One lazy paste = full loss.

## Hands-on lab (free)

1. **Carrier lockdown today:** set account PIN, enable port-freeze/number-lock, remove SMS 2FA everywhere in favor of authenticator/hardware keys.
2. **Exchange lockdown:** enable withdrawal allowlists + 48h anti-phishing codes; confirm no SMS recovery remains.
3. **Address-book hygiene:** save real addresses as named contacts; never copy from transaction history; verify full strings on hardware screens for size.

## Safety checklist

- SMS 2FA anywhere money-adjacent = remove this week.
- Treat unexpected micro-transactions as hostile reconnaissance, not gifts.
- Practice one full "lost phone" drill: how do you recover email, exchange, and wallet without the number?

## Related glossary

- [SIM Swap](glossary/sim-swap.md) Â· [Address Poisoning](glossary/address-poisoning.md) Â· [Phishing](glossary/phishing.md)

**Next lesson:** multisig safe setup lab.