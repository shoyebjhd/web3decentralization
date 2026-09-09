<?php
/**
 * W3D — standalone theme functions.
 *
 * Registers the "chain" custom post type + ACF audit fields (moved over
 * from the legacy Astra child theme), wires up self-hosted assets, and
 * replaces the Astra-only "blog intro" hook with native template output.
 *
 * @package w3d
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Merge certificate template codes on earned certificates.
 *
 * LifterLMS stores earned `llms_my_certificate` posts from the raw template
 * content. The core display path only merges codes for `llms_certificate`
 * (template) posts, so student certificates can render literal placeholders.
 * This re-runs the merge with the certificate's owner when rendering earned certs.
 */
function w3d_merge_earned_certificate_content( $content, $id, $certificate ) {
	if ( $certificate && is_object( $certificate ) && 'llms_my_certificate' === get_post_type( $id ) && strpos( $content, '{' ) !== false ) {
		$content = $certificate->merge_content( $content );
	}
	return $content;
}
add_filter( 'lifterlms_certificate_content', 'w3d_merge_earned_certificate_content', 10, 3 );

define( 'W3D_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Theme supports + menus.
 */
function w3d_setup() {
	load_theme_textdomain( 'w3d', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 220,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'w3d' ),
		'footer'  => __( 'Footer Menu', 'w3d' ),
	) );
}
add_action( 'after_setup_theme', 'w3d_setup' );

function w3d_asset_ver( $path ) {
	$file = get_template_directory() . $path;
	return file_exists( $file ) ? (string) filemtime( $file ) : '1.0.0';
}

/**
 * Styles + scripts. Fonts are self-hosted and referenced from style.css,
 * so no external (render-blocking) font requests ever leave the site.
 * Every Gutenberg class used by the content is covered by style.css, so
 * the core block library stylesheet is intentionally not enqueued.
 */
function w3d_enqueue_assets() {
	wp_enqueue_style(
		'w3d-style',
		get_stylesheet_uri(),
		array(),
		w3d_asset_ver( '/style.css' )
	);

	wp_enqueue_script(
		'w3d-ui',
		get_theme_file_uri( 'assets/w3d-ui.js' ),
		array(),
		w3d_asset_ver( '/assets/w3d-ui.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'w3d_enqueue_assets' );

/**
 * LifterLMS ships jQuery + jQuery-UI + its own JS/CSS on EVERY page.
 * Those assets are only required on learning surfaces; strip them (and the
 * legacy jQuery migrate shim) everywhere else to cut ~200 KB of JS/CSS per load.
 */
function w3d_llms_context() {
	$need = false;

	if ( is_singular() ) {
		$type = get_post_type();
		if ( in_array( $type, array( 'course', 'lesson', 'llms_quiz', 'llms_my_certificate', 'llms_certificate' ), true ) ) {
			$need = true;
		}
	} elseif ( is_post_type_archive( array( 'course', 'lesson' ) ) || is_tax( array( 'course_cat', 'course_difficulty', 'course_tag', 'lesson_tag' ) ) ) {
		$need = true;
	}

	if ( is_page() ) {
		$page = get_post();
		if ( $page && false !== stripos( (string) $page->post_content, '[lifterlms' ) ) {
			$need = true;
		}
	}

	return $need;
}

function w3d_strip_llms_assets() {
	if ( w3d_llms_context() ) {
		return;
	}
	foreach ( array( 'llms-js', 'llms-ajax-js', 'llms-form-checkout-js', 'webui-popover', 'jquery-ui-tooltip', 'jquery-ui-datepicker', 'jquery-ui-mouse', 'jquery-ui-slider', 'jquery-ui-autocomplete', 'jquery-ui-core' ) as $h ) {
		wp_dequeue_script( $h );
	}
	foreach ( array( 'lifterlms-styles', 'webui-popover', 'llms-ajax-css' ) as $h ) {
		wp_dequeue_style( $h );
	}
}
add_action( 'wp_enqueue_scripts', 'w3d_strip_llms_assets', 200 );

function w3d_drop_jquery_migrate( $scripts ) {
	if ( ! is_admin() ) {
		$scripts->remove( 'jquery-migrate' );
	}
}
add_action( 'wp_default_scripts', 'w3d_drop_jquery_migrate' );

/**
 * Renders the Rank Math breadcrumb trail (JSON-LD breadcrumbs are added by
 * Rank Math itself when its breadcrumbs module is enabled). Falls back to a
 * simple Home link if Rank Math is unavailable.
 */
function w3d_breadcrumbs() {
	if ( ! is_front_page() && ! is_home() ) {
		echo '<nav class="w3d-crumbs" aria-label="Breadcrumb">';
		if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
			rank_math_the_breadcrumbs();
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'w3d' ) . '</a>';
		}
		echo '</nav>';
	}
}

/**
 * Ensures no indexable page is ever served without a meta description.
 * Rank Math only calls this hook on the front end, so no is_admin() guard needed.
 */
function w3d_seo_default_description( $description ) {
	$curated_archives = array(
		'course'      => 'Browse all free Web3 & crypto courses — Bitcoin, blockchains, DeFi and Web3 fundamentals with lessons, quizzes and live labs. No signup required.',
		'chain'       => 'Independent blockchain decentralization audits: Nakamoto Coefficient and four-pillar scores for the top 12 networks, recomputed from public data.',
		'llms_glossary' => 'Plain-language crypto & Web3 glossary — every term explained with short, friendly pages: blocks, nodes, forks, stablecoins, rollups and more.',
	);
	if ( is_post_type_archive() ) {
		$pt = get_queried_object();
		if ( $pt && isset( $curated_archives[ $pt->name ] ) ) {
			return $curated_archives[ $pt->name ];
		}
	}

	if ( $description ) {
		return $description;
	}

	if ( is_front_page() || is_home() ) {
		return 'Independent decentralization scores for 12 blockchains, honest exchange reviews, and free Web3 courses, glossary and labs from The W3D Team.';
	}

	if ( is_singular( 'course' ) ) {
		return 'Free course: ' . get_the_title() . ' — learn Bitcoin, smart contracts, DeFi and Web3 with hands-on lessons, quizzes and live terminal labs from Web3 Decentralization.';
	}

	if ( is_singular( 'lesson' ) ) {
		return 'Free lesson: ' . get_the_title() . ' — part of the Web3 Decentralization learning path with plain-English explanations and hands-on labs.';
	}

	if ( is_page() ) {
		$title = get_the_title();
		return $title . ' — plain-English Web3 & crypto education from Web3 Decentralization.';
	}

	if ( is_post_type_archive( 'course' ) ) {
		return 'Browse all free Web3 & crypto courses — Bitcoin, blockchains, DeFi and Web3 fundamentals with lessons, quizzes and live labs. No signup required.';
	}

	if ( is_post_type_archive( 'chain' ) ) {
		return 'Independent blockchain decentralization audits: Nakamoto Coefficient and four-pillar scores for the top 12 networks, recomputed from public data.';
	}

	if ( is_post_type_archive( 'llms_glossary' ) ) {
		return 'Plain-language crypto & Web3 glossary — every term explained with short, friendly pages: blocks, nodes, forks, stablecoins, rollups and more.';
	}

	if ( is_archive() ) {
		return 'Browse ' . wp_strip_all_tags( get_the_archive_title() ) . ' guides, reviews, audits and research from The W3D Team at Web3 Decentralization.';
	}

	return $description;
}
add_filter( 'rank_math/frontend/description', 'w3d_seo_default_description' );

/**
 * LifterLMS installs its own template_loader (priority 10) which can replace
 * theme archive templates for its post types. Re-assert our archive templates
 * so /courses/ (and glossary) render with the theme's a11y-first markup.
 */
function w3d_force_llms_archive_templates( $template ) {
	if ( is_post_type_archive( 'course' ) ) {
		$ours = locate_template( array( 'archive-course.php' ) );
		if ( $ours ) {
			return $ours;
		}
	}
	if ( is_post_type_archive( 'llms_glossary' ) ) {
		$ours = locate_template( array( 'archive-llms_glossary.php' ) );
		if ( $ours ) {
			return $ours;
		}
	}
	return $template;
}
add_filter( 'template_include', 'w3d_force_llms_archive_templates', 999 );

/**
 * Adds a structured Course schema node on free course + lesson pages when
 * Rank Math has not already emitted one (Course / EducationalOccupational).
 */
function w3d_course_jsonld( $data ) {
	if ( ! is_singular( array( 'course', 'lesson' ) ) ) {
		return $data;
	}

	foreach ( (array) $data as $node ) {
		$types = (array) ( ! empty( $node['@type'] ) ? $node['@type'] : array() );
		if ( in_array( 'Course', $types, true ) || in_array( 'EducationalOccupationalCredential', $types, true ) ) {
			return $data;
		}
	}

	$post = get_post();
	if ( ! $post ) {
		return $data;
	}

	$excerpt = wp_strip_all_tags( get_the_excerpt() );
	if ( '' === $excerpt ) {
		$excerpt = wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post->ID ) ), 40 );
	}

	$data[] = array(
		'@type'             => 'Course',
		'name'              => get_the_title(),
		'description'       => $excerpt,
		'learningResourceType' => array( 'Lesson', 'Quiz', 'Hands-on lab' ),
		'provider'          => array(
			'@type' => 'Organization',
			'name'  => 'Web3 Decentralization',
			'url'   => home_url( '/' ),
		),
		'hasCourseInstance' => array(
			'@type'        => 'CourseInstance',
			'courseMode'   => 'Online',
			'courseWorkload' => 'PT6H',
			'isAccessibleForFree' => true,
			'sameAs'       => get_permalink( $post ),
		),
	);

	return $data;
}
add_filter( 'rank_math/json_ld', 'w3d_course_jsonld', 20 );

/**
 * Keeps the LLMS "Course Information" meta block in heading order (h2 after h1).
 */
function w3d_llms_course_meta_heading( $content ) {
	if ( is_singular( array( 'course', 'lesson' ) ) ) {
		$content = str_replace(
			array( '<h3 class="llms-meta-title">', '<h3 class="llms-meta-title" >' ),
			'<h2 class="llms-meta-title">',
			$content
		);
		$content = str_replace(
			array( '<h4 class="llms-access-plan-title">', '<h4 class="llms-access-plan-title" >' ),
			'<h3 class="llms-access-plan-title">',
			$content
		);
	}
	return $content;
}
add_filter( 'the_content', 'w3d_llms_course_meta_heading', 21 );

/**
 * Next-lesson navigation on lesson pages: shows where the learner is inside
 * its course ("Lesson 3 of 8") plus a link to the following lesson.
 */
function w3d_lesson_nav() {
	if ( ! is_singular( 'lesson' ) ) {
		return;
	}
	if ( ! function_exists( 'llms_get_post' ) ) {
		return;
	}

	$lesson = llms_get_post( get_the_ID() );
	if ( ! $lesson ) {
		return;
	}

	$course_id = $lesson->get_parent_course();
	if ( ! $course_id ) {
		return;
	}

	$course = llms_get_post( $course_id );
	if ( ! $course ) {
		return;
	}

	$lessons       = method_exists( $course, 'get_lessons' ) ? $course->get_lessons() : array();
	$candidates    = is_array( $lessons ) && isset( $lessons['results'] ) && is_array( $lessons['results'] ) ? $lessons['results'] : ( is_array( $lessons ) ? $lessons : array() );
	$ids           = array();
	foreach ( $candidates as $item ) {
		if ( is_object( $item ) && method_exists( $item, 'get' ) ) {
			$ids[] = (int) $item->get( 'id' );
		} elseif ( is_numeric( $item ) ) {
			$ids[] = (int) $item;
		}
	}
	$ids = array_values( array_filter( $ids ) );
	if ( ! $ids ) {
		return;
	}

	$pos = array_search( get_the_ID(), $ids, true );
	if ( false === $pos ) {
		return;
	}

	$next_id = isset( $ids[ $pos + 1 ] ) ? (int) $ids[ $pos + 1 ] : 0;
	$prev_id = isset( $ids[ $pos - 1 ] ) ? (int) $ids[ $pos - 1 ] : 0;
	?>
	<nav class="w3d-lesson-nav" aria-label="Lesson navigation">
		<p class="w3d-lesson-nav-course">
			<a href="<?php echo esc_url( get_permalink( $course_id ) ); ?>"><?php echo esc_html__( 'Course', 'w3d' ); ?>: <?php echo esc_html( get_the_title( $course_id ) ); ?></a>
			<span class="w3d-lesson-nav-progress"><?php echo esc_html( sprintf( 'Lesson %d of %d', $pos + 1, count( $ids ) ) ); ?></span>
		</p>
		<div class="w3d-lesson-nav-steps">
		<?php if ( $prev_id ) : ?>
			<a class="w3d-btn w3d-btn-alt w3d-lesson-nav-prev" href="<?php echo esc_url( get_permalink( $prev_id ) ); ?>">
				&larr; <?php echo esc_html__( 'Previous lesson', 'w3d' ); ?>: <?php echo esc_html( get_the_title( $prev_id ) ); ?>
			</a>
		<?php endif; ?>
		<?php if ( $next_id ) : ?>
			<a class="w3d-btn w3d-lesson-nav-next" href="<?php echo esc_url( get_permalink( $next_id ) ); ?>">
				<?php echo esc_html__( 'Next lesson', 'w3d' ); ?>: <?php echo esc_html( get_the_title( $next_id ) ); ?> &rarr;
			</a>
		<?php else : ?>
			<a class="w3d-btn w3d-lesson-nav-next" href="<?php echo esc_url( get_permalink( $course_id ) ); ?>">
				<?php echo esc_html__( 'Finish the course', 'w3d' ); ?> &rarr;
			</a>
		<?php endif; ?>
		</div>
	</nav>
	<?php
}

/**
 * Defer the UI script so it never blocks parsing or first paint.
 */
function w3d_defer_ui_script( $tag, $handle ) {
	if ( 'w3d-ui' === $handle ) {
		$tag = str_replace( ' src=', ' defer src=', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'w3d_defer_ui_script', 10, 2 );

/**
 * Preload the self-hosted fonts used above the fold.
 */
function w3d_preload_fonts() {
	foreach ( array( 'inter', 'space-grotesk', 'jetbrains-mono' ) as $font ) {
		echo '<link rel="preload" href="' . esc_url( get_theme_file_uri( 'assets/fonts/' . $font . '.woff2' ) ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
	}
}
add_action( 'wp_head', 'w3d_preload_fonts', 4 );

/**
 * Favicon set — waveform SVG lives in /terminal/.
 */
function w3d_favicons() {
	echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( home_url( '/terminal/favicon.svg' ) ) . '">' . "\n";
	echo '<link rel="shortcut icon" type="image/svg+xml" href="' . esc_url( home_url( '/terminal/favicon.svg' ) ) . '">' . "\n";
}
add_action( 'wp_head', 'w3d_favicons', 5 );

/**
 * Reading-progress bar (single content only).
 */
function w3d_reading_progress() {
	if ( ! is_singular() || is_attachment() ) {
		return;
	}
	echo '<div class="w3d-progress" role="presentation" aria-hidden="true"></div>' . "\n";
}
add_action( 'wp_body_open', 'w3d_reading_progress' );

/**
 * Drop emoji/embed + oEmbed discovery cruft — fewer requests, cleaner head.
 */
function w3d_clean_head() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
}
add_action( 'init', 'w3d_clean_head' );

/**
 * Marker class + js early-mark for reveal gating.
 */
function w3d_body_classes( $classes ) {
	$classes[] = 'w3d-app';
	return $classes;
}
add_filter( 'body_class', 'w3d_body_classes' );

add_filter( 'excerpt_length', function () {
	return 26;
}, 999 );

add_filter( 'excerpt_more', function () {
	return '&hellip;';
}, 999 );

/**
 * Promote the hero headline to a single <h1> on the static front page so
 * every page has exactly one visible top-level heading.
 */
function w3d_front_page_hero_h1( $content ) {
	if ( ! is_front_page() ) {
		return $content;
	}
	if ( preg_match( '#<h2([^>]*)>(.*?)</h2>#s', $content, $m, PREG_OFFSET_CAPTURE ) ) {
		$match = $m[0][0];
		$pos   = $m[0][1];
		$fix   = '<h1' . $m[1][0] . '>' . $m[2][0] . '</h1>';
		$content = substr( $content, 0, $pos ) . $fix . substr( $content, $pos + strlen( $match ) );
	}
	return $content;
}
add_filter( 'the_content', 'w3d_front_page_hero_h1', 9 );

/**
 * Resolve the branding logo URL. Prefers the `custom_logo` theme mod,
 * then falls back to the uploaded waveform logo.svg attachment (Astra
 * kept the logo outside the custom_logo option).
 */
function w3d_logo_src() {
	static $src = null;
	if ( null !== $src ) {
		return $src;
	}
	$src  = '';
	$cid  = get_theme_mod( 'custom_logo' );

	if ( $cid ) {
		$maybe = wp_get_attachment_image_url( $cid, 'full' );
		if ( $maybe ) {
			$src = $maybe;
		}
	}
	if ( ! $src ) {
		$logos = get_posts( array(
			'post_type'      => 'attachment',
			'posts_per_page' => 1,
			'name'           => 'logo',
			'no_found_rows'  => true,
			'post_status'    => 'inherit',
			'fields'         => 'ids',
		) );
		if ( $logos ) {
			$src = wp_get_attachment_url( $logos[0] );
		}
	}
	return $src;
}

/**
 * Append the Glossary link to the primary navigation.
 */
function w3d_nav_glossary_link( $items, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$items .= '<li class="w3d-gloss-nav-item"><a href="' . esc_url( home_url( '/glossary/' ) ) . '">Glossary</a></li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'w3d_nav_glossary_link', 10, 2 );

/**
 * Append the Learn link to the primary navigation.
 */
function w3d_nav_learn_link( $items, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$items .= '<li class="w3d-learn-nav-item"><a href="' . esc_url( home_url( '/learn/' ) ) . '">Learn</a></li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'w3d_nav_learn_link', 20, 2 );

/**
 * Logo element used in the header + footer.
 */
function w3d_logo_markup( $with_wordmark = true ) {
	$src = w3d_logo_src();
	if ( ! $src ) {
		return '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="w3d-brand-link"><span class="w3d-site-name">Web3 Decentralization</span></a>';
	}
	$out = '<img src="' . esc_url( $src ) . '" class="w3d-logo-img" alt="' . ( $with_wordmark ? '' : esc_attr( 'Web3 Decentralization' ) ) . '" decoding="async">';
	if ( $with_wordmark ) {
		$out .= '<span class="w3d-site-name">Web3 Decentralization</span>';
	}
	return '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="w3d-brand-link">' . $out . '</a>';
}

/**
 * Registry helpers for the nav menu output (used by header.php).
 */
function w3d_has_primary_menu() {
	return has_nav_menu( 'primary' );
}

/**
 * Register the "chain" custom post type.
 * Rewrite slug keeps the legacy /chains/<symbol>/ URLs intact.
 */
function w3d_register_chain_cpt() {
	$labels = array(
		'name'               => __( 'Chains', 'w3d' ),
		'singular_name'      => __( 'Chain', 'w3d' ),
		'menu_name'          => __( 'Chains', 'w3d' ),
		'add_new_item'       => __( 'Add New Chain', 'w3d' ),
		'edit_item'          => __( 'Edit Chain', 'w3d' ),
		'new_item'           => __( 'New Chain', 'w3d' ),
		'view_item'          => __( 'View Chain', 'w3d' ),
		'search_items'       => __( 'Search Chains', 'w3d' ),
		'not_found'          => __( 'No chains found', 'w3d' ),
		'not_found_in_trash' => __( 'No chains found in Trash', 'w3d' ),
	);

	register_post_type( 'chain', array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-chart-area',
		'menu_position'      => 5,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'chains', 'with_front' => false ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
	) );
}
add_action( 'init', 'w3d_register_chain_cpt' );

/**
 * ACF field group powering the per-chain audit dashboard.
 */
function w3d_register_chain_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_w3d_chain',
		'title'    => 'Chain Audit Data',
		'fields'   => array(
			array(
				'key'          => 'field_w3d_symbol',
				'label'        => 'Symbol',
				'name'         => 'symbol',
				'type'         => 'text',
				'instructions' => 'Ticker (e.g. BTC).',
				'maxlength'    => 10,
			),
			array(
				'key'          => 'field_w3d_name',
				'label'        => 'Name',
				'name'         => 'name',
				'type'         => 'text',
				'instructions' => 'Human-readable name (e.g. Bitcoin).',
				'maxlength'    => 80,
			),
			array(
				'key'          => 'field_w3d_score_total',
				'label'        => 'Composite Score (0-100)',
				'name'         => 'score_total',
				'type'         => 'number',
				'min'          => 0,
				'max'          => 100,
				'step'         => 0.1,
			),
			array(
				'key'          => 'field_w3d_score_infrastructure',
				'label'        => 'Infrastructure Score (0-100)',
				'name'         => 'score_infrastructure',
				'type'         => 'number',
				'min'          => 0,
				'max'          => 100,
				'step'         => 0.1,
			),
			array(
				'key'          => 'field_w3d_score_capital',
				'label'        => 'Capital Score (0-100)',
				'name'         => 'score_capital',
				'type'         => 'number',
				'min'          => 0,
				'max'          => 100,
				'step'         => 0.1,
			),
			array(
				'key'          => 'field_w3d_score_governance',
				'label'        => 'Governance Score (0-100)',
				'name'         => 'score_governance',
				'type'         => 'number',
				'min'          => 0,
				'max'          => 100,
				'step'         => 0.1,
			),
			array(
				'key'          => 'field_w3d_score_software',
				'label'        => 'Software Score (0-100)',
				'name'         => 'score_software',
				'type'         => 'number',
				'min'          => 0,
				'max'          => 100,
				'step'         => 0.1,
			),
			array(
				'key'           => 'field_w3d_last_updated',
				'label'         => 'Last Updated',
				'name'          => 'last_updated',
				'type'          => 'date_picker',
				'display_format' => 'F j, Y',
				'return_format'  => 'Y-m-d',
			),
			array(
				'key'          => 'field_w3d_summary',
				'label'        => 'Summary',
				'name'         => 'summary',
				'type'         => 'textarea',
				'rows'         => 4,
				'new_lines'    => 'br',
			),
			array(
				'key'          => 'field_w3d_long_description',
				'label'        => 'Long Description',
				'name'         => 'long_description',
				'type'         => 'wysiwyg',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'chain',
				),
			),
		),
		'menu_order' => 0,
		'position'   => 'normal',
		'style'      => 'default',
	) );
}
add_action( 'acf/init', 'w3d_register_chain_fields' );

/**
 * Excerpt for the static blog-intro page (used by index.php).
 */
function w3d_blog_intro_content() {
	$intro = get_post_field( 'post_content', 24 );
	if ( ! $intro ) {
		return '';
	}
	$intro = apply_filters( 'the_content', $intro );
	if ( is_home() ) {
		$intro = preg_replace( '#<h2([^>]*)>(.*?)</h2>#s', '<h1$1>$2</h1>', $intro, 1 );
	}
	return $intro;
}

/**
 * Register the "glossary" custom post type (crypto/Web3 terms).
 */
function w3d_register_glossary_cpt() {
	$labels = array(
		'name'               => __( 'Glossary Terms', 'w3d' ),
		'singular_name'      => __( 'Glossary Term', 'w3d' ),
		'add_new_item'       => __( 'Add New Term', 'w3d' ),
		'edit_item'          => __( 'Edit Term', 'w3d' ),
		'new_item'           => __( 'New Term', 'w3d' ),
		'view_item'          => __( 'View Term', 'w3d' ),
		'search_items'       => __( 'Search Terms', 'w3d' ),
		'all_items'          => __( 'Glossary Terms', 'w3d' ),
	);
	register_post_type( 'llms_glossary', array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-book-alt',
		'menu_position'      => 4,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'glossary', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array( 'title', 'editor', 'excerpt', 'custom-fields', 'revisions' ),
	) );
}
add_action( 'init', 'w3d_register_glossary_cpt' );

/**
 * Cache-friendly lookup of glossary terms for inline linking.
 */
function w3d_glossary_terms() {
	$terms = get_transient( 'w3d_glossary_terms' );
	if ( is_array( $terms ) ) {
		return $terms;
	}

	$terms = array();
	$posts = get_posts( array(
		'post_type'      => 'llms_glossary',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );
	foreach ( $posts as $post ) {
		$terms[ $post->post_title ] = get_permalink( $post->ID );
	}
	// Longest terms first so multi-word terms win over their sub-words.
	uksort( $terms, static function ( $a, $b ) {
		return mb_strlen( $b ) - mb_strlen( $a );
	} );

	set_transient( 'w3d_glossary_terms', $terms, DAY_IN_SECONDS );
	return $terms;
}

/**
 * Bust the glossary term cache whenever a term is saved/trashed.
 */
function w3d_glossary_flush( $post_id ) {
	if ( get_post_type( $post_id ) === 'llms_glossary' ) {
		delete_transient( 'w3d_glossary_terms' );
	}
}
add_action( 'save_post_llms_glossary', 'w3d_glossary_flush' );
add_action( 'before_delete_post', 'w3d_glossary_flush' );

/**
 * Link the first occurrence of each glossary term inside prose content.
 *
 * Runs on front-end `the_content` output (paragraph-level text only) for
 * posts, pages, chain audits, and LLMS lessons/courses. Links one occurrence
 * per term and never touches existing anchors or headings.
 */
function w3d_link_glossary_terms( $content ) {
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $content;
	}
	if ( false !== strpos( $content, 'w3d-gloss' ) ) {
		return $content;
	}

	// The student dashboard renders the tutor widget (with a JSON payload in an
	// attribute); linking prose inside its markup would corrupt that JSON.
	if ( false !== strpos( $content, 'w3d-tutor' ) ) {
		return $content;
	}

	$type = get_post_type();
	if ( ! in_array( $type, array( 'post', 'page', 'chain', 'lesson', 'course' ), true ) ) {
		return $content;
	}

	$terms = w3d_glossary_terms();
	if ( ! $terms ) {
		return $content;
	}

	// Never self-link on the term's own page.
	if ( 'llms_glossary' === $type ) {
		$current_title = get_the_title();
		unset( $terms[ $current_title ] );
	}
	if ( ! $terms ) {
		return $content;
	}

	// Shelve non-prose HTML so we only link plain text.
	$shelved = array();
	$content = preg_replace_callback(
		'#<(a|h[1-6]|pre|code|script|style)(\s[^>]*)?>.*?</\1>#si',
		static function ( $m ) use ( &$shelved ) {
			$k = "\x00w3d-" . count( $shelved );
			$shelved[ $k ] = $m[0];
			return $k;
		},
		$content
	);

	foreach ( $terms as $term => $url ) {
		$re = '/(?<![\w])' . preg_quote( $term, '/' ) . '(?![\w])/iu';
		$content = preg_replace(
			$re,
			'<a class="w3d-gloss" href="' . esc_url( $url ) . '">$0</a>',
			$content,
			1
		);
	}

	return strtr( $content, $shelved );
}
add_filter( 'the_content', 'w3d_link_glossary_terms', 19 );

/**
 * Learner XP ledger.
 *
 * Tracks experience points on student completions: +10 per lesson,
 * +25 per passed quiz, +100 per completed course.
 */
function w3d_add_xp( $user_id, $points, $why ) {
	if ( ! $user_id ) {
		return 0;
	}
	$total = (int) get_user_meta( $user_id, '_w3d_xp', true );
	$total += $points;
	update_user_meta( $user_id, '_w3d_xp', $total );

	$log = get_user_meta( $user_id, '_w3d_xp_log', true );
	if ( ! is_array( $log ) ) {
		$log = array();
	}
	$log[] = array(
		'pts' => $points,
		'why' => $why,
		'ts'  => current_time( 'timestamp' ),
	);
	$log = array_slice( $log, -50 );
	update_user_meta( $user_id, '_w3d_xp_log', $log );
	return $total;
}

function w3d_xp_lesson( $user_id, $lesson_id ) {
	w3d_add_xp( $user_id, 10, 'Lesson completed' );
}
add_action( 'lifterlms_lesson_completed', 'w3d_xp_lesson', 10, 2 );

function w3d_xp_quiz( $user_id, $quiz_id ) {
	w3d_add_xp( $user_id, 25, 'Quiz passed' );
}
add_action( 'lifterlms_quiz_passed', 'w3d_xp_quiz', 10, 2 );

function w3d_xp_course( $user_id, $course_id ) {
	w3d_add_xp( $user_id, 100, 'Course completed' );
}
add_action( 'lifterlms_course_completed', 'w3d_xp_course', 10, 2 );

/**
 * Learner stats strip shown at the top of every student dashboard page.
 */
function w3d_learner_stats_panel() {
	$uid = get_current_user_id();
	if ( ! $uid ) {
		return;
	}
	static $done = false;
	if ( $done ) {
		return;
	}
	$done = true;
	$xp        = (int) get_user_meta( $uid, '_w3d_xp', true );
	$certs     = count( get_posts( array( 'post_type' => 'llms_my_certificate', 'post_author' => $uid, 'post_status' => 'publish', 'fields' => 'ids' ) ) );
	$badges    = count( get_posts( array( 'post_type' => 'llms_my_achievement', 'post_author' => $uid, 'post_status' => 'publish', 'fields' => 'ids' ) ) );
	$student   = llms_get_student( $uid );

	$quizzes  = array();
	$enrolled = 0;
	$completed = 0;
	if ( $student ) {
		$quizzes      = $student->quizzes()->get_all();
		$enr          = $student->get_courses( array( 'limit' => 999 ) );
		$enrolled     = isset( $enr['results'] ) ? count( $enr['results'] ) : 0;
		$comp         = $student->get_completed_courses( array( 'limit' => 999 ) );
		$completed    = isset( $comp['results'] ) ? count( $comp['results'] ) : 0;
	}

	$passed = 0;
	if ( is_array( $quizzes ) || is_object( $quizzes ) ) {
		foreach ( $quizzes as $q ) {
			if ( is_object( $q ) && method_exists( $q, 'get_status' ) ) {
				if ( 'pass' === $q->get_status() ) {
					$passed++;
				}
			} elseif ( is_array( $q ) && isset( $q['status'] ) && 'pass' === $q['status'] ) {
				$passed++;
			}
		}
	}

	$blocks = array(
		array( 'XP', $xp ),
		array( 'Quizzes passed', $passed ),
		array( 'Courses in progress', max( 0, $enrolled - $completed ) ),
		array( 'Certificates', $certs ),
		array( 'Badges', $badges ),
	);
	?>
	<div class="w3d-learner-stats">
		<?php foreach ( $blocks as $b ) : ?>
			<div class="w3d-learner-stat">
				<span class="w3d-learner-stat-num"><?php echo esc_html( $b[1] ); ?></span>
				<span class="w3d-learner-stat-label"><?php echo esc_html( $b[0] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}
add_action( 'lifterlms_student_dashboard_header', 'w3d_learner_stats_panel', 5 );
add_action( 'lifterlms_after_my_account_navigation', 'w3d_learner_stats_panel', 1 );

/**
 * W3D Tutor — a zero-cost, curriculum-based study assistant.
 *
 * Matches student questions against a curated list of answers (no external
 * API), suggests next steps, and links straight into lessons, the glossary,
 * and the terminal. Rendered on every student-account page after navigation.
 */
function w3d_tutor_widget() {
	$uid = get_current_user_id();
	if ( ! $uid ) {
		return;
	}

	$home = home_url( '/' );
	$glossary = home_url( '/glossary/' );
	$terminal = home_url( '/terminal/' );
	$chains   = home_url( '/chains/' );

	$help = array(
		array(
			'keys'  => array( 'certificate', 'cert', 'degree', 'diploma' ),
			'answer' => 'You earn a free certificate by finishing a course and passing its final quiz. Each course is free — just start it, complete every lesson, take the quiz for a passing score (70%+), and the certificate is awarded to you automatically. You can print, download, or share it from your Student Account.',
			'links'  => array( array( 'Browse courses', $home . 'courses/' ) ),
		),
		array(
			'keys'  => array( 'terminal', 'data', 'score', 'scorecard', 'nakamoto' ),
			'answer' => 'The W3D Terminal is our live, interactive tool that audits 12 major blockchains across four pillars: infrastructure, capital, governance, and software. Every audit produces a composite decentralization score out of 100. It is completely free to explore during our beta.',
			'links'  => array( array( 'Open the Terminal', $terminal ), array( 'How we score', $glossary . 'nakamoto-coefficient/' ) ),
		),
		array(
			'keys'  => array( 'analyst', 'path', 'career', 'decentralization analyst' ),
			'answer' => 'The Certified Decentralization Analyst path builds on the beginner course with deeper coverage of consensus, governance, and on-chain metrics — including lessons that walk through real W3D Terminal audits for Bitcoin, Ethereum, and Solana. Finish it and you earn the Decentralization Analyst certificate.',
			'links'  => array( array( 'New analysts start here', $home . 'course/certified-decentralization-analyst/' ), array( 'See the course', $home . 'courses/' ) ),
		),
		array(
			'keys'  => array( 'bitcoin', 'btc' ),
			'answer' => 'Bitcoin is the most decentralized major blockchain: it leads our audits on capital and governance decentralization, with a composite score of 84.8/100. Why? No premine, no founder keys, a huge independent node network, and mining spread across thousands of operators.',
			'links'  => array( array( 'Bitcoin audit', $chains . 'btc/' ), array( 'What is Bitcoin?', $glossary . 'bitcoin/' ) ),
		),
		array(
			'keys'  => array( 'chains', 'scores', 'compare', 'ranking' ),
			'answer' => 'We score 12 blockchains. The current leaderboard is led by Bitcoin (84.8) and Ethereum (80.8), with DOT at 72.6 and ADA at 70.4. You can compare every chain on our /chains/ hub, or open the Terminal for live, interactive scorecards with npm-free data exports.',
			'links'  => array( array( 'All chain audits', $chains ), array( 'How decentralization is scored', $glossary . 'decentralization/' ) ),
		),
		array(
			'keys'  => array( 'start', 'begin', 'beginner', 'first', 'progress', 'where' ),
			'answer' => 'Great place to start: the Crypto Fundamentals from Zero course. It takes you from "what is money?" through wallets, Proof of Work vs Proof of Stake, and a hands-on lab where you explore Bitcoin in the Terminal yourself. It is free, takes about 2–3 hours, and ends with a certificate-qualifying quiz.',
			'links'  => array( array( 'Browse courses', $home . 'courses/' ), array( 'See lesson content', $home . 'course/crypto-fundamentals-from-zero/' ) ),
		),
		array(
			'keys'  => array( 'wallet', 'key', 'custody', 'safe' ),
			'answer' => 'Self-custody means you hold your own private keys. Nobody can freeze or seize your balance — but nobody can recover it for you either. Our guides walk through wallets, seed phrases, and safe habits. The short version: hardware wallet for anything significant, paper backup of your seed phrase, and never share it.',
			'links'  => array( array( 'Wallet guide', $glossary . 'wallet/' ), array( 'Seed phrase safety', $glossary . 'seed-phrase/' ), array( 'Self-custody', $glossary . 'self-custody/' ) ),
		),
		array(
			'keys'  => array( 'staking', 'proof of stake', 'earn', 'yield' ),
			'answer' => 'Staking is how Proof of Stake networks secure themselves: you lock up tokens to help validate blocks and earn rewards. Our staking lessons and glossary explain rewards, lockups, slashing risk, and why big exchange pools can concentrate power.',
			'links'  => array( array( 'Staking glossary', $glossary . 'staking/' ), array( 'Proof of Stake', $glossary . 'proof-of-stake/' ) ),
		),
		array(
			'keys'  => array( 'defi', 'decentralized finance', 'lend', 'dex' ),
			'answer' => 'DeFi rebuilds banking as smart contracts: lending, trading, and savings without a bank. The key ideas — liquidity pools, stablecoins, DEXs — are each covered in the glossary with short, plain-language pages.',
			'links'  => array( array( 'DeFi glossary', $glossary . 'defi/' ), array( 'DEX', $glossary . 'dex/' ), array( 'Stablecoins', $glossary . 'stablecoin/' ) ),
		),
	);

	$payload = array();
	foreach ( $help as $h ) {
		$payload[] = array(
			'keys'   => $h['keys'],
			'answer' => $h['answer'],
			'links'  => $h['links'],
		);
	}

	$suggestions = array(
		'How do I earn a certificate?',
		'What is the W3D Terminal?',
		'Where should I start?',
		'Why is Bitcoin the most decentralized?',
		'What does self-custody mean?',
	);
	?>
	<div id="w3d-tutor" class="w3d-tutor" data-answers="<?php echo esc_attr( wp_json_encode( $payload ) ); ?>">
		<div class="w3d-tutor-head">
			<span class="w3d-tutor-tag">W3D Tutor</span>
			<span class="w3d-tutor-sub">Your study assistant</span>
		</div>
		<div class="w3d-tutor-body">
			<div class="w3d-tutor-log" aria-live="polite"></div>
			<div class="w3d-tutor-chips">
				<?php foreach ( $suggestions as $s ) : ?>
					<button type="button" data-suggest="<?php echo esc_attr( $s ); ?>"><?php echo esc_html( $s ); ?></button>
				<?php endforeach; ?>
			</div>
			<form class="w3d-tutor-form" autocomplete="off">
				<label class="screen-reader-text" for="w3d-tutor-q">Ask a question</label>
				<input type="text" id="w3d-tutor-q" class="w3d-tutor-input" placeholder="Ask about certificates, the terminal, staking…" name="q">
				<button type="submit" class="w3d-tutor-send">Ask</button>
			</form>
		</div>
		<div class="w3d-tutor-foot">Curated from the W3D curriculum — links to lessons, glossary, and the Terminal.</div>
		<script>
		(function () {
			var root = document.getElementById('w3d-tutor');
			var log = root.querySelector('.w3d-tutor-log');
			var answers = [];
			try { answers = JSON.parse(root.getAttribute('data-answers')); } catch (e) {}
			function bubble(msg, q) {
				var div = document.createElement('div');
				div.className = 'w3d-tutor-msg ' + (q ? 'w3d-tutor-q' : 'w3d-tutor-a');
				div.innerHTML = q ? '<span></span>' + msg : msg;
				log.appendChild(div);
			}
			function match(q) {
				q = q.toLowerCase();
				var best = null, bestScore = 0;
				for (var i = 0; i < answers.length; i++) {
					var score = 0;
					for (var k = 0; k < answers[i].keys.length; k++) {
						if (q.indexOf(answers[i].keys[k]) !== -1) score += answers[i].keys[k].length;
					}
					if (score > bestScore) { bestScore = score; best = answers[i]; }
				}
				return best;
			}
			function ask(q) {
				bubble(q, true);
				var a = null, i = 0;
				for (i = 0; i < answers.length; i++) {
					if (q.toLowerCase().indexOf(answers[i].keys[0]) !== -1) { a = answers[i]; break; }
				}
				var m = a ? a : match(q);
				var html = m ? '<p>' + m.answer + '</p>' : '<p>I can’t answer that one yet — but your best bet is the glossary or the lessons:</p>';
				if (m && m.links.length) {
					html += '<div class="w3d-tutor-links">';
					for (var j = 0; j < m.links.length; j++) html += '<a href="' + m.links[j][1] + '">' + m.links[j][0] + '</a>';
					html += '</div>';
				} else if (!m) {
					html += '<div class="w3d-tutor-links"><a href="<?php echo esc_url( $glossary ); ?>">Open the glossary</a></div>';
				}
				bubble(html, false);
			}
			root.querySelector('.w3d-tutor-form').addEventListener('submit', function (e) {
				e.preventDefault();
				var input = root.querySelector('.w3d-tutor-input');
				var q = (input.value || '').trim();
				if (q.length > 2) { ask(q); input.value = ''; }
			});
			var chips = root.querySelectorAll('.w3d-tutor-chips button');
			for (var c = 0; c < chips.length; c++) {
				chips[c].addEventListener('click', function () { ask(this.getAttribute('data-suggest')); });
			}
		})();
		</script>
	</div>
	<?php
}
add_action( 'lifterlms_after_my_account_navigation', 'w3d_tutor_widget' );

/**
 * 404 intelligence: CSV logging + smart typo redirects.
 *
 * Called from the very top of 404.php (before any output) so a matched
 * typo can still issue a 301. Logging is append-only to
 * wp-content/uploads/404-log.csv; the visitor IP is stored only as a
 * salted SHA-256 hash. No DB reads beyond one slug list; no new tables.
 */
function w3d_404_log( $requested_url ) {
	$uploads = wp_upload_dir();
	$file    = trailingslashit( $uploads['basedir'] ) . '404-log.csv';
	$ip      = isset( $_SERVER['REMOTE_ADDR'] ) ? (string) $_SERVER['REMOTE_ADDR'] : '';
	$row     = array(
		gmdate( 'c' ),
		$requested_url,
		isset( $_SERVER['HTTP_REFERER'] ) ? (string) $_SERVER['HTTP_REFERER'] : '',
		isset( $_SERVER['HTTP_USER_AGENT'] ) ? (string) $_SERVER['HTTP_USER_AGENT'] : '',
		hash( 'sha256', $ip . AUTH_KEY ),
	);
	$needs_header = ! file_exists( $file );
	$fh           = fopen( $file, 'ab' );
	if ( ! $fh ) {
		return;
	}
	if ( flock( $fh, LOCK_EX ) ) {
		if ( $needs_header ) {
			fputcsv( $fh, array( 'timestamp', 'requested_url', 'referrer', 'user_agent', 'ip_hash' ) );
		}
		fputcsv( $fh, $row );
		flock( $fh, LOCK_UN );
	}
	fclose( $fh );
}

/**
 * Find the published slug closest to a mistyped 404 path.
 *
 * @return string Permalink URL or empty string.
 */
function w3d_404_smart_match( $path ) {
	$path = trim( $path, '/' );
	if ( '' === $path ) {
		return '';
	}
	$segments = explode( '/', $path );
	$needle   = end( $segments );
	if ( strlen( $needle ) < 4 ) {
		return '';
	}
	global $wpdb;
	$rows = $wpdb->get_results(
		"SELECT ID, post_name FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type IN ('post','page','lesson','course','chain','llms_glossary') AND post_name <> ''",
		ARRAY_A
	);
	if ( ! $rows ) {
		return '';
	}
	$best_id   = 0;
	$best_dist = 4; // accept distance <= 3
	foreach ( $rows as $row ) {
		if ( $row['post_name'] === $needle ) {
			continue; // exact slug exists; not a typo case
		}
		$dist = levenshtein( substr( $needle, 0, 200 ), substr( $row['post_name'], 0, 200 ) );
		if ( $dist >= 0 && $dist < $best_dist ) {
			$best_dist = $dist;
			$best_id   = (int) $row['ID'];
		}
	}
	if ( ! $best_id ) {
		return '';
	}
	$url = get_permalink( $best_id );
	if ( ! $url || untrailingslashit( $url ) === untrailingslashit( home_url( $path ) ) ) {
		return '';
	}
	return $url;
}

/**
 * Persist a smart-301 as a Rank Math redirection when the API is present.
 * Best-effort only: the header redirect is what guarantees behavior.
 */
function w3d_404_remember_redirect( $from_path, $to_url ) {
	try {
		if ( class_exists( 'RankMath\Redirection\Redirection' ) && method_exists( 'RankMath\Redirection\Redirection', 'add' ) ) {
			call_user_func(
				'RankMath\Redirection\Redirection::add',
				array(
					'sources'     => array( array( 'pattern' => ltrim( $from_path, '/' ), 'comparison' => 'exact' ) ),
					'url_to'      => $to_url,
					'header_code' => 301,
				)
			);
		}
	} catch ( \Throwable $e ) {
		// Header redirect still applies; persistence is a nice-to-have.
	}
}

/**
 * Entry point for 404.php. Logs the hit, then 301s on close typo matches.
 */
function w3d_404_intelligence() {
	$requested = home_url( add_query_arg( null, null ) );
	w3d_404_log( $requested );
	$path = trim( (string) wp_parse_url( $requested, PHP_URL_PATH ), '/' );
	$dest = w3d_404_smart_match( $path );
	if ( $dest ) {
		w3d_404_remember_redirect( '/' . $path, $dest );
		wp_redirect( $dest, 301 );
		exit;
	}
}

/**
 * Related-content blocks (Phase 2 interlinking).
 *
 * Appends precomputed related links (post meta set by w3d_p2_interlink.php):
 * lessons get 3 same-course lessons + 2 glossary terms; glossary terms get
 * a "Used in" lesson list. Runs after the glossary auto-linker (19) and the
 * course meta heading (21). Guards mirror the tutor-widget lesson: never
 * inside admin/REST/non-main queries.
 */
function w3d_rel_card( $kind, $post_id ) {
	if ( 'publish' !== get_post_status( $post_id ) ) {
		return '';
	}
	return '<div class="w3d-learn-card w3d-rel-card">'
		. '<p class="w3d-rel-kind">' . esc_html( $kind ) . '</p>'
		. '<h3><a href="' . esc_url( get_permalink( $post_id ) ) . '">' . esc_html( get_the_title( $post_id ) ) . '</a></h3>'
		. '</div>';
}

function w3d_related_blocks( $content ) {
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $content;
	}
	if ( ! is_singular() || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}
	$type = get_post_type();
	if ( ! in_array( $type, array( 'lesson', 'llms_glossary', 'chain' ), true ) ) {
		return $content;
	}
	$id    = get_the_ID();
	$cards = '';
	$extra = '';
	if ( 'lesson' === $type ) {
		$course_id = (int) get_post_meta( $id, '_llms_parent_course', true );
		if ( $course_id && 'publish' === get_post_status( $course_id ) ) {
			$cards .= w3d_rel_card( 'Course', $course_id );
		}
		$rel = get_post_meta( $id, '_w3d_related_lessons', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Lesson', (int) $rid );
			}
		}
		$rel = get_post_meta( $id, '_w3d_related_glossary', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Glossary', (int) $rid );
			}
		}
		$rel = get_post_meta( $id, '_w3d_related_chains', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Chain audit', (int) $rid );
			}
		}
		$heading = 'Keep learning';
		$label   = 'Related content';
	} elseif ( 'llms_glossary' === $type ) {
		$rel = get_post_meta( $id, '_w3d_used_in', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Lesson', (int) $rid );
			}
		}
		$rel = get_post_meta( $id, '_w3d_related_terms', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Glossary', (int) $rid );
			}
		}
		$rel = get_post_meta( $id, '_w3d_used_in_chains', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Chain audit', (int) $rid );
			}
		}
		$heading = 'Used in these lessons';
		$label   = 'Term usage';
		$extra  .= '<p class="w3d-rel-more"><a href="' . esc_url( home_url( '/glossary/' ) ) . '">'
			. esc_html__( 'Browse all glossary terms', 'w3d' )
			. '</a> · <a href="' . esc_url( home_url( '/learn/' ) ) . '">'
			. esc_html__( 'Start a free course', 'w3d' )
			. '</a></p>';
	} else {
		$extra .= '<p class="w3d-chain-study">Study the method behind this audit: '
			. '<a href="' . esc_url( home_url( '/methodology/' ) ) . '">Methodology</a> · '
			. '<a href="' . esc_url( home_url( '/lesson/os-pillar-infrastructure/' ) ) . '">Infrastructure</a> · '
			. '<a href="' . esc_url( home_url( '/lesson/os-pillar-capital/' ) ) . '">Capital</a> · '
			. '<a href="' . esc_url( home_url( '/lesson/os-pillar-governance/' ) ) . '">Governance</a> · '
			. '<a href="' . esc_url( home_url( '/lesson/os-pillar-software/' ) ) . '">Software</a></p>';
		$rel = get_post_meta( $id, '_w3d_chain_terms', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Glossary', (int) $rid );
			}
		}
		$rel = get_post_meta( $id, '_w3d_chain_lessons', true );
		if ( is_array( $rel ) ) {
			foreach ( $rel as $rid ) {
				$cards .= w3d_rel_card( 'Lesson', (int) $rid );
			}
		}
		$heading = 'Continue learning';
		$label   = 'Related chain content';
	}
	if ( '' === $cards && '' === $extra ) {
		return $content;
	}
	$out = $content;
	if ( '' !== $extra ) {
		$out .= $extra;
	}
	if ( '' !== $cards ) {
		$out .= '<aside class="w3d-related" aria-label="' . esc_attr( $label ) . '">'
			. '<h2>' . esc_html( $heading ) . '</h2>'
			. '<div class="w3d-learn-grid">' . $cards . '</div>'
			. '</aside>';
	}
	return $out;
}
add_filter( 'the_content', 'w3d_related_blocks', 30 );

/**
 * NotebookLM video-source block (Phase 4 prep).
 *
 * Appends a hidden, deterministic 3-bullet summary (hook / concept /
 * takeaway) to lesson and glossary pages — future feedstock for NotebookLM
 * Short Video Overviews. No AI, no API: first/middle/last sentences of the
 * post's own plain text.
 */
function w3d_notebooklm_sentences( $post_id ) {
	$text = wp_strip_all_tags( (string) get_post_field( 'post_content', $post_id ) );
	$text = trim( preg_replace( '/\s+/', ' ', $text ) );
	if ( '' === $text ) {
		return array( '', '', '' );
	}
	$parts = preg_split( '/(?<=[.!?])\s+(?=[A-Z0-9"\x{201C}])/u', $text );
	$parts = array_values( array_filter( array_map( 'trim', (array) $parts ), function ( $s ) {
		return mb_strlen( $s ) >= 40;
	} ) );
	if ( ! $parts ) {
		$short = mb_substr( $text, 0, 200 );
		return array( $short, $short, $short );
	}
	$n    = count( $parts );
	$hook = $parts[0];
	$core = $parts[ (int) floor( $n / 2 ) ];
	$take = $parts[ $n - 1 ];
	if ( mb_strlen( $take ) < 25 && $n > 1 ) {
		$take = $parts[ $n - 2 ];
	}
	return array( $hook, $core, $take );
}

function w3d_notebooklm_source( $content ) {
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $content;
	}
	if ( ! is_singular() || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}
	$type = get_post_type();
	if ( ! in_array( $type, array( 'lesson', 'llms_glossary' ), true ) ) {
		return $content;
	}
	if ( false !== strpos( $content, 'id="notebooklm-source"' ) ) {
		return $content;
	}
	list( $hook, $core, $take ) = w3d_notebooklm_sentences( get_the_ID() );
	if ( '' === $hook ) {
		return $content;
	}
	return $content
		. '<div id="notebooklm-source" hidden aria-hidden="true">'
		. '<ul>'
		. '<li><strong>HOOK:</strong> ' . esc_html( $hook ) . '</li>'
		. '<li><strong>CORE CONCEPT:</strong> ' . esc_html( $core ) . '</li>'
		. '<li><strong>TAKEAWAY:</strong> ' . esc_html( $take ) . '</li>'
		. '</ul>'
		. '</div>';
}
add_filter( 'the_content', 'w3d_notebooklm_source', 31 );

/**
 * VideoObject placeholder schema on lesson pages for the coming
 * NotebookLM 60-second explainers.
 */
function w3d_lesson_video_jsonld( $data ) {
	if ( ! is_singular( 'lesson' ) ) {
		return $data;
	}
	$data[] = array(
		'@type'       => 'VideoObject',
		'name'        => get_the_title() . ' - 60s Explainer Coming Soon',
		'description' => 'Short video version for NotebookLM',
	);
	return $data;
}
add_filter( 'rank_math/json_ld', 'w3d_lesson_video_jsonld', 25 );

/**
 * Table of contents for lessons: anchors every H2/H3 and prepends a jump nav.
 * Runs before the related blocks (28 < 30) so the TOC covers content only.
 */
function w3d_lesson_toc( $content ) {
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $content;
	}
	if ( ! is_singular( 'lesson' ) || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}
	if ( false !== strpos( $content, 'w3d-toc' ) ) {
		return $content;
	}
	$counter = 0;
	$items   = array();
	$content = preg_replace_callback(
		'#<(h[23])([^>]*)>(.*?)</\1>#si',
		function ( $m ) use ( &$counter, &$items ) {
			$text = trim( wp_strip_all_tags( $m[3] ) );
			if ( '' === $text ) {
				return $m[0];
			}
			$counter++;
			$slug = sanitize_title( $text );
			if ( '' === $slug ) {
				$slug = 'section';
			}
			$id = 'w3d-toc-' . $slug . '-' . $counter;
			$items[] = array( 'level' => strtolower( $m[1] ), 'id' => $id, 'text' => $text );
			$attrs = $m[2];
			if ( preg_match( '/\sid="[^"]*"/i', $attrs ) ) {
				$attrs = preg_replace( '/\sid="[^"]*"/i', ' id="' . esc_attr( $id ) . '"', $attrs );
			} else {
				$attrs .= ' id="' . esc_attr( $id ) . '"';
			}
			return '<' . $m[1] . $attrs . '>' . $m[3] . '</' . $m[1] . '>';
		},
		$content
	);
	if ( count( $items ) < 2 ) {
		return $content;
	}
	$toc = '<nav class="w3d-toc" aria-label="On this page"><p class="w3d-toc-title">On this page</p><ul>';
	foreach ( $items as $it ) {
		$toc .= '<li class="w3d-toc-' . esc_attr( $it['level'] ) . '"><a href="#' . esc_attr( $it['id'] ) . '">' . esc_html( $it['text'] ) . '</a></li>';
	}
	$toc .= '</ul></nav>';
	return $toc . $content;
}
add_filter( 'the_content', 'w3d_lesson_toc', 28 );

/**
 * FAQ JSON-LD for glossary terms, derived deterministically from the term's
 * own content (no new claims): definition + relevance + closing guidance.
 */
function w3d_glossary_faq_jsonld( $data ) {
	if ( ! is_singular( 'llms_glossary' ) ) {
		return $data;
	}
	$post = get_post();
	if ( ! $post ) {
		return $data;
	}
	foreach ( (array) $data as $node ) {
		if ( isset( $node['@type'] ) && in_array( 'FAQPage', (array) $node['@type'], true ) ) {
			return $data;
		}
	}
	$text = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( $post->post_content ) ) );
	if ( '' === $text ) {
		return $data;
	}
	$title = get_the_title();
	$split = preg_split( '/(?<=[.!?])\s+(?=[A-Z0-9"\x{201C}])/u', $text );
	$split = array_values( array_filter( array_map( 'trim', (array) $split ), function ( $s ) {
		return mb_strlen( $s ) >= 40 && stripos( $s, 'Related terms' ) === false;
	} ) );
	if ( count( $split ) < 3 ) {
		return $data;
	}
	$n = count( $split );
	$data[] = array(
		'@type'      => 'FAQPage',
		'mainEntity' => array(
			array(
				'@type'          => 'Question',
				'name'           => 'What is ' . $title . '?',
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => mb_substr( $split[0], 0, 300 ) ),
			),
			array(
				'@type'          => 'Question',
				'name'           => 'Why does ' . $title . ' matter?',
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => mb_substr( $split[ (int) floor( $n / 2 ) ], 0, 300 ) ),
			),
			array(
				'@type'          => 'Question',
				'name'           => 'What should beginners know about ' . $title . '?',
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => mb_substr( end( $split ), 0, 300 ) ),
			),
		),
	);
	return $data;
}
add_filter( 'rank_math/json_ld', 'w3d_glossary_faq_jsonld', 26 );
