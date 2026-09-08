<?php
/**
 * Template Name: Learn Hub
 *
 * /learn/ — curated gateway: learning paths, free courses, tools.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap">
	<?php w3d_breadcrumbs(); ?>
	<header class="w3d-page-head w3d-learn-hero">
		<h1 class="w3d-page-title">Learn Web3 &amp; Crypto</h1>
		<p>Free, no-signup courses and guided paths that take you from zero to decoding real on-chain data — the same methodology the <a href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">W3D Terminal</a> uses to grade blockchains.</p>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php $body = trim( wp_strip_all_tags( get_the_content() ) ); ?>
		<?php if ( $body ) : ?>
			<div class="w3d-content entry-content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>

	<section class="w3d-learn-paths">
		<h2>Pick a path</h2>
		<div class="w3d-learn-grid">
			<div class="w3d-learn-card">
				<h3>Beginner Path</h3>
				<p>Understand money, Bitcoin, blockchains, smart contracts and DeFi — in plain English, no math.</p>
				<a class="w3d-btn" href="<?php echo esc_url( home_url( '/learning-path/beginners/' ) ); ?>">Start here</a>
			</div>
			<div class="w3d-learn-card">
				<h3>Analyst Path</h3>
				<p>Learn the W3D four-pillar methodology, the Nakamoto Coefficient and how to read stress tests like a pro.</p>
				<a class="w3d-btn" href="<?php echo esc_url( home_url( '/learning-path/analyst/' ) ); ?>">Go analyst</a>
			</div>
		</div>
	</section>

	<section class="w3d-learn-courses">
		<h2>Free courses</h2>
		<div class="w3d-learn-grid">
			<?php
			$courses = get_posts(
				array(
					'post_type'      => 'course',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
					'orderby'        => 'ID',
					'order'          => 'ASC',
				)
			);
			foreach ( $courses as $course_post ) :
				$course          = new LLMS_Course( $course_post->ID );
				$lesson_count    = $course ? count( $course->get_lessons( 'posts' ) ) : 0;
				$course_excerpt  = wp_trim_words( wp_strip_all_tags( $course_post->post_content ), 28, ' …' );
				?>
				<div class="w3d-learn-card w3d-course-card">
					<h3><?php echo esc_html( $course_post->post_title ); ?></h3>
					<p><?php echo esc_html( $course_excerpt ); ?></p>
					<div class="w3d-learn-meta"><?php echo (int) $lesson_count; ?> lessons &middot; free &middot; certificate</div>
					<a class="w3d-btn w3d-btn-alt" href="<?php echo esc_url( get_permalink( $course_post->ID ) ); ?>">Start the course</a>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="w3d-learn-tools">
		<h2>Hands-on tools</h2>
		<div class="w3d-learn-grid">
			<div class="w3d-learn-card">
				<h3>W3D Terminal</h3>
				<p>Live decentralization audits for 8 blockchains, stress tests, and side-by-side comparisons.</p>
				<a class="w3d-btn" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">Open the terminal</a>
			</div>
			<div class="w3d-learn-card">
				<h3>Glossary</h3>
				<p>Every term explained — blocks, nodes, forks, stablecoins, rollups and more.</p>
				<a class="w3d-btn" href="<?php echo esc_url( home_url( '/glossary/' ) ); ?>">Browse the glossary</a>
			</div>
		</div>
	</section>
</div>

<?php
get_footer();