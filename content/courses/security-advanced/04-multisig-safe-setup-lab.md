---
title: "Lab: Multisig Safe Setup"
order: 4
course: security-advanced
---

**Objective:** build a 2-of-3 multisig on testnet that survives losing any single key — the professional standard for serious holdings.

## Concept refresher

2-of-3: three keys exist, any two authorize. Lose one → recover with the other two. One stolen → useless alone. Distribute across locations/people so no single event (theft, fire, coercion) reaches quorum.

## Hands-on lab (testnet, free)

1. Create three testnet keys (separate wallet instances or devices).
2. Deploy a 2-of-3 safe (Safe{Wallet} testnet deployment or equivalent); record all three addresses.
3. Fund with testnet dust; execute a transaction requiring two signatures from two different instances.
4. **Recovery drill:** simulate losing key #3 (delete that instance) — prove keys #1+#2 still move funds.
5. Document the setup: which key lives where, who knows what, recovery order.

## Safety checklist

- Never store two keys in one place (defeats the entire purpose).
- All cosigners verify destination addresses independently before signing.
- Test recovery *before* funding with real amounts — drills, not hopes.
- Keep the setup document where heirs can find it (sealed, not emailed).

## Related glossary

- [Multisig](glossary/multisig.md) · [Hardware Wallet](glossary/hardware-wallet.md) · [Self-Custody](glossary/self-custody.md)

**Next lesson:** recovery without a seed — risks and realities.