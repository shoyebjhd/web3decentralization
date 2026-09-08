<?php
/**
 * Single page template (also renders the static front page).
 *
 * @package w3d
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<?php if ( is_front_page() ) : ?>

		<div class="w3d-page-full">
			<?php the_content(); ?>
		</div>

	<?php else : ?>

		<div class="w3d-wrap">
			<?php w3d_breadcrumbs(); ?>
			<header class="w3d-page-head">
				<h1 class="w3d-page-title"><?php the_title(); ?></h1>
			</header>
			<div class="w3d-content entry-content">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endif; ?>

<?php endwhile; ?>

<?php
get_footer();