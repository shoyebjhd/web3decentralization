<?php
/**
 * Template Name: Learning Path
 *
 * /learning-path/beginners/ and /learning-path/analyst/ — guided, ordered
 * lesson plans built from the free LifterLMS courses.
 *
 * @package w3d
 */

get_header();

$slug  = (string) get_post_field( 'post_name', get_the_ID() );
$paths = array(
	'beginners' => array(
		'course_id' => 320,
		'label'     => 'Beginner Path',
		'tagline'   => 'Seven short lessons plus a hands-on network lab. No math, no jargon — just how money, Bitcoin, blockchains, smart contracts, DeFi, safety and decentralization actually work.',
		'goal'      => 'Finish with a Crypto Fundamentals certificate and the vocabulary to read any blockchain explainer.',
	),
	'analyst'    => array(
		'course_id' => 349,
		'label'     => 'Analyst Path',
		'tagline'   => 'The W3D methodology in seven lessons: four pillars, the Nakamoto Coefficient, censorship resistance, and three terminal labs that make you read real data.',
		'goal'      => 'Finish with a Certified Decentralization Analyst certificate and the skill to audit a chain yourself.',
	),
);

$path = isset( $paths[ $slug ] ) ? $paths[ $slug ] : null;
?>

<div class="w3d-wrap">
	<?php w3d_breadcrumbs(); ?>
	<header class="w3d-page-head w3d-path-hero">
		<?php if ( $path ) : ?>
			<span class="w3d-path-kicker"><?php echo esc_html( $path['label'] ); ?></span>
		<?php endif; ?>
		<h1 class="w3d-page-title"><?php the_title(); ?></h1>
		<p><?php echo $path ? esc_html( $path['tagline'] ) : ''; ?></p>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php $body = trim( wp_strip_all_tags( get_the_content() ) ); ?>
		<?php if ( $body ) : ?>
			<div class="w3d-content entry-content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>

	<?php if ( $path ) : ?>
		<?php
		$course_post  = get_post( $path['course_id'] );
		$course       = new LLMS_Course( $path['course_id'] );
		$lessons      = $course->get_lessons( 'posts' );
		$lesson_count = count( $lessons );
		?>
		<div class="w3d-path-goal">
			<p><strong>Goal:</strong> <?php echo esc_html( $path['goal'] ); ?></p>
		</div>

		<section class="w3d-path-plan">
			<h2>The plan</h2>
			<ol class="w3d-path-lessons">
				<?php foreach ( $lessons as $index => $lesson ) : ?>
					<?php
					$is_lab = 0 === strpos( strtoupper( wp_strip_all_tags( $lesson->post_title ) ), 'LAB' );
					?>
					<li class="<?php echo $is_lab ? 'w3d-path-lab' : ''; ?>">
						<span class="w3d-path-step"><?php echo (int) ( $index + 1 ); ?></span>
						<div class="w3d-path-lesson-body">
							<a href="<?php echo esc_url( get_permalink( $lesson->ID ) ); ?>"><?php echo esc_html( $lesson->post_title ); ?></a>
							<?php if ( $is_lab ) : ?>
								<span class="w3d-path-tag">lab</span>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
			<div class="w3d-path-cta">
				<p>
					<?php
					$count = $lesson_count > 0 ? $lesson_count : 'many';
					printf( esc_html( 'Each step is free. %1$s lessons, about 2–3 hours, certificate at the end.' ), esc_html( $count ) );
					?>
				</p>
				<a class="w3d-btn w3d-btn-cta" href="<?php echo esc_url( get_permalink( $path['course_id'] ) ); ?>">Start the course</a>
			</div>
		</section>

		<?php if ( $course_post ) : ?>
			<?php
			$course_blurb = trim( wp_strip_all_tags( $course_post->post_content ) );
			if ( '' === $course_blurb ) {
				$course_blurb = $path['tagline'];
			}
			?>
			<section class="w3d-path-course">
				<h2>The course</h2>
				<p><?php echo esc_html( wp_trim_words( $course_blurb, 32, ' …' ) ); ?></p>
				<a href="<?php echo esc_url( get_permalink( $path['course_id'] ) ); ?>">View the full course page</a>
			</section>
		<?php endif; ?>
	<?php endif; ?>
</div>

<?php
get_footer();