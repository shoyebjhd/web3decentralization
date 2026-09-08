<?php
/**
 * Single template for the "chain" custom post type.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap chain-wrap">
	<?php
		w3d_breadcrumbs();
	while ( have_posts() ) :
		the_post();

		$symbol  = get_field( 'symbol' );
		$name    = get_field( 'name' ) ? get_field( 'name' ) : get_the_title();
		$total   = get_field( 'score_total' );
		$infra   = get_field( 'score_infrastructure' );
		$capital = get_field( 'score_capital' );
		$gov     = get_field( 'score_governance' );
		$soft    = get_field( 'score_software' );
		$updated = get_field( 'last_updated' );
		$summary = get_field( 'summary' );

		$grade = 'D';
		$s     = (float) $total;
		if ( $s >= 88 ) {
			$grade = 'S';
		} elseif ( $s >= 75 ) {
			$grade = 'A';
		} elseif ( $s >= 60 ) {
			$grade = 'B';
		} elseif ( $s >= 45 ) {
			$grade = 'C';
		}
		?>
		<article <?php post_class( 'w3d-chain-single' ); ?> id="post-<?php the_ID(); ?>">

			<header class="chain-dash-head">
				<div class="chain-title-row">
					<div class="chain-title-main">
						<?php if ( $symbol ) : ?>
							<span class="chain-ticker"><?php echo esc_html( $symbol ); ?></span>
						<?php endif; ?>
						<h1 class="chain-name"><?php echo esc_html( $name ); ?></h1>
					</div>
					<div class="chain-total">
						<span class="chain-total-score"><?php echo esc_html( $total ); ?></span>
						<span class="chain-total-label"><?php esc_html_e( 'Composite / 100', 'w3d' ); ?></span>
						<span class="chain-grade"><?php echo esc_html( sprintf( 'Grade %s', $grade ) ); ?></span>
					</div>
				</div>

				<?php if ( $updated ) : ?>
					<div class="chain-updated"><?php echo esc_html( sprintf( 'Data updated: %s', $updated ) ); ?></div>
				<?php endif; ?>

				<?php if ( $summary ) : ?>
					<p class="chain-summary"><?php echo esc_html( $summary ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $infra || '' !== $capital || '' !== $gov || '' !== $soft ) : ?>
					<div class="chain-pillars">
						<?php
						$pillars = array(
							array( 'Infrastructure', $infra, 30 ),
							array( 'Capital', $capital, 25 ),
							array( 'Governance', $gov, 25 ),
							array( 'Software', $soft, 20 ),
						);
						foreach ( $pillars as $p ) :
							if ( '' === $p[1] || null === $p[1] ) {
								continue;
							}
							?>
							<div class="chain-pillar">
								<div class="pillar-top">
									<span class="pillar-name"><?php echo esc_html( $p[0] ); ?> <small>(<?php echo esc_html( $p[2] ); ?>%)</small></span>
									<span class="pillar-score"><?php echo esc_html( $p[1] ); ?></span>
								</div>
								<div class="pillar-track"><i style="width:<?php echo esc_attr( (float) $p[1] ); ?>%"></i></div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</header>

			<div class="chain-body w3d-content">
				<?php the_content(); ?>
			</div>

			<div class="chain-tool-cta">
				<div class="wp-block-buttons">
					<div class="wp-block-button">
						<a class="wp-block-button__link" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>"><?php esc_html_e( 'Open the W3D Terminal', 'w3d' ); ?></a>
					</div>
					<div class="wp-block-button is-style-outline">
						<a class="wp-block-button__link" href="<?php echo esc_url( home_url( '/chains/' ) ); ?>"><?php esc_html_e( 'All chain audits', 'w3d' ); ?></a>
					</div>
				</div>
			</div>

		</article>

	<?php endwhile; ?>
</div>

<?php
get_footer();