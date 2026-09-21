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

	<div class="chains-hub-intro">
		<p><?php esc_html_e( 'This hub answers one question: how many entities does it take to control a blockchain? Every network below is audited against the same four pillars, using only public, verifiable data — node counts, entity and operator breakdowns, stake and token distribution, proposer and validator influence. Each card shows the chain symbol, its current total score, and a score bar so you can compare networks at a glance.', 'w3d' ); ?></p>
		<p><?php esc_html_e( 'Scores are maintained by The W3D Team and update as chains change: validator sets grow, staking pools consolidate, governance votes redistribute. Because output depends on methodology, every submission is documented — what data was sampled, at what snapshot, and how each pillar was weighted — so any score can be audited, debated, or rebuilt by anyone who disagrees.', 'w3d' ); ?></p>
		<p><strong><?php esc_html_e( 'The four pillars:', 'w3d' ); ?></strong></p>
		<div class="chains-hub-pillars">
			<span><?php esc_html_e( 'Infrastructure — node & operator reach', 'w3d' ); ?></span>
			<span><?php esc_html_e( 'Capital — stake/hash concentration', 'w3d' ); ?></span>
			<span><?php esc_html_e( 'Governance — proposer & vote control', 'w3d' ); ?></span>
			<span><?php esc_html_e( 'Software — client diversity & teams', 'w3d' ); ?></span>
		</div>
		<p><?php esc_html_e( 'Start here:', 'w3d' ); ?><?php esc_html_e( 'New to decentralization? Read the ', 'w3d' ); ?><a href="<?php echo esc_url( home_url( '/glossary/nakamoto-coefficient/' ) ); ?>"><?php esc_html_e( 'Nakamoto Coefficient explainer', 'w3d' ); ?></a><?php esc_html_e( ' first — the number of entities that would have to collude to censor a network. Then compare consensus models in ', 'w3d' ); ?><a href="<?php echo esc_url( home_url( '/proof-of-stake-vs-proof-of-work/' ) ); ?>"><?php esc_html_e( 'Proof of Stake vs Proof of Work', 'w3d' ); ?></a><?php esc_html_e( ', or pull any chain&rsquo;s pillar data yourself in the ', 'w3d' ); ?><a href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>"><?php esc_html_e( 'live terminal', 'w3d' ); ?></a><?php esc_html_e( '. For the full picture across networks, see ', 'w3d' ); ?><a href="<?php echo esc_url( home_url( '/top-layer-1-blockchains-compared/' ) ); ?>"><?php esc_html_e( 'Top Layer-1 Blockchains Compared', 'w3d' ); ?></a><?php esc_html_e( '.', 'w3d' ); ?></p>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="w3d-archive-band" aria-hidden="true">
			<div class="w3d-archive-band-inner"></div>
		</div>

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
				<span class="chains-card-id"><img class="chains-card-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/logos/chain-' . get_post_field( 'post_name' ) . '.svg?v=orange' ); ?>" alt="" width="32" height="32" loading="lazy" decoding="async"><span class="chains-card-name"><?php echo esc_html( $name ); ?></span></span>
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