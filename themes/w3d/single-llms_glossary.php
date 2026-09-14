<?php
/**
 * Single template for the "glossary" custom post type.
 *
 * @package w3d
 */

get_header();

while ( have_posts() ) :
	the_post();

	$def_text = trim( wp_strip_all_tags( get_the_content() ) );
	$def_text = (string) preg_replace( '/\s+/u', ' ', $def_text );
	$words    = preg_split( '/\s+/u', $def_text );
	$def_lead = '';
	$def_rest = '';
	if ( count( $words ) > 100 ) {
		$def_lead = implode( ' ', array_slice( $words, 0, 100 ) );
		$def_rest = implode( ' ', array_slice( $words, 100 ) );
	}
	?>
	<div class="w3d-wrap glossary-single-wrap">
		<?php w3d_breadcrumbs(); ?>
		<article <?php post_class( 'w3d-glossary-single' ); ?> id="post-<?php the_ID(); ?>">
			<nav class="glossary-back">
				<a href="<?php echo esc_url( home_url( '/glossary/' ) ); ?>">&larr; Back to the glossary</a>
			</nav>

			<header class="glossary-term-head">
				<h1 class="glossary-term-title"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="glossary-term-deck"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</header>

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
				<?php the_content(); ?>
			</div>
		</article>
	</div>
<?php endwhile; ?>

<?php
get_footer();