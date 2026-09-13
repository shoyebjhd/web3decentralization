<?php
/**
 * Theme footer.
 *
 * @package w3d
 */
?>
</main><!-- #w3d-main -->

<footer class="w3d-footer" id="colophon">
	<div class="w3d-wrap">
		<div class="w3d-footer-top">
			<div class="w3d-footer-brand">
				<?php echo w3d_logo_markup( true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<p>Independent decentralization scores, exchange reviews, and beginner Web3 guides. No hype, no pump-talk.</p>
			</div>
		<nav class="w3d-footer-nav" aria-label="<?php esc_attr_e( 'Footer', 'w3d' ); ?>">
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				<li><a href="<?php echo esc_url( home_url( '/chains/' ) ); ?>">Chain Audits</a></li>
				<li><a href="<?php echo esc_url( home_url( '/best-crypto-exchanges-2026/' ) ); ?>">Best Exchanges</a></li>
				<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About The W3D Team</a></li>
				<li><a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>">Methodology</a></li>
				<li><a href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">W3D Terminal</a></li>
			</ul>
		</nav>
		<nav class="w3d-footer-nav w3d-footer-gloss" aria-label="<?php esc_attr_e( 'Top glossary terms', 'w3d' ); ?>">
			<p class="w3d-footer-gloss-title"><?php esc_html_e( 'Top glossary', 'w3d' ); ?></p>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/glossary/bitcoin/' ) ); ?>">Bitcoin</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/ethereum/' ) ); ?>">Ethereum</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/defi/' ) ); ?>">DeFi</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/staking/' ) ); ?>">Staking</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/wallet/' ) ); ?>">Wallet</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/blockchain/' ) ); ?>">Blockchain</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/smart-contract/' ) ); ?>">Smart Contract</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/layer-2/' ) ); ?>">Layer 2</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/rollup/' ) ); ?>">Rollup</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/nakamoto-coefficient/' ) ); ?>">Nakamoto Coefficient</a></li>
			</ul>
		</nav>
		<nav class="w3d-footer-nav w3d-footer-trending" aria-label="<?php esc_attr_e( 'Trending topics', 'w3d' ); ?>">
			<p class="w3d-footer-gloss-title"><?php esc_html_e( 'Trending topics', 'w3d' ); ?></p>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/terminal/tools/nakamoto-coefficient/' ) ); ?>">Nakamoto Calculator</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/eip-4844/' ) ); ?>">EIP-4844</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/paymaster/' ) ); ?>">Paymaster</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/bundler/' ) ); ?>">Bundler</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/op-stack/' ) ); ?>">OP Stack</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/depin/' ) ); ?>">DePIN</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/restaking/' ) ); ?>">Restaking</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/blobs/' ) ); ?>">Blobs</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/session-keys/' ) ); ?>">Session Keys</a></li>
				<li><a href="<?php echo esc_url( home_url( '/chains/base/' ) ); ?>">Base Chain</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/superchain/' ) ); ?>">Superchain</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/shared-sequencing/' ) ); ?>">Shared Sequencing</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/erc-4337/' ) ); ?>">ERC-4337</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/intent-based/' ) ); ?>">Intent-Based</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/nakamoto-coefficient/' ) ); ?>">Nakamoto Coefficient</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/l2beat/' ) ); ?>">L2Beat</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/lrt-token/' ) ); ?>">LRT Token</a></li>
				<li><a href="<?php echo esc_url( home_url( '/chains/blast/' ) ); ?>">Blast Chain</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/mev-boost/' ) ); ?>">MEV Boost</a></li>
				<li><a href="<?php echo esc_url( home_url( '/glossary/data-availability-sampling/' ) ); ?>">DA Sampling</a></li>
			</ul>
		</nav>
		</div>

		<p class="w3d-footer-fork"><a href="https://github.com/Web3Decentralization/academy" target="_blank" rel="noopener"><?php esc_html_e( 'Fork on GitHub', 'w3d' ); ?></a> &mdash; <?php esc_html_e( 'the entire academy is MIT licensed.', 'w3d' ); ?></p>

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