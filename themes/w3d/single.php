<?php
/**
 * Single post template (reviews, guides, explainers).
 *
 * @package w3d
 */

get_header();

while ( have_posts() ) :
	the_post();

	$cats = get_the_category();
	?>
	<div class="w3d-wrap">
		<?php w3d_breadcrumbs(); ?>
		<header class="w3d-post-head">
			<?php if ( ! empty( $cats ) ) : ?>
				<div class="w3d-post-cats">
					<a class="w3d-card-cat" href="<?php echo esc_url( get_category_link( $cats[0] ) ); ?>"><?php echo esc_html( $cats[0]->name ); ?></a>
				</div>
			<?php endif; ?>

			<h1 class="w3d-post-title"><?php the_title(); ?></h1>

			<p class="w3d-post-meta-top">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">By <?php the_author(); ?></a>
				&middot; <?php echo esc_html( get_the_date() ); ?>
				<?php if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) : ?>
					&middot; Updated <time datetime="<?php echo esc_attr( get_the_modified_time( 'c' ) ); ?>"><?php echo esc_html( get_the_modified_date() ); ?></time>
				<?php endif; ?>
			</p>
		</header>

		<div class="w3d-content entry-content">
			<?php the_content(); ?>
			<?php w3d_lesson_nav(); ?>
		</div>
	</div>

<?php endwhile; ?>

<?php
get_footer();