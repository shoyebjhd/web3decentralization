<?php
/**
 * Plugin Name: W3D Site Verification
 * Description: Injects Google site verification meta tag into the head.
 * Version: 1.0
 */
add_action('wp_head', function () {
    echo "\n<meta name=\"google-site-verification\" content=\"kDyWiry8GZzQaa_Sh09S8G1L8k3uoRV1S0j18G8dAlA\" />\n";
}, 5);