<?php
/**
 * W3D PHP-based redirects.
 * Runs on init so it works regardless of .htaccess / LiteSpeed / WordPress rewrite priority.
 * Handles /go/* affiliate redirects and legacy author-slug canonical redirects.
 * Cache-control headers prevent CDN edge nodes from caching stale responses.
 */
add_action('init', function () {
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    if (false !== ($qpos = strpos($uri, '?'))) {
        $uri = substr($uri, 0, $qpos);
    }
    $uri = rtrim($uri, '/');

    $targets = [
        '/go/binance'   => 'https://accounts.binance.com/en/register',
        '/go/bybit'     => 'https://www.bybit.com/en',
        '/go/okx'       => 'https://www.okx.com/',
        '/go/mexc'      => 'https://www.mexc.com/register',
        '/go/kraken'    => 'https://www.kraken.com/sign-up',
        '/go/coinbase'  => 'https://www.coinbase.com/join',
        '/go/gate'      => 'https://www.gate.io/signup',
        '/go/signup'    => 'https://accounts.binance.com/en/register',
    ];
    if (isset($targets[$uri])) {
        nocache_headers();
        wp_redirect($targets[$uri], 301);
        exit;
    }

    if ($uri === '/author') {
        nocache_headers();
        wp_redirect('/about/', 301);
        exit;
    }
    // Legacy author archive slug -> canonical neutral team archive.
    if ($uri === '/author/alex-vance') {
        nocache_headers();
        wp_redirect('/author/w3d-team/', 301);
        exit;
    }

    // Legacy /chains/<friendly-name>/ URLs -> canonical chain audit slug.
    // Old site used full display names (bitcoin, ethereum, solana...) while the
    // chain CPT is keyed by ticker slugs (btc, eth, sol...). Without this map the
    // stale URLs softly resolve to unrelated glossary terms and emit wrong canonicals.
    if (preg_match('#^/chains/([^/]+)$#i', $uri, $m)) {
        $slug     = strtolower($m[1]);
        $chain_tx = get_transient('w3d_chain_alias_map');
        if (!is_array($chain_tx)) {
            $posts = get_posts(
                array(
                    'post_type'   => 'chain',
                    'post_status' => 'publish',
                    'numberposts' => 100,
                    'fields'      => 'ids',
                )
            );
            $map = array();
            foreach ($posts as $pid) {
                $s    = get_post_field('post_name', $pid);
                $name = get_field('name', $pid);
                if (!$name) {
                    $name = get_the_title($pid);
                }
                $friendly = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', preg_replace('/\s*Decentralization Audit.*$/i', '', $name)), '-'));
                if ('' !== $friendly) {
                    $map[$friendly] = $s;
                }
                $map[$s] = $s;
            }
            $chain_tx = $map;
            set_transient('w3d_chain_alias_map', $chain_tx, 6 * HOUR_IN_SECONDS);
        }

        $target = isset($chain_tx[$slug]) ? '/chains/' . $chain_tx[$slug] . '/' : '/chains/';
        if ($target !== $uri . '/') {
            nocache_headers();
            wp_redirect($target, 301);
            exit;
        }
    }
});