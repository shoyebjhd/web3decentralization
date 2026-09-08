<?php
/**
 * Generic archive (categories: Exchanges, Guides, Web3, DeFi).
 *
 * @package w3d
 */

get_header();

$title       = get_the_archive_title();
$description = get_the_archive_description();
?>

<div class="w3d-wrap">

	<?php w3d_breadcrumbs(); ?>

	<header class="w3d-page-head">
		<h1 class="w3d-page-title"><?php echo wp_strip_all_tags( $title ); // phpcs:ignore ?></h1>
		<?php if ( $description ) : ?>
			<div class="w3d-sec-sub"><?php echo wp_strip_all_tags( $description ); // phpcs:ignore ?></div>
		<?php endif; ?>
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

					<p class="w3d-post-meta">
						<?php esc_html_e( 'Written by', 'w3d' ); ?>
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a>
						&middot; <?php echo esc_html( get_the_date() ); ?>
					</p>

					<?php if ( has_excerpt() ) : ?>
						<p class="w3d-post-excerpt"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
					<?php else : ?>
						<p class="w3d-post-excerpt"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_content() ), 30 ) ); ?></p>
					<?php endif; ?>

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
			<nav class="w3d-pagination" aria-label="<?php esc_attr_e( 'Posts', 'w3d' ); ?>">
				<div class="nav-links"><?php echo implode( '', $links ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			</nav>
		<?php endif; ?>

	<?php else : ?>
		<p class="w3d-no-results"><?php esc_html_e( 'No posts found in this archive.', 'w3d' ); ?></p>
	<?php endif; ?>

</div>

<?php
get_footer();