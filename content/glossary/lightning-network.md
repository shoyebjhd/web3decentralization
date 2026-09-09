---
title: "Lightning Network"
related: [bitcoin, state-channel, satoshi]
---

The Lightning Network is Bitcoin's [state-channel](state-channel.md) network
for instant, near-free payments: open a channel once on-chain, then send
unlimited [sats](satoshi.md) off-chain, settling only when you close. Payments
route across the network like packets.

## Why it matters

Lightning is how Bitcoin scales to coffee money without touching base-layer
throughput — millions of instant payments, fees of a fraction of a cent. The
honest caveats: channel liquidity management, needing to be online (or use
watchtowers), and routing failures on large amounts. It's improving fast and
already settles real volume.

**Related:** [bitcoin](bitcoin.md) · [state channel](state-channel.md) ·
[satoshi](satoshi.md)