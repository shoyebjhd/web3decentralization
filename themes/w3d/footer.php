<?php
/**
 * Theme footer.
 *
 * @package w3d
 */
?>
<?php
/**
 * Footer pills: scale down below-the-fold DOM. Full 20 trending pills only
 * on the home page; singles/excerpts get 8. Top glossary stays at 8 on every
 * page so the heavyweight footer stays lean (DOM budget <1200 on all singles).
 */
$w3d_home = is_front_page();

$w3d_glossary = array(
	array( '/glossary/bitcoin/', 'Bitcoin' ),
	array( '/glossary/ethereum/', 'Ethereum' ),
	array( '/glossary/defi/', 'DeFi' ),
	array( '/glossary/staking/', 'Staking' ),
	array( '/glossary/wallet/', 'Wallet' ),
	array( '/glossary/blockchain/', 'Blockchain' ),
	array( '/glossary/smart-contract/', 'Smart Contract' ),
	array( '/glossary/layer-2/', 'Layer 2' ),
	array( '/glossary/rollup/', 'Rollup' ),
	array( '/glossary/nakamoto-coefficient/', 'Nakamoto Coefficient' ),
);

$w3d_trending = array(
	array( '/terminal/tools/nakamoto-coefficient/', 'Nakamoto Calculator' ),
	array( '/glossary/eip-4844/', 'EIP-4844' ),
	array( '/glossary/paymaster/', 'Paymaster' ),
	array( '/glossary/bundler/', 'Bundler' ),
	array( '/glossary/op-stack/', 'OP Stack' ),
	array( '/glossary/depin/', 'DePIN' ),
	array( '/glossary/restaking/', 'Restaking' ),
	array( '/glossary/blobs/', 'Blobs' ),
	array( '/glossary/session-keys/', 'Session Keys' ),
	array( '/chains/base/', 'Base Chain' ),
	array( '/glossary/superchain/', 'Superchain' ),
	array( '/glossary/shared-sequencing/', 'Shared Sequencing' ),
	array( '/glossary/erc-4337/', 'ERC-4337' ),
	array( '/glossary/intent-based/', 'Intent-Based' ),
	array( '/glossary/nakamoto-coefficient/', 'Nakamoto Coefficient' ),
	array( '/glossary/l2beat/', 'L2Beat' ),
	array( '/glossary/lrt-token/', 'LRT Token' ),
	array( '/chains/blast/', 'Blast Chain' ),
	array( '/glossary/mev-boost/', 'MEV Boost' ),
	array( '/glossary/data-availability-sampling/', 'DA Sampling' ),
);

$w3d_trending = $w3d_home ? $w3d_trending : array_slice( $w3d_trending, 0, 8 );
$w3d_glossary = array_slice( $w3d_glossary, 0, 8 );
?>
</main><!-- #w3d-main -->

<footer class="w3d-footer" id="colophon">
	<div class="w3d-wrap">

		<div class="w3d-footer-top">
			<div class="w3d-footer-brand">
				<?php echo w3d_logo_markup( false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<span class="w3d-site-name">Web3 Decentralization</span>
				<p>Independent decentralization scores, exchange reviews, and beginner Web3 guides. No hype, no pump-talk.</p>
			</div>

			<nav class="w3d-footer-nav" aria-label="<?php esc_attr_e( 'Footer', 'w3d' ); ?>">
				<p class="w3d-footer-title"><?php esc_html_e( 'Explore', 'w3d' ); ?></p>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
					<li><a href="<?php echo esc_url( home_url( '/learn/' ) ); ?>">Learn</a></li>
					<li><a href="<?php echo esc_url( home_url( '/chains/' ) ); ?>">Chain Audits</a></li>
					<li><a href="<?php echo esc_url( home_url( '/best-crypto-exchanges-2026/' ) ); ?>">Best Exchanges</a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About The W3D Team</a></li>
					<li><a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>">Methodology</a></li>
					<li><a href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">W3D Terminal</a></li>
				</ul>
			</nav>

			<nav class="w3d-footer-gloss" aria-label="<?php esc_attr_e( 'Top glossary terms', 'w3d' ); ?>">
				<p class="w3d-footer-title"><?php esc_html_e( 'Top glossary', 'w3d' ); ?></p>
				<ul class="w3d-foot-pills">
					<?php foreach ( $w3d_glossary as $g ) : ?>
						<li><a href="<?php echo esc_url( home_url( $g[0] ) ); ?>"><?php echo esc_html( $g[1] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="w3d-footer-cta">
				<p class="w3d-footer-title"><?php esc_html_e( 'Learn Web3', 'w3d' ); ?></p>
				<p class="w3d-footer-cta-text">Start with a free course or explore the live terminal. No account, no paywall.</p>
				<a class="w3d-btn-hero w3d-btn-primary w3d-footer-btn" href="<?php echo esc_url( home_url( '/learn/' ) ); ?>">Start here</a>
				<a class="w3d-btn-hero w3d-btn-outline w3d-footer-btn" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">Run the Terminal</a>
			</div>
		</div>

		<nav class="w3d-footer-trending" aria-label="<?php esc_attr_e( 'Trending topics', 'w3d' ); ?>">
			<p class="w3d-footer-title"><?php esc_html_e( 'Trending topics', 'w3d' ); ?></p>
			<ul class="w3d-foot-pills">
				<?php foreach ( $w3d_trending as $t ) : ?>
					<li><a href="<?php echo esc_url( home_url( $t[0] ) ); ?>"><?php echo esc_html( $t[1] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<a class="w3d-footer-fork" href="https://github.com/Web3Decentralization/academy" target="_blank" rel="noopener"><?php esc_html_e( 'Fork on GitHub', 'w3d' ); ?></a>

		<p class="w3d-footer-disclaimer">
			Independent educational research by The W3D Team &mdash; not financial or investment advice. Nothing on this site
			constitutes a recommendation to buy, sell, or hold any digital asset. Some outbound links are affiliate links;
			they never affect the price you pay or our ratings. Scores follow the published
			<a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>">methodology</a> and can be reproduced live in the
			<a href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">W3D Terminal</a>.
		</p>

		<div class="w3d-footer-copy">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Web3 Decentralization</span>
			<span>Independent research estimate based on public data.</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>