<?php
/**
Plugin Name: Robots.txt Editor
Plugin URI: https://wordpress.org/plugins/roots-txt-editor/
Description: Add editor UI for robots.txt
Author: Hametuha INC.
Version: nightly
Author URI: https://hametuha.co.jp/
License: GPL3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: rte
Domain Path: /languages
 */

defined( 'ABSPATH' ) or die();

/**
 * Get root URL.
 *
 * @return string
 */
function rte_root_url() {
	return untrailingslashit( plugin_dir_url( __FILE__ ) );
}

/**
 * Get plugin version.
 *
 * @return string
 */
function rte_version() {
	static $version = null;
	if ( is_null( $version ) ) {
		$data    = get_file_data( __FILE__, [
			'version' => 'Version',
		] );
		$version = $data['version'];
	}
	return $version;
}

/**
 * Initialize plugin.
 */
function rte_init() {
	// i18n.
	load_plugin_textdomain( 'rte', false, basename( __DIR__ ) . '/languages' );
	// Load hooks.
	require_once __DIR__ . '/includes/public.php';
	require_once __DIR__ . '/includes/admin.php';
}

//
// Register hooks.
//
add_action( 'plugins_loaded', 'rte_init' );
