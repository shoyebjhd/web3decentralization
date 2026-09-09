<?php
/**
 * 404 template — dark Web3 "Chain Not Found" hub.
 *
 * Intelligence (CSV log + smart typo 301) runs first, before any output.
 *
 * @package w3d
 */

if ( function_exists( 'w3d_404_intelligence' ) ) {
	w3d_404_intelligence();
}

get_header();

$popular_lessons = get_posts(
	array(
		'post_type'      => 'lesson',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'orderby'        => 'rand',
	)
);
$top_glossary = get_posts(
	array(
		'post_type'      => 'llms_glossary',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'orderby'        => 'rand',
	)
);
$chains = array(
	array( 'Ethereum', home_url( '/chains/eth/' ) ),
	array( 'Bitcoin', home_url( '/chains/btc/' ) ),
	array( 'Solana', home_url( '/chains/sol/' ) ),
	array( 'Cardano', home_url( '/chains/ada/' ) ),
);
?>

<div class="w3d-wrap">
	<section class="w3d-404">
		<p class="w3d-sec-label"><?php esc_html_e( 'Error 404', 'w3d' ); ?></p>
		<h1><?php esc_html_e( "Chain Not Found (404) - Let's Decentralize Your Path", 'w3d' ); ?></h1>
		<p>
			<?php esc_html_e( 'This block does not exist on our chain. Search the academy, or pick up one of these paths instead — every step is free.', 'w3d' ); ?>
		</p>

		<?php get_search_form(); ?>

		<div class="w3d-learn-grid">
			<div class="w3d-learn-card">
				<h2><?php esc_html_e( 'Popular lessons', 'w3d' ); ?></h2>
				<ul>
					<?php foreach ( $popular_lessons as $lesson_post ) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $lesson_post->ID ) ); ?>"><?php echo esc_html( $lesson_post->post_title ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="w3d-learn-card">
				<h2><?php esc_html_e( 'Top glossary', 'w3d' ); ?></h2>
				<ul>
					<?php foreach ( $top_glossary as $term ) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $term->ID ) ); ?>"><?php echo esc_html( $term->post_title ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="w3d-learn-card">
				<h2><?php esc_html_e( 'Explore chains', 'w3d' ); ?></h2>
				<ul>
					<?php foreach ( $chains as $chain ) : ?>
						<li><a href="<?php echo esc_url( $chain[1] ); ?>"><?php echo esc_html( $chain[0] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<p class="w3d-404-cta">
			<a class="w3d-btn w3d-btn-cta" href="<?php echo esc_url( home_url( '/learn/' ) ); ?>"><?php esc_html_e( 'Go to Learning Hub', 'w3d' ); ?></a>
		</p>
		<p class="w3d-404-note"><?php esc_html_e( 'Logged for open-source improvement.', 'w3d' ); ?></p>
	</section>
</div>

<?php
get_footer();
