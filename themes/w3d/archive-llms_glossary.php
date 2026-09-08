<?php
/**
 * Archive template for the "glossary" CPT — the /glossary/ A-Z index.
 *
 * @package w3d
 */

get_header();

$terms = get_posts( array(
	'post_type'      => 'llms_glossary',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'        => 'title',
	'order'          => 'ASC',
) );

$by_letter = array();
foreach ( $terms as $term ) {
	$letter = mb_strtoupper( mb_substr( $term->post_title, 0, 1 ) );
	if ( ! preg_match( '/[A-Z]/', $letter ) ) {
		$letter = '#';
	}
	$by_letter[ $letter ][] = $term;
}

$letters = array_keys( $by_letter );
natsort( $letters );
?>

<div class="w3d-wrap glossary-hub">
	<?php w3d_breadcrumbs(); ?>
	<header class="glossary-hub-head">
		<p class="w3d-sec-label"><?php esc_html_e( 'Crypto & Web3 Academy', 'w3d' ); ?></p>
		<h1 class="glossary-hub-title"><?php esc_html_e( 'Crypto & Web3 Glossary', 'w3d' ); ?></h1>
		<p class="w3d-sec-sub"><?php esc_html_e( 'Plain-language definitions of the coins, protocols, and concepts behind every W3D lesson, audit, and article. Terms are linked automatically throughout the site.', 'w3d' ); ?></p>
	</header>

	<?php if ( $by_letter ) : ?>
		<nav class="glossary-az" aria-label="Glossary alphabet">
			<?php foreach ( $letters as $letter ) : ?>
				<a href="#g-<?php echo esc_attr( strtolower( $letter ) ); ?>"><?php echo esc_html( $letter ); ?></a>
			<?php endforeach; ?>
		</nav>

		<div class="glossary-letters">
			<?php foreach ( $letters as $letter ) : ?>
				<section id="g-<?php echo esc_attr( strtolower( $letter ) ); ?>" class="glossary-letter">
					<h2 class="glossary-letter-title"><?php echo esc_html( $letter ); ?></h2>
					<ul class="glossary-letter-list">
						<?php foreach ( $by_letter[ $letter ] as $term ) : ?>
							<li>
								<a href="<?php echo esc_url( get_permalink( $term->ID ) ); ?>">
									<span class="glossary-term"><?php echo esc_html( $term->post_title ); ?></span>
									<?php if ( $term->post_excerpt ) : ?>
										<span class="glossary-gloss"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( $term->post_excerpt ), 22 ) ); ?></span>
									<?php endif; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</section>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		<p class="chains-empty"><?php esc_html_e( 'No glossary terms published yet.', 'w3d' ); ?></p>
	<?php endif; ?>
</div>

<?php
get_footer();