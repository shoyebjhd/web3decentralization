<?php
/**
 * 404 template.
 *
 * @package w3d
 */

get_header();
?>

<div class="w3d-wrap">
	<section class="w3d-404">
		<h1>Page not found</h1>
		<p>
			The page you&rsquo;re looking for doesn&rsquo;t exist, or was moved. Try a search, or head back to the
			homepage to explore the chain audits, exchange reviews, and guides.
		</p>

		<form role="search" method="get" class="w3d-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="w3d-s">Search</label>
			<input type="search" id="w3d-s" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search the site&hellip;', 'w3d' ); ?>">
			<button type="submit">Search</button>
		</form>

		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&larr; Back to homepage</a></p>
	</section>
</div>

<?php
get_footer();