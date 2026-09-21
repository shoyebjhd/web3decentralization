<?php
/**
 * Single template for the "glossary" custom post type.
 *
 * Some terms store their body in an ACF field instead of post_content.
 * This template always renders: definition box + full content + FAQ +
 * related cards. Never render blank.
 *
 * @package w3d
 */

get_header();

while ( have_posts() ) :
	the_post();

				$w3d_band_markup = '<div class="w3d-archive-band" aria-hidden="true"><div class="w3d-archive-band-inner"></div></div>';
				$content_html = (string) get_the_content();

	$acf_def = get_field( 'definition' );
	if ( empty( $acf_def ) ) {
		$acf_def = get_field( 'w3d_glossary_content' );
	}
	if ( empty( $acf_def ) ) {
		$acf_def = get_field( 'content' );
	}
	$acf_def = (string) $acf_def;

	$acf_faq = get_field( 'faq' );

	$def_source = trim( wp_strip_all_tags( $content_html ) );
	if ( '' === $def_source ) {
		$def_source = trim( wp_strip_all_tags( $acf_def ) );
	}
	$def_source = (string) preg_replace( '/\s+/u', ' ', $def_source );

	$def_lead = '';
	$def_rest = '';
	if ( '' !== $def_source ) {
		$words    = preg_split( '/\s+/u', $def_source );
		if ( count( $words ) > 100 ) {
			$def_lead = implode( ' ', array_slice( $words, 0, 100 ) );
			$def_rest = implode( ' ', array_slice( $words, 100 ) );
		} else {
			$def_lead = $def_source;
		}
	}
	?>
	<header class="w3d-single-hero">
		<div class="w3d-hero-inner">
			<div class="w3d-hero-main">
				<?php w3d_breadcrumbs(); ?>
				<header class="glossary-term-head">
					<h1 class="glossary-term-title"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="glossary-term-deck"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</header>
			</div>
		</div>
	</header>

	<div class="w3d-wrap glossary-single-wrap">
		<article <?php post_class( 'w3d-glossary-single' ); ?> id="post-<?php the_ID(); ?>">
			<nav class="glossary-back">
				<a href="<?php echo esc_url( home_url( '/glossary/' ) ); ?>">&larr; Back to the glossary</a>
			</nav>

			<?php if ( '' !== $def_lead ) : ?>
				<div class="w3d-glossary-definition">
					<p><strong><?php echo esc_html( $def_lead ); ?></strong>
					<?php if ( '' !== $def_rest ) : ?>
						<span><?php echo esc_html( $def_rest ); ?></span>
					<?php endif; ?>
					</p>
				</div>
			<?php endif; ?>

			<div class="glossary-term-body w3d-content">
				<?php
				if ( trim( wp_strip_all_tags( $content_html ) ) !== '' ) {
					the_content();
				} elseif ( '' !== trim( $acf_def ) ) {
					echo wpautop( $acf_def ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ACF field may hold trusted HTML.
				}
				?>
			</div>

			<?php if ( is_array( $acf_faq ) && ! empty( $acf_faq ) ) : ?>
				<section class="w3d-faq">
					<h2><?php esc_html_e( 'Frequently asked questions', 'w3d' ); ?></h2>
					<?php foreach ( $acf_faq as $faq_item ) : ?>
						<?php
						$faq_item = (array) $faq_item;
						$q        = isset( $faq_item['question'] ) ? (string) $faq_item['question'] : '';
						$a        = isset( $faq_item['answer'] ) ? (string) $faq_item['answer'] : '';
						if ( '' === $q && '' === $a ) {
							continue;
						}
						?>
						<div class="schema-faq-section">
							<h3 class="schema-faq-question"><?php echo esc_html( $q ); ?></h3>
							<div class="schema-faq-answer"><?php echo wp_kses_post( wpautop( $a ) ); ?></div>
						</div>
					<?php endforeach; ?>
				</section>
			<?php endif; ?>
		</article>
	</div>
<?php endwhile; ?>

<?php
get_footer();