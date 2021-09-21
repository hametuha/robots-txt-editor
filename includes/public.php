<?php
/**
 * Public area renderer.
 *
 * @package rte
 */

/**
 * Filter robots.txt
 */
add_filter( 'robots_txt', function( $output, $public ) {
	$saved = get_option( 'robots_txt_editor', '' );
	if ( $saved ) {
		$output = $saved;
	}
	return $output;
}, 100, 2 );

/**
 * Get prefix.
 *
 * @return string
 */
function rte_prefix_path() {
	$site_url = parse_url( site_url() );
	return ( ! empty( $site_url['path'] ) ) ? $site_url['path'] : '';
}

/**
 * Get default robots.txt
 *
 * @see do_robots()
 * @return string
 */
function rte_default_robots() {
	$output  = "User-agent: *\n";
	$path    = rte_prefix_path();
	$output .= "Disallow: $path/wp-admin/\n";
	$output .= "Allow: $path/wp-admin/admin-ajax.php\n";
	return $output;
}
