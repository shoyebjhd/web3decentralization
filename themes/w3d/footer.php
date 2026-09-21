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
$w3d_trending_limit = 8;
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
			<ul class="w3d-foot-pills w3d-pills-extra" id="w3d-trending-pills">
				<?php foreach ( $w3d_trending as $i => $t ) : ?>
					<li class="<?php echo $i >= $w3d_trending_limit ? 'w3d-pills-hidden' : ''; // phpcs:ignore WordPress.Security.EscapeOutput ?>"><a href="<?php echo esc_url( home_url( $t[0] ) ); ?>"><?php echo esc_html( $t[1] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php if ( count( $w3d_trending ) > $w3d_trending_limit ) : ?>
				<button type="button" class="w3d-pills-more" aria-expanded="false" aria-controls="w3d-trending-pills">
					<span class="w3d-pills-more-label"><?php esc_html_e( 'Show 12 more trending topics', 'w3d' ); ?></span>
				</button>
			<?php endif; ?>
		</nav>

		<a class="w3d-footer-fork" href="https://github.com/Web3Decentralization/academy" target="_blank" rel="noopener">
			<svg class="w3d-footer-github-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
				<path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
			</svg>
			<?php esc_html_e( 'Built on GitHub', 'w3d' ); ?>
		</a>

		<p class="w3d-footer-disclaimer">
			Independent educational research by The W3D Team &mdash; not financial or investment advice. Nothing on this site
			constitutes a recommendation to buy, sell, or hold any digital asset. Some outbound links are affiliate links;
			they never affect the price you pay or our ratings. Scores follow the published
			<a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>">methodology</a> and can be reproduced live in the
			<a href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">W3D Terminal</a>.
		</p>

		<div class="w3d-footer-copy">
			<span class="w3d-footer-copy-left">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Web3 Decentralization</span>
			<nav class="w3d-footer-legal" aria-label="<?php esc_attr_e( 'Legal', 'w3d' ); ?>">
				<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'w3d' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'w3d' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>"><?php esc_html_e( 'Methodology', 'w3d' ); ?></a>
			</nav>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>