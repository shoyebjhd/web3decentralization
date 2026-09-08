<?php
/**
 * Search results.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap">

	<?php w3d_breadcrumbs(); ?>
	<header class="w3d-page-head">
		<h1 class="w3d-page-title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search results for: %s', 'w3d' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>

		<div class="w3d-posts">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'w3d-post-card' ); ?> id="post-<?php the_ID(); ?>">
					<?php
					$cats = get_the_category();
					if ( ! empty( $cats ) ) :
						?>
						<span class="w3d-card-cat"><?php echo esc_html( $cats[0]->name ); ?></span>
					<?php endif; ?>
					<h2 class="w3d-post-card-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
					<p class="w3d-post-meta"><?php echo esc_html( get_the_date() ); ?></p>
				</article>
			<?php endwhile; ?>
		</div>

		<?php
		$links = paginate_links( array(
			'mid_size'  => 1,
			'prev_text' => '&larr; Newer',
			'next_text' => 'Older &rarr;',
			'type'      => 'array',
		) );
		if ( $links ) :
			?>
			<nav class="w3d-pagination" aria-label="<?php esc_attr_e( 'Search results', 'w3d' ); ?>">
				<div class="nav-links"><?php echo implode( '', $links ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			</nav>
		<?php endif; ?>

	<?php else : ?>
		<p class="w3d-no-results"><?php esc_html_e( 'Nothing found. Try a different search.', 'w3d' ); ?></p>
	<?php endif; ?>

</div>

<?php
get_footer();