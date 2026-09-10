<?php
/**
 * Single template for the "w3d_tool" custom post type.
 *
 * @package w3d
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<div class="w3d-wrap">
		<?php w3d_breadcrumbs(); ?>
		<header class="w3d-post-head">
			<p class="w3d-sec-label"><?php esc_html_e( 'W3D Terminal Tool', 'w3d' ); ?></p>
			<h1 class="w3d-post-title"><?php the_title(); ?></h1>
		</header>

		<div class="w3d-content entry-content">
			<?php the_content(); ?>
		</div>

		<p class="w3d-tool-more">
			<a class="w3d-btn w3d-btn-alt" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>"><?php esc_html_e( 'Open all 15 tools in the terminal', 'w3d' ); ?></a>
		</p>
	</div>

<?php endwhile; ?>

<?php
get_footer();
