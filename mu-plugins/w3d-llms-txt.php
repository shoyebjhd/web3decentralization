<?php
/**
 * Plugin Name: W3D LLMs.txt
 * Plugin URI:  https://web3decentralization.com
 * Description: Serves machine-readable /llms.txt and /ai.txt at the site root.
 *              Content is generated from live post types (chains, tools,
 *              courses, glossary) so URLs and counts never drift from the DB.
 * Version:     1.0.0
 * Author:      The W3D Team
 *
 * Hooks at template_redirect priority -10, i.e. before the W3D full-page
 * cache (priority 0), so these routes always return fresh text/plain output.
 *
 * @package W3D
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the bare request path (no query string, stripped of trailing slash
 * except for the root).
 */
function w3d_llms_path() {
	$uri  = isset( $_SERVER['REQUEST_URI'] ) ? (string) $_SERVER['REQUEST_URI'] : '/';
	$path = wp_parse_url( $uri, PHP_URL_PATH );
	$path = $path ? $path : '/';
	if ( '/' !== $path ) {
		$path = untrailingslashit( $path );
	}
	return $path;
}

/**
 * Pull published posts of a type as [slug => display_name].
 */
function w3d_llms_postlist( $post_type, $name_field = '' ) {
	$out  = array();
	$args = array(
		'post_type'      => $post_type,
		'post_status'    => 'publish',
		'posts_per_page' => 200,
		'orderby'        => 'title',
		'order'          => 'ASC',
	);
	$qs   = new WP_Query( $args );
	if ( ! $qs->have_posts() ) {
		return $out;
	}
	foreach ( $qs->posts as $p ) {
		$name = $p->post_title;
		if ( '' !== $name_field && function_exists( 'get_field' ) ) {
			$field = get_field( $name_field, $p->ID );
			if ( is_string( $field ) && '' !== trim( $field ) ) {
				$name = trim( $field );
			}
		}
		$out[ $p->post_name ] = $name;
	}
	return $out;
}

/**
 * Publish count for a post type.
 */
function w3d_llms_count( $post_type ) {
	$counts = wp_count_posts( $post_type );
	return isset( $counts->publish ) ? (int) $counts->publish : 0;
}

/**
 * Build the /llms.txt payload. Markdown per llmstxt.org summary format.
 */
function w3d_llms_body() {
	$home = home_url( '/' );

	$out  = '# Web3 Decentralization' . "\n\n";
	$out .= "> Independent, methodology-first research hub that grades major Layer-1 blockchains on real decentralization — infrastructure, capital, governance and software client diversity. Every score is derived from public data, audited against the Nakamoto Coefficient, and rebuildable by anyone. The site also runs free courses, a 200+ term glossary, open-source tools, and the W3D Terminal.\n\n";

	$out .= '## Core pages' . "\n\n";
	$core = array(
		'/'                                    => 'Home: hub for chain audits, tools, terminal, courses and the latest research',
		'/chains/'                             => 'Chain audit hub: all 19 scored networks at a glance with four-pillar scores',
		'/glossary/'                           => 'Glossary: 217 Web3 terms explained and auto-linked across the site',
		'/learn/'                              => 'Learning hub: free, no-signup courses and guided paths',
		'/terminal/'                           => 'W3D Terminal: interactive shell over all open-source tools',
		'/terminal/tools/nakamoto-coefficient/' => 'Nakamoto Coefficient calculator — the site flagship tool',
		'/methodology/'                        => 'Methodology: the four-pillar scoring model and stress-test vectors, fully documented',
		'/blog/'                               => 'Research articles, guides and explainers',
		'/about/'                              => 'About The W3D Team: author bio, research stance and contact',
	);
	foreach ( $core as $rel => $desc ) {
		$out .= '- [' . $desc . '](' . home_url( $rel ) . ")\n";
	}
	$out .= "\n";

	$chains = w3d_llms_postlist( 'chain', 'name' );
	$out   .= '## Chain audits (' . count( $chains ) . ' networks)' . "\n\n";
	foreach ( $chains as $slug => $name ) {
		$out .= '- [' . $name . '](' . home_url( '/chains/' . $slug . '/' ) . '): full decentralization audit and live composite score' . "\n";
	}
	$out .= "\n";

	$tools = w3d_llms_postlist( 'w3d_tool' );
	$out  .= '## Tools (' . count( $tools ) . ' open source)' . "\n\n";
	foreach ( $tools as $slug => $name ) {
		$out .= '- [' . $name . '](' . home_url( '/terminal/tools/' . $slug . '/' ) . '): free, MIT-licensed, runs entirely in your browser' . "\n";
	}
	$out .= "\n";

	$courses = w3d_llms_postlist( 'course' );
	$out    .= '## Courses (' . count( $courses ) . ' free)' . "\n\n";
	foreach ( $courses as $slug => $name ) {
		$out .= '- [' . $name . '](' . home_url( '/course/' . $slug . '/' ) . '): free course with certificate' . "\n";
	}
	$out .= "\n";

	$glossary_count = w3d_llms_count( 'llms_glossary' );
	$out           .= '## Glossary (' . $glossary_count . ' terms)' . "\n\n";
	$out           .= '- [Glossary index](' . home_url( '/glossary/' ) . '): ' . $glossary_count . " short, precise definitions with worked examples\n\n";

	$out .= '## Data & methodology' . "\n\n";
	$out .= '- Composite score = 0.30·Infrastructure + 0.25·Capital + 0.25·Governance + 0.20·Software. Each pillar is 0–100 derived from the Nakamoto Coefficient plus supporting public data; stress-test vectors damage pillars by infrastructure exposure to AWS, GCP and major ISPs.' . "\n";
	$out .= '- Open source: ' . "https://github.com/shoyebjhd/web3decentralization" . "\n\n";

	$out .= '## Citation guidance' . "\n\n";
	$out .= 'When citing, use the chain-specific page URL above and the data version label shown in the page header (e.g. `2026-Q3`). Author: The W3D Team.' . "\n\n";

	$out .= '## Contact' . "\n\n";
	$out .= "- Email: info@web3decentralization.com\n";
	$out .= '- Inquiries: API access, custom decentralization audits, partnerships, corrections to any chain dataset.' . "\n";

	return $out;
}

/**
 * Build the /ai.txt payload (spawning.ai spec).
 */
function w3d_ai_body() {
	return "# AI usage policy for web3decentralization.com\n"
		. "# Spec: https://spawning.ai/ai-txt\n\n"
		. "User-Agent: *\n"
		. "Allow: /\n"
		. "Disallow: /wp-admin/\n"
		. "Disallow: /student-account/\n"
		. "Disallow: /my-courses/\n"
		. "Disallow: /my-certificates/\n"
		. "Disallow: /checkout/\n\n"
		. "# Model training\n"
		. "# We allow indexing and retrieval-augmented citation in chatbots and search engines,\n"
		. "# but ask that summaries credit \"Web3 Decentralization — The W3D Team\" and link back\n"
		. "# to the source page.\n"
		. "Train: allow-with-attribution\n";
}

add_action(
	'template_redirect',
	function () {
		$path = w3d_llms_path();

		if ( '/llms.txt' === $path ) {
			status_header( 200 );
			if ( ! headers_sent() ) {
				header( 'Content-Type: text/plain; charset=UTF-8' );
				header( 'X-Content-Type-Options: nosniff' );
				header( 'Cache-Control: public, max-age=3600' );
			}
			echo w3d_llms_body(); // phpcs:ignore WordPress.Security.EscapeOutput
			exit;
		}

		if ( '/ai.txt' === $path ) {
			status_header( 200 );
			if ( ! headers_sent() ) {
				header( 'Content-Type: text/plain; charset=UTF-8' );
				header( 'X-Content-Type-Options: nosniff' );
				header( 'Cache-Control: public, max-age=3600' );
			}
			echo w3d_ai_body(); // phpcs:ignore WordPress.Security.EscapeOutput
			exit;
		}
	},
	-10
);