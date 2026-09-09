# Outreach Pack II — Wallets, Seed Phrases & Beginner Crypto (published 2026-09-08)

New guides are live — use these to drive beginner-focused organic traffic while the
Nakamoto Coefficient data cards target the "advanced" audience. Both segments feed the
terminal + affiliate path later.

Live URLs referenced:
- https://web3decentralization.com/what-is-cryptocurrency/
- https://web3decentralization.com/how-to-create-a-crypto-wallet/
- https://web3decentralization.com/cold-wallet-vs-hot-wallet/
- https://web3decentralization.com/what-is-a-seed-phrase/
- https://web3decentralization.com/best-crypto-wallets/
- https://web3decentralization.com/crypto-scams-guide/

---

## Post A — Reddit r/CryptoCurrency or r/CryptoBeginners: "So you're about to create a crypto wallet"

**Title:** PSA for newbies: your *wallet password* is NOT your funds' password. Here's the one thing to protect.

**Body (markdown):**

```
Watching this sub recently, a LOT of "help I lost my funds" posts trace back to one
misunderstanding:

Your wallet app password (PIN / biometrics) only locks the app on YOUR device.

The thing that actually controls your coins is your SEED PHRASE (12/24 words).

- Anyone with the seed phrase = anyone with your coins.
- Lose the phrase = coins gone forever. No "forgot password". No support ticket.
- A screenshot, Notes app, or cloud backup of it is the #1 way people get drained.

Free guide I put together with everything I wish someone had told me day one:
https://web3decentralization.com/what-is-a-seed-phrase/

Also covers: cold vs hot wallets (https://web3decentralization.com/cold-wallet-vs-hot-wallet/)
and step-by-step wallet setup (https://web3decentralization.com/how-to-create-a-crypto-wallet/)

TL;DR: hardware wallet for anything significant, paper backup of the seed phrase
stored offline, and never type the phrase into any website. Ever.
```

**Why it works:** helpful PSA format (not "check my site"), speaks to the most
common beginner loss, and each link is genuinely the resource being recommended.
Post in r/CryptoCurrency, r/CryptoBeginners, r/CryptoMarkets (check each sub's
self-promo rules first — most allow direct educational links in comments, some
require the "no links/no promo" tag).

---

## Post B — Reddit r/CryptoTechnology or r/CryptoCurrency: "Cold vs hot wallet — what I wish I knew"

**Title:** Your exchange balance is a bank risk. Your hot wallet is a phone-risk. Your cold wallet is a key risk. Pick by use case, not hype.

**Body (markdown):**

```
Three different risks people rarely separate:

1. EXCHANGE = counterparty risk (hack, freeze, insolvency)
2. HOT WALLET = device risk (malware, phishing, lost phone)
3. COLD WALLET = you-risk (lose the device, lose the seed phrase = done)

Best practice I've seen hold up across many cycles:
- Keep only trading float on exchanges
- Keep active spending in a hot wallet (small %)
- Keep the majority in a hardware wallet (cold)

I wrote the comparison up with a decision tree here:
https://web3decentralization.com/cold-wallet-vs-hot-wallet/

And the full first-principles wallet setup here:
https://web3decentralization.com/how-to-create-a-crypto-wallet/

Question for the sub: what % of your bag is actually in self-custody right now?
```

**Why it works:** positions as a risk-framing discussion, ends with an engagement
question (drives comments = ranking signal), links are side resources.

---

## Post C — Hacker News "Ask HN" style (self-serve, no gatekeeper)

**Title:** Ask HN: how do you back up a crypto seed phrase without the cloud?

**Body:**

```
The standard advice is "write it on paper and store offline" — but paper burns,
floods, and gets lost. Metal plates exist (Cryptosteel, Billfodl), but they're
expensive.

I just published a practical guide with the trade-offs (paper vs metal vs
multi-location, BIP-39 basics, recovery testing):
https://web3decentralization.com/what-is-a-seed-phrase/

Curious what HN actually does for seed backups that outlive a house fire.
```

**Why it works:** asks for community knowledge (HN rewards this), the link is the
resource being recommended, not self-promo spam. r/selfhosted and r/Bitcoin
similarly good fits.

---

## Post D — Twitter/X thread: "One beginner crypto mistake per tweet"

Draft (6 tweets):

```
1/ Creating a crypto wallet is easy. Protecting it is the hard 1%.

Three wallets, three threats:
• Exchange → hack/freeze risk
• Hot wallet → phone/malware risk
• Cold wallet → loss-of-seed risk

2/ Your SEED PHRASE is the master key to ALL your addresses.

12 or 24 words. That's it. Anyone who has them has your coins.
No support can ever reset them.

3/ The #1 drain method: "support" asking for your seed phrase.

No exchange, no wallet app, no "network validator" ever needs it.
Any site that asks = scam.

4/ Why hardware wallets? The seed never leaves the device.
Even a compromised computer can't read it.

5/ Paper burns. Backup in TWO offline places.
Metal plates survive fire + water. Test restore once a year.

6/ Full free guides if you're new:
what-is-a-seed-phrase ➜ https://web3decentralization.com/what-is-a-seed-phrase/
cold vs hot ➜ https://web3decentralization.com/cold-wallet-vs-hot-wallet/
step-by-step setup ➜ https://web3decentralization.com/how-to-create-a-crypto-wallet/
scam red flags ➜ https://web3decentralization.com/crypto-scams-guide/
```

---

## Post E — StackExchange / Crypto.SE answers

Search "what is a seed phrase", "what happens if I lose my seed phrase",
"cold wallet vs hot wallet" — answer with a citation to the matching guide.
Keep it high-signal: 2-4 sentences + one link. Never a wall of self-promo.

---

## Tracking

| Post | Channel | Status | Link earned | Notes |
|------|---------|--------|-------------|-------|
| A | Reddit r/CryptoBeginners | ready | – | check promo rules |
| B | Reddit r/CryptoTechnology | ready | – | ends with engagement Q |
| C | HN Ask HN | ready | – | community ask + resource |
| D | Twitter/X | ready | – | 6-tweet thread |
| E | Crypto.SE answers | ongoing | – | answer-by-citation |

---

## Round 3 — Outreach Posts (PoS / DeFi / Card-Buy)

### Post F — Reddit r/CryptoCurrency or r/cryptotechnology

**Title:** Proof of Stake vs Proof of Work in 2026: the energy-vs-security trade-off nobody's talking about

**Body (markdown):**
```
Most people still think "PoW is bad, PoS is green" — but the real trade-off
is security-model vs energy, and each has its own centralization vector:

- PoW (Bitcoin): burns electricity + hardware as the attack cost. Security is
  economic and very obvious.
- PoS (Ethereum post-Merge): locks capital as the attack cost. 99.9% less
  energy, but introduces "stake centralization" via large pools.

We stress-tested both (and 10 other chains) across 4 pillars:
https://web3decentralization.com/proof-of-stake-vs-proof-of-work/

The short version: PoW wins on censorship resistance + energy-backed security;
PoS wins on efficiency + throughput. Neither is "decentralized" by default —
it depends on validator/staker distribution, which the Nakamoto Coefficient
measures: https://web3decentralization.com/nakamoto-coefficient/

Which side do you think is safer for a multi-decade store of value?
```

### Post G — Twitter/X thread (5 tweets)

```
1/ Most people think "PoS is green, PoW is dirty."

The real trade-off is DIFFERENT.

2/ PoW (Bitcoin): security = electricity + hardware cost.
To attack, you'd burn real money on ASICs + power.

That's the security model. Simple, transparent, expensive to fool.

3/ PoS (Ethereum): security = staked capital cost.
To attack, you'd need 1/3 of ALL staked ETH (~15-20B at current prices).

Attack = lose your stake (slashing). Efficient, but capital-heavy.

4/ The hidden trade-off nobody mentions:
- PoW centralizes → mining pools
- PoS centralizes → staking pools / Lido

Neither is "decentralized by default." Distribution matters.

5/ Full breakdown + scorecards for 12 chains:
https://web3decentralization.com/proof-of-stake-vs-proof-of-work/

Nakamoto Coefficient (who controls consensus):
https://web3decentralization.com/nakamoto-coefficient/
```

### Post H — Reddit r/defi or r/ethfinance

**Title:** A beginner's DeFi glossary: what you actually need to know before touching a DEX

**Body (markdown):**
```
Spent a weekend untangling DeFi jargon so you don't have to. The critical
concepts, in plain English:

• Smart contract = code that executes finance automatically on a blockchain
• DEX = trade directly from your wallet, no order book (Uniswap, Jupiter)
• Stablecoin = a coin pegged 1:1 to USD (USDC, USDT) — the "cash" of DeFi
• Liquidity pool = you deposit paired tokens, earn a cut of swap fees
• APY/Yield farming = incentivized returns (often temporary — DYOR)

I also covered the #1 mistake: keeping huge balances on a DEX hot wallet.
Full guide: https://web3decentralization.com/what-is-defi-decentralized-finance/

Plus wallet safety: https://web3decentralization.com/cold-wallet-vs-hot-wallet/
```

### Post I — r/CryptoCurrency (card purchase tip)

**Title:** Buying your first $25 of crypto: why a debit card beats a credit card every time

**Body (markdown):**
```
If you're buying crypto with a card, DEBIT not CREDIT:

- Credit cards treat crypto as a "cash advance" → 3-5% fee + APR from day 1
- Debit cards just charge the network fee (1.8-3.5%)
- Both are instant; debit avoids the cash-advance trap

I ran the numbers across exchanges (Binance, Bybit, Coinbase, Kraken):
https://web3decentralization.com/how-to-buy-crypto-with-credit-card/

And if anyone tells you "just max your card for more crypto" — that's how
beginners lose money twice (fees + interest). Buy small, learn, transfer to
your own wallet. https://web3decentralization.com/how-to-create-a-crypto-wallet/
```

### Round 3 Tracking

| Post | Channel | Status | Link earned | Notes |
|------|---------|--------|-------------|-------|
| F | Reddit r/cryptotechnology | ready | – | ends with engagement Q |
| G | Twitter/X | ready | – | 5-tweet thread |
| H | Reddit r/defi | ready | – | glossary + DEX safety |
| I | Reddit r/CryptoCurrency | ready | – | card vs debit tips |