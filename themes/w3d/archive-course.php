<?php
/**
 * LLMS course archive — clean, a11y-friendly course grid.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap">

	<?php w3d_breadcrumbs(); ?>

	<header class="w3d-page-head">
		<h1 class="w3d-page-title"><?php esc_html_e( 'All Courses — Learn Web3 for Free', 'w3d' ); ?></h1>
		<div class="w3d-sec-sub"><?php esc_html_e( 'Structured courses on Bitcoin, blockchains, DeFi and Web3 — lessons, quizzes and live terminal labs. No signup, no paywall.', 'w3d' ); ?></div>
	</header>

	<?php if ( have_posts() ) : ?>

		<ul class="w3d-course-grid">
			<?php
			while ( have_posts() ) :
				the_post();

				$course   = function_exists( 'llms_get_course' ) ? llms_get_course( get_the_ID() ) : null;
				$lessons  = $course ? count( (array) $course->get_lessons( 'publish' ) ) : 0;
				$duration = $course ? (string) $course->get_estimated_duration() : '';

				$excerpt = wp_strip_all_tags( get_the_excerpt() );
				if ( '' === $excerpt ) {
					$raw      = wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) );
					$excerpt  = wp_trim_words( $raw, 28 );
				}
				?>
				<li class="w3d-course-card" id="course-<?php the_ID(); ?>">

					<a class="w3d-course-card-img" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'large', array( 'loading' => 'lazy', 'alt' => 'Illustration for ' . esc_attr( get_the_title() ) ) );
						} else {
							echo '<img src="' . esc_url( w3d_logo_src() ) . '" alt="" loading="lazy">';
						}
						?>
					</a>

					<div class="w3d-course-body">
						<h2 class="w3d-course-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<?php if ( $excerpt ) : ?>
							<p class="w3d-course-excerpt"><?php echo esc_html( $excerpt ); ?></p>
						<?php endif; ?>

						<ul class="w3d-course-meta">
							<?php if ( $lessons ) : ?>
								<li><?php echo esc_html( number_format_i18n( $lessons ) ); ?> lessons</li>
							<?php endif; ?>
							<?php if ( $duration ) : ?>
								<li>~<?php echo esc_html( $duration ); ?></li>
							<?php endif; ?>
							<li>Free</li>
						</ul>

						<p class="w3d-course-cta">
							<a class="w3d-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Start this course', 'w3d' ); ?></a>
						</p>
					</div>

				</li>
			<?php endwhile; ?>
		</ul>

		<?php
		$links = paginate_links( array(
			'mid_size'  => 1,
			'prev_text' => '&larr; Newer',
			'next_text' => 'Older &rarr;',
			'type'      => 'array',
		) );
		if ( $links ) :
			?>
			<nav class="w3d-pagination" aria-label="<?php esc_attr_e( 'Courses', 'w3d' ); ?>">
				<div class="nav-links"><?php echo implode( '', $links ); // phpcs:ignore ?></div>
			</nav>
		<?php endif; ?>

	<?php else : ?>
		<p class="w3d-no-results"><?php esc_html_e( 'No courses found. New courses are on the way.', 'w3d' ); ?></p>
	<?php endif; ?>

</div>

<?php
get_footer();