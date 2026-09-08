# Affiliate Setup Checklist — revenue can't start until real referral IDs are in

The `/go/{exchange}` links are live 301s but point to GENERIC signups → you currently
earn ZERO commission. This is the one blocker between content + revenue.

## Where IDs live
`public_html/.htaccess` → 7 RewriteRule lines. Each needs its affiliate tag appended.
They're also referenced in article body links as `https://web3decentralization.com/go/binance`
so you only edit ONE place (the .htaccess target) and every article updates.

## What to do (in order, per exchange)

### Binance (highest priority — largest volume)
1. Create Binance account → Dashboard → **Invite & Earn Affiliate** → "Affiliate Marketing".
2. Apply (id/email check). Approved → Dashboard → **Affiliate Link Generator**.
3. Get your `ref=<CODE>` or `/join?ref=xxx` URL. **Replace:**
   `https://accounts.binance.com/en/register` →
   `https://accounts.binance.com/en/register?ref=<YOUR_CODE>`

### Bybit
1. Join Bybit Affiliate (Partner Program) → get referral link with `?affiliate_id=<ID>` or
   landing-page coupon code.
2. Replace `https://www.bybit.com/en` → `https://www.bybit.com/en/?affiliate_id=<ID>`
   (append as a query, keep the trailing slash + path).

### OKX
1. OKX Affiliate Program → "OKX Empire" / account manager issues a `refid` campaign link.
2. Replace `https://www.okx.com/` → `https://www.okx.com/join/<refid>` (or `?ref=<id>`).
   Prefer the `/join/<refid>` path — OKX supports deep-link campaign codes.

### MEXC
1. MEXC "Affiliate Program" → create campaign → get `?inviteCode=<CODE>`.
2. Replace `https://www.mexc.com/register` → `https://www.mexc.com/register?inviteCode=<CODE>`.

### Kraken / Coinbase / Gate
- Kraken: Affiliate program (invite/`?ref=`).
- Coinbase: Coinbase Earn → "invite" link with `?cb_ofc=...&code=...` params.
- Gate: Gate Ambassador / invite `?ref=<code>`.
- All three: same process — swap the generic path for your tagged URL.

## Post-edit steps (mandatory)
After editing any RedirectRule in `.htaccess`:
1. `rm -f wp-content/uploads/rank-math/rank_math_*.xml`
2. `wp cache flush --allow-root`
3. `curl -s -o /dev/null -w "%{http_code} %{redirect_url}\n" --max-redirs 1 https://web3decentralization.com/go/binance`
   → confirm 301 + your tagged URL appears in `redirect_url`.

## Attribution sanity checks
- Always click your own `/go/*` in a fresh/incognito (and a **mobile**) window to confirm the
  exchange shows affiliate tracking (cookies set, "ref" in their dashboard).
- Commission only counts on NEW-user signups that complete KYC for most programs.
- Keep the SAME lawless string (do not add `utm_` params INTO the .htaccess target — they can
  break some exchange's deep links; the affiliate code is enough).

## Recommended order
1. Binance → 2. Bybit → 3. OKX → 4. MEXC → 5. Kraken/Coinbase/Gate.
Then spot-verify all 7 and re-submit the sitemap.