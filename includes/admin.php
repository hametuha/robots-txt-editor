<?php
/**
 * Setting screen for robots.txt editor.
 *
 * @package rte
 */

/**
 * Register settings API.
 */
add_action( 'admin_init', function() {
	// If AJAX, skip.
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
	// Register settings.
	add_settings_field( 'robots_txt_editor', 'robots.txt', function() {
		printf(
			'<textarea style="%s" rows="5" name="robots_txt_editor" id="robots-txt-editor" placeholder="%s">%s</textarea>',
			esc_attr( 'box-sizing: border-box; width:100%;' ),
			esc_attr( rte_default_robots() ),
			esc_textarea( get_option( 'robots_txt_editor', '' ) )
		);

		printf(
			'<p class="description">%s &raquo; <a href="%s" target="_blank" rel="noopener noreferrer">%s</a></p>',
			esc_html__( 'robots.txt is a requirement list for crawlers. Most of crawlers(bots) respect one.', 'rte' ),
			esc_url( home_url( 'robots.txt' ) ),
			esc_html__( 'Preview robots.txt.', 'rte' )
		);
	}, 'reading', 'default' );
	register_setting( 'reading', 'robots_txt_editor' );
} );
