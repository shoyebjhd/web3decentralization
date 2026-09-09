<?php
/**
 * Archive template for the "chain" custom post type — the /chains/ hub.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap chains-hub">
	<?php w3d_breadcrumbs(); ?>
	<header class="chains-hub-head">
		<p class="w3d-sec-label"><?php esc_html_e( 'Decentralization Scores', 'w3d' ); ?></p>
		<h1 class="chains-hub-title"><?php esc_html_e( 'How Decentralized Are the Top Blockchains?', 'w3d' ); ?></h1>
		<p class="w3d-sec-sub"><?php esc_html_e( 'Live, methodology-first decentralization audits across four pillars: infrastructure, capital, governance, and software. Scores are maintained by The W3D Team.', 'w3d' ); ?> <a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>"><?php esc_html_e( 'Read the methodology', 'w3d' ); ?></a></p>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="chains-grid">
			<?php
			while ( have_posts() ) :
				the_post();

				$total = get_field( 'score_total' );
				$name  = get_field( 'name' ) ? get_field( 'name' ) : get_the_title();
				$sym   = get_field( 'symbol' );
				?>
			<a class="chains-card" href="<?php the_permalink(); ?>">
				<div class="chains-card-top">
					<span class="chains-card-name"><?php echo esc_html( $name ); ?></span>
					<?php if ( '' !== $total && null !== $total ) : ?>
						<span class="chains-card-score"><?php esc_html_e( 'Scored:', 'w3d' ); ?> <?php echo esc_html( $total ); ?></span>
					<?php else : ?>
						<span class="chains-card-score chains-card-pending"><?php esc_html_e( 'Preliminary', 'w3d' ); ?></span>
					<?php endif; ?>
				</div>
					<div class="chains-card-bar"><i style="width:<?php echo esc_attr( (float) $total ); ?>%"></i></div>
					<?php if ( $sym ) : ?>
						<span class="chains-card-sym"><?php echo esc_html( $sym ); ?></span>
					<?php endif; ?>
				</a>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<p class="chains-empty"><?php esc_html_e( 'No chains published yet.', 'w3d' ); ?></p>
	<?php endif; ?>
</div>

<?php
get_footer();