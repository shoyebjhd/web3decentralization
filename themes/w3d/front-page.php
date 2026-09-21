<?php
get_header();

$chain_type         = post_type_exists( 'chain' ) ? 'chain' : ( post_type_exists( 'w3d_chain' ) ? 'w3d_chain' : '' );

$chain_counts       = $chain_type ? wp_count_posts( $chain_type ) : null;
$chain_total        = ( $chain_counts && isset( $chain_counts->publish ) ) ? (int) $chain_counts->publish : 0;
$tool_counts        = wp_count_posts( 'w3d_tool' );
$tool_total         = ( $tool_counts && isset( $tool_counts->publish ) ) ? (int) $tool_counts->publish : 0;
$lesson_counts      = wp_count_posts( 'lesson' );
$lesson_total       = ( $lesson_counts && isset( $lesson_counts->publish ) ) ? (int) $lesson_counts->publish : 0;
$post_counts        = wp_count_posts( 'post' );
$post_total         = ( $post_counts && isset( $post_counts->publish ) ) ? (int) $post_counts->publish : 0;
$guide_total        = $lesson_total + $post_total;
$audited_total      = 0;
$prelim_total       = 0;

if ( $chain_type ) {
	$audited = get_posts( array(
		'post_type'      => $chain_type,
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'meta_key'       => 'score_total',
		'meta_value'     => '0',
		'meta_compare'   => '>',
		'fields'         => 'ids',
		'no_found_rows'  => true,
	) );
	$audited_total = is_array( $audited ) ? count( $audited ) : 0;
	$prelim_total  = max( 0, $chain_total - $audited_total );
}

$chain_type = $chain_type ?: 'chain';

$top_chains = new WP_Query( array(
	'post_type'      => $chain_type,
	'posts_per_page' => 8,
	'meta_key'       => 'score_total',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
) );

$topics = array(
	array(
		'slug'  => 'web3',
		'label' => 'Web3 & Decentralization',
		'desc'  => 'What decentralization really is, wallets, dApps, and the tech behind the next web.',
		'href'  => home_url( '/category/web3/' ),
		'icon'  => 'globe',
	),
	array(
		'slug'  => 'defi',
		'label' => 'DeFi & Yield',
		'desc'  => 'Lending, staking, and yield strategies on decentralized finance platforms.',
		'href'  => home_url( '/category/defi/' ),
		'icon'  => 'coins',
	),
	array(
		'slug'  => 'guides',
		'label' => 'Step-by-Step Guides',
		'desc'  => 'Buying, staking, and trading made simple — written for absolute beginners.',
		'href'  => home_url( '/category/guides/' ),
		'icon'  => 'book',
	),
	array(
		'slug'  => 'exchanges',
		'label' => 'Exchange Reviews',
		'desc'  => 'Independent reviews of the top centralized exchanges — fees, security, and who to pick.',
		'href'  => home_url( '/category/exchanges/' ),
		'icon'  => 'swap',
	),
);

$starts = array(
	array( 'cat' => 'Buy',    'href' => home_url( '/how-to-buy-bitcoin/' ),           'title' => 'How to Buy Bitcoin',                     'desc' => 'The exact steps from your bank account to your first BTC.',          'icon' => 'bag' ),
	array( 'cat' => 'Trade',  'href' => home_url( '/crypto-trading-for-beginners/' ),  'title' => 'Crypto Trading for Beginners',           'desc' => 'Spot vs. futures, your first exchange, and a plan.',                 'icon' => 'chart' ),
	array( 'cat' => 'Store',  'href' => home_url( '/best-crypto-wallets/' ),           'title' => 'Best Crypto Wallets',                     'desc' => 'Hardware vs. hot wallets and the "not your keys" rule.',             'icon' => 'wallet' ),
	array( 'cat' => 'Earn',   'href' => home_url( '/best-defi-platforms-for-beginners/' ), 'title' => 'Best DeFi Platforms for Beginners', 'desc' => 'Swaps, lending, and staking without the jargon.',                     'icon' => 'piggy' ),
	array( 'cat' => 'Compare','href' => home_url( '/best-crypto-exchanges-2026/' ),    'title' => 'Best Crypto Exchanges 2026',              'desc' => 'Independent ratings of the platforms people actually use.',          'icon' => 'scale' ),
	array( 'cat' => 'Understand', 'href' => home_url( '/what-is-web3-decentralization/' ), 'title' => 'What Is Web3 Decentralization?', 'desc' => 'The one idea everything else in this niche builds on.',            'icon' => 'spark' ),
);

$latest = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
) );

function w3d_front_icon( $name ) {
	$icons = array(
		'globe'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
		'coins'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18M7 6h1v4"/></svg>',
		'book'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
		'swap'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>',
		'bag'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
		'chart'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
		'wallet' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><path d="M18 12a2 2 0 0 0 0 4h4v-4z"/></svg>',
		'piggy'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2V5z"/><path d="M2 9v1c0 1.1.9 2 2 2h1"/><circle cx="16" cy="8" r="1"/></svg>',
		'scale'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 3v17M5 7h14M7 7l-3.5 7a3.5 3.5 0 0 0 7 0L7 7zM17 7l-3.5 7a3.5 3.5 0 0 0 7 0L17 7zM8 21h8"/></svg>',
		'spark'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/><path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8z"/></svg>',
		'chains' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>',
		'tools'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
		'lesson' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
		'pillar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="12" y1="3" x2="12" y2="21"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="12" cy="19" r="2"/></svg>',
	);
	$svg = isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['globe'];
	return $svg;
}

function w3d_front_stat( $icon, $num, $label, $sub, $data_count = null ) {
	$count = $data_count ? ' data-count="' . esc_attr( $data_count ) . '"' : '';
	echo '<div class="w3d-stat-card"><span class="w3d-stat-ico">' . w3d_front_icon( $icon ) . '</span><span class="w3d-stat-num"' . $count . '>' . esc_html( $num ) . '</span><span class="w3d-stat-lab">' . esc_html( $label ) . '</span><span class="w3d-stat-sub">' . esc_html( $sub ) . '</span></div>';
}
?>

<div class="w3d-page-full">

	<section class="w3d-hero w3d-hero--center alignfull" aria-labelledby="w3d-hero-title">
		<span class="w3d-hero-mesh" aria-hidden="true"></span>
		<div class="w3d-wrap w3d-hero-inner">
			<p class="w3d-hero-badge">Free, open-source crypto education — no hype, no paywall</p>
			<h1 id="w3d-hero-title"><span class="accent">Learn Web3.</span> Measure Decentralization. Build with Confidence.</h1>
			<p class="w3d-sub">Independent decentralization scores for <?php echo esc_html( $chain_total ); ?> blockchains, honest exchange reviews, and beginner-friendly Web3 guides — no hype, no pump-talk.</p>

			<div class="w3d-ctas">
				<a class="w3d-btn-hero w3d-btn-primary" href="<?php echo esc_url( home_url( '/learn/' ) ); ?>">Start Here</a>
				<a class="w3d-btn-hero w3d-btn-outline" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">Run W3D Terminal</a>
			</div>

			<div class="w3d-stats">
				<?php
				w3d_front_stat( 'chains', $chain_total, 'Chains Scored', $audited_total . ' audited + ' . $prelim_total . ' preliminary', $chain_total );
				w3d_front_stat( 'tools', $tool_total, 'Open-Source Tools', 'MIT licensed', $tool_total );
				w3d_front_stat( 'lesson', $guide_total . '+', 'Guides & Lessons', $lesson_total . ' lessons + ' . $post_total . ' reviews', $guide_total );
				w3d_front_stat( 'pillar', '4-Pillar', 'Decentralization Model', 'infra 30 / capital 25 / gov 25 / software 20' );
				?>
			</div>
		</div>
	</section>

	<section class="w3d-section w3d-section-chains w3d-reveal" aria-labelledby="w3d-chains-title">
		<div class="w3d-wrap">
			<p class="w3d-sec-label">Live Data</p>
			<h2 id="w3d-chains-title">How Decentralized Are the Top Blockchains?</h2>
			<p class="w3d-sec-sub">Nakamoto Coefficient and a four-pillar model — infrastructure, capital, governance, and software — scored from live network data in the W3D Terminal.</p>

			<div class="w3d-chains w3d-chains-bento">
				<?php if ( $top_chains->have_posts() ) : ?>
					<?php
					$w3d_bento_i = 0;
					while ( $top_chains->have_posts() ) : $top_chains->the_post();
						$score  = (float) get_post_meta( get_the_ID(), 'score_total', true );
						$detail = wp_strip_all_tags( get_the_excerpt() );
						if ( '' === $detail ) { $detail = 'View the full audit'; }
						if ( 0 === $w3d_bento_i ) : ?>
							<div class="w3d-chain-feature w3d-reveal">
								<a href="<?php the_permalink(); ?>">
									<span class="w3d-feat-label">Decentralization Score</span>
									<div class="w3d-feat-ring" role="img" aria-label="<?php
										/* translators: %s: decentralization score */
										printf( esc_attr__( '%1$s decentralization score: %2$s of 100', 'w3d' ), esc_html( get_the_title() ), esc_html( number_format( $score, $score == (int) $score ? 0 : 1 ) ) );
									?>">
										<svg viewBox="0 0 120 120" aria-hidden="true" focusable="false">
											<circle class="w3d-feat-ring-track" cx="60" cy="60" r="52"></circle>
											<circle class="w3d-feat-ring-bar" cx="60" cy="60" r="52" stroke-dasharray="326.7" stroke-dashoffset="<?php echo esc_attr( 326.7 - ( 326.7 * max( 0, min( 100, $score ) ) / 100 ) ); ?>"></circle>
										</svg>
										<span class="w3d-feat-ring-num"><?php echo esc_html( number_format( $score, $score == (int) $score ? 0 : 1 ) ); ?></span>
									</div>
									<span class="w3d-feat-name"><?php the_title(); ?></span>
									<span class="w3d-feat-sub"><?php echo esc_html( wp_trim_words( $detail, 7 ) ); ?> →</span>
								</a>
							</div>
						<?php else : ?>
							<div class="w3d-chain w3d-chain-mini w3d-reveal">
								<a href="<?php the_permalink(); ?>">
									<div class="w3d-top"><span class="w3d-name"><?php the_title(); ?></span><span class="w3d-score"><?php echo esc_html( number_format( $score, $score == (int) $score ? 0 : 1 ) ); ?></span></div>
									<div class="w3d-bar"><i style="width:<?php echo esc_attr( max( 0, min( 100, $score ) ) ); ?>%"></i></div>
								</a>
							</div>
						<?php endif; ?>
						<?php
						$w3d_bento_i++;
						if ( 4 === $w3d_bento_i ) { break; }
					endwhile;
					?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>

			<p class="w3d-chain-more"><a href="<?php echo esc_url( home_url( '/chains/' ) ); ?>">See all <?php echo esc_html( $chain_total ); ?> chain audits →</a></p>
		</div>
	</section>

	<section class="w3d-section w3d-reveal" aria-labelledby="w3d-start-title">
		<div class="w3d-wrap">
			<p class="w3d-sec-label">Start Here</p>
			<h2 id="w3d-start-title">New to Crypto? Start With These</h2>

			<div class="w3d-cards w3d-cards-start">
				<?php foreach ( $starts as $i => $card ) : ?>
					<a class="w3d-card w3d-card-link w3d-reveal<?php echo 0 === $i ? ' w3d-card-start-feat' : ( 1 === $i ? ' w3d-card-start-sub' : '' ); ?>" href="<?php echo esc_url( $card['href'] ); ?>">
						<span class="w3d-card-ico" aria-hidden="true"><?php echo w3d_front_icon( $card['icon'] ); ?></span>
						<span class="w3d-card-cat"><?php echo esc_html( $card['cat'] ); ?></span>
						<span class="w3d-card-title"><?php echo esc_html( $card['title'] ); ?></span>
						<span class="w3d-card-desc"><?php echo esc_html( $card['desc'] ); ?></span>
						<span class="w3d-card-go">Learn more <span aria-hidden="true">→</span></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="w3d-section w3d-reveal" aria-labelledby="w3d-topic-title">
		<div class="w3d-wrap">
			<p class="w3d-sec-label">Explore by Topic</p>
			<h2 id="w3d-topic-title">Jump Straight Into a Topic</h2>

			<div class="w3d-cards w3d-cards-topics">
				<?php foreach ( $topics as $topic ) : ?>
					<?php
					$term = get_category_by_slug( $topic['slug'] );
					$count = $term ? (int) $term->count : 0;
					?>
					<a class="w3d-card w3d-card-link w3d-reveal" href="<?php echo esc_url( $topic['href'] ); ?>">
						<span class="w3d-card-ico" aria-hidden="true"><?php echo w3d_front_icon( $topic['icon'] ); ?></span>
						<span class="w3d-card-cat"><?php echo esc_html( $count ); ?> guides</span>
						<span class="w3d-card-title"><?php echo esc_html( $topic['label'] ); ?></span>
						<span class="w3d-card-desc"><?php echo esc_html( $topic['desc'] ); ?></span>
						<span class="w3d-card-go">Browse the topic <span aria-hidden="true">→</span></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="w3d-section w3d-reveal" aria-labelledby="w3d-guides-title">
		<div class="w3d-wrap">
			<p class="w3d-sec-label">Latest Writing</p>
			<h2 id="w3d-guides-title">Guides, Reviews &amp; Web3 Education</h2>

			<div class="w3d-guide-row">
				<?php if ( $latest->have_posts() ) : ?>
					<?php while ( $latest->have_posts() ) : ?>
						<?php $latest->the_post(); ?>
						<article class="w3d-guide-card w3d-reveal">
							<a href="<?php the_permalink(); ?>" class="w3d-guide-link">
								<span class="w3d-card-ico" aria-hidden="true"><?php echo w3d_front_icon( 'book' ); ?></span>
								<span class="w3d-card-cat"><?php $c = get_the_category(); echo esc_html( ! empty( $c ) ? $c[0]->name : 'Guide' ); ?></span>
								<span class="w3d-guide-title"><?php the_title(); ?></span>
								<span class="w3d-guide-excerpt"><?php echo esc_html( get_the_excerpt() ? wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 18 ) : wp_trim_words( wp_strip_all_tags( get_the_content() ), 18 ) ); ?></span>
								<span class="w3d-card-go">Read <span aria-hidden="true">→</span></span>
							</a>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

	<div class="w3d-duo-grid">
	<section class="w3d-section w3d-reveal w3d-duo-col" aria-labelledby="w3d-trust-title">
		<div class="w3d-wrap">
			<div class="w3d-trust">
				<h2 id="w3d-trust-title">Data, Not Hype.</h2>
				<p>Every chain score comes from live network data in our W3D Terminal and follows a published four-pillar methodology. Exchange reviews are checked against real fee schedules and security profiles. If we can&rsquo;t verify a claim, we don&rsquo;t publish it.</p>
				<ul class="w3d-trust-links">
					<li><a href="<?php echo esc_url( home_url( '/methodology/' ) ); ?>">Read our methodology →</a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About The W3D Team →</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="w3d-section w3d-reveal w3d-duo-col" aria-labelledby="w3d-cta-title">
		<div class="w3d-wrap">
			<div class="w3d-cta">
				<h2 id="w3d-cta-title">Start Mastering Web3 Today</h2>
				<p>Dig into the network data, compare the exchanges, and learn in plain English. No hype — just what you need to trade and build smarter.</p>
				<div class="w3d-ctas">
					<a class="w3d-btn-hero w3d-btn-primary" href="<?php echo esc_url( home_url( '/learn/' ) ); ?>">Start Learning Free</a>
					<a class="w3d-btn-hero w3d-btn-outline" href="<?php echo esc_url( home_url( '/terminal/' ) ); ?>">Open the Terminal</a>
				</div>
			</div>
		</div>
	</section>
	</div>

</div>

<?php
get_footer();