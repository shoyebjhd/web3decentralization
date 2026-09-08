<?php
/**
 * Theme header.
 *
 * @package w3d
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>document.documentElement.classList.remove('no-js');document.documentElement.classList.add('js');</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#w3d-main">Skip to content</a>

<header id="masthead" class="w3d-header">
	<div class="w3d-wrap w3d-header-inner">
		<div class="w3d-site-branding">
			<?php echo w3d_logo_markup( true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>

		<button class="w3d-nav-toggle" aria-expanded="false" aria-controls="primary-menu" type="button">
			<span class="w3d-burger" aria-hidden="true"></span>
			<span class="screen-reader-text">Open menu</span>
		</button>

		<nav class="w3d-nav" aria-label="<?php esc_attr_e( 'Primary', 'w3d' ); ?>" id="w3d-nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'w3d-nav-list' . ( w3d_has_primary_menu() ? '' : ' w3d-nav-list-fallback' ),
				'depth'          => 2,
				'fallback_cb'    => '__return_false',
				'menu_id'        => 'primary-menu',
				'item_spacing'   => 'preserve',
			) );
			?>
		</nav>
	</div>
</header>

<main id="w3d-main" class="w3d-main">