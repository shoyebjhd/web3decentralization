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
	<header class="w3d-single-hero">
		<div class="w3d-hero-inner">
			<div class="w3d-hero-main">
				<?php w3d_breadcrumbs(); ?>
				<img class="w3d-tool-icon" src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/tool-' . get_post_field( 'post_name', get_the_ID() ) . '.svg?v=rebrand2' ); ?>" alt="" width="48" height="48" decoding="async" loading="eager">
				<p class="w3d-sec-label"><?php esc_html_e( 'W3D Terminal Tool', 'w3d' ); ?></p>
				<h1 class="w3d-post-title"><?php the_title(); ?></h1>
			</div>
		</div>
	</header>

	<div class="w3d-wrap w3d-single-body">
		<div class="w3d-content entry-content">
			<?php
			$tool_body = get_the_content();
			if ( '' !== trim( wp_strip_all_tags( $tool_body ) ) ) {
				the_content();
			} else {
				$tool_acf = get_field( 'w3d_tool_content' );
				if ( empty( $tool_acf ) ) {
					$tool_acf = get_field( 'content' );
				}
				if ( ! empty( $tool_acf ) ) {
					echo wpautop( $tool_acf ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ACF field may hold trusted HTML.
				}
			}
			?>
		</div>

		<p class="w3d-tool-more">
			<a class="w3d-btn w3d-btn-alt" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>"><?php esc_html_e( 'Open all 15 tools in the terminal', 'w3d' ); ?></a>
		</p>
	</div>

<?php endwhile; ?>

<?php
get_footer();
