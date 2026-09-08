<?php
/**
 * Single template for the "glossary" custom post type.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap glossary-single-wrap">
	<?php
		w3d_breadcrumbs();
	while ( have_posts() ) :
		the_post();
		?>
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

			<div class="glossary-term-body w3d-content">
				<?php the_content(); ?>
			</div>

			<?php
			$peer_posts = get_posts( array(
				'post_type'      => 'llms_glossary',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
				'orderby'        => 'rand',
				'exclude'        => array( get_the_ID() ),
			) );
			if ( $peer_posts ) :
				?>
				<nav class="glossary-related" aria-label="Related glossary terms">
					<h2><?php esc_html_e( 'Keep exploring', 'w3d' ); ?></h2>
					<ul>
						<?php foreach ( $peer_posts as $peer ) : ?>
							<li><a href="<?php echo esc_url( get_permalink( $peer->ID ) ); ?>"><?php echo esc_html( $peer->post_title ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();