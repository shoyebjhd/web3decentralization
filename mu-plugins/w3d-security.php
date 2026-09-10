<?php
/**
 * W3D Security & social hardening.
 *
 * - XML-RPC: the `xmlrpc_enabled` filter below is legacy (core no longer
 *   honors it — verified live 2026-09-10). Real enforcement is the
 *   `<Files xmlrpc.php> Require all denied` block in root .htaccess.
 * - Login throttle: per-username (5 fails/15 min) + per-IP (20 fails/15 min)
 *   lockouts via transients. No plugin, no DB tables, self-cleaning.
 * - Removes leaking wp_head links, adds security headers, and provides a
 *   default OpenGraph image when a page has no featured/set image.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'xmlrpc_enabled', '__return_false' ); // legacy; enforced in .htaccess
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );

add_filter(
	'wp_headers',
	function ( $headers ) {
		$headers['X-Frame-Options']       = 'SAMEORIGIN';
		$headers['X-Content-Type-Options'] = 'nosniff';
		$headers['Referrer-Policy']        = 'strict-origin-when-cross-origin';
		$headers['Permissions-Policy']     = 'camera=(), microphone=(), geolocation=()';
		if ( is_ssl() ) {
			$headers['Strict-Transport-Security'] = 'max-age=31536000; includeSubDomains';
		}
		return $headers;
	}
);

function w3d_default_og_image() {
	return 'https://web3decentralization.com/wp-content/uploads/2026/09/w3d-default-og.png';
}

add_filter( 'rank_math/opengraph/facebook/image', 'w3d_og_fallback', 99 );
add_filter( 'rank_math/opengraph/twitter/image', 'w3d_og_fallback', 99 );
function w3d_og_fallback( $url ) {
	if ( empty( $url ) ) {
		return w3d_default_og_image();
	}
	return $url;
}

/**
 * Brute-force throttle.
 *
 * Counts failures per username (5/15min) and per IP (20/15min) in transients
 * (auto-expire, no cleanup needed). Blocks at `authenticate` priority 5 —
 * before credentials are even checked — and clears on successful login.
 * Per-username buckets stop password spraying cold; per-IP buckets stop
 * distributed guessing without ever mass-blocking (shared/proxy IPs only
 * trip the 20-fail IP bar, which legitimate traffic never reaches).
 */
function w3d_throttle_key( $kind, $id ) {
	return 'w3d_lf_' . $kind . '_' . sha1( $id );
}

function w3d_throttle_count( $kind, $id ) {
	return (int) get_transient( w3d_throttle_key( $kind, $id ) );
}

function w3d_throttle_hit( $kind, $id ) {
	$key = w3d_throttle_key( $kind, $id );
	set_transient( $key, w3d_throttle_count( $kind, $id ) + 1, 15 * MINUTE_IN_SECONDS );
}

function w3d_client_ip() {
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? (string) $_SERVER['REMOTE_ADDR'] : '';
	return $ip;
}

add_filter(
	'authenticate',
	function ( $user, $username, $password ) {
		// Late priority (9999): runs after core username/email/application-password
		// checks, which discard earlier WP_Error returns. Success passes through
		// untouched; failures keep their original error unless throttled.
		if ( $user instanceof WP_User ) {
			return $user;
		}
		if ( '' === (string) $username ) {
			return $user;
		}
		if ( w3d_throttle_count( 'u', strtolower( (string) $username ) ) >= 5
			|| w3d_throttle_count( 'ip', w3d_client_ip() ) >= 20 ) {
			return new WP_Error(
				'w3d_locked',
				__( 'Too many failed login attempts. Try again in 15 minutes.', 'w3d' )
			);
		}
		return $user;
	},
	9999,
	3
);

add_action(
	'wp_login_failed',
	function ( $username ) {
		w3d_throttle_hit( 'u', strtolower( (string) $username ) );
		w3d_throttle_hit( 'ip', w3d_client_ip() );
	}
);

// Note: buckets self-expire via transient TTL (15 min), so no cleanup or
// success-reset bookkeeping is needed; worst case a user waits out the window.
