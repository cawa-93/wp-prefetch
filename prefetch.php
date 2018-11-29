<?php

namespace WP\Plugins\Prefetch;

/**
 * Prefetch visible links
 *
 * @wordpress-plugin
 * Plugin Name:       Prefetch visible links
 * Description:       Instructs the browser to prefetch the link as soon as it appears on the screen.
 * Version:           1.0.0
 * Author:            Alex Kozack
 * Author URI:        https://t.me/kozack
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('PREFETCH_VERSION', '1.0.0');

if ( is_admin() ) {
    // we are in admin mode
    require_once( dirname( __FILE__ ) . '/admin/settings.php' );
}

add_action( 'wp_enqueue_scripts', function () {
  wp_enqueue_script( 'prefetch', plugins_url( '/js/prefetch.js', __FILE__ ), array('jquery'), PREFETCH_VERSION, true );
  wp_localize_script('prefetch', 'prefetchConfig', array(
    'base' => home_url(),
    'container' => get_option( 'prefetch-container', 'body' ),
  ));
});

