<?php
/**
 * Remove WordPress Version Number
 *
 * @package           RemoveVersionNumber
 * @author            Uriel Wilson
 * @copyright         2020 Uriel Wilson
 * @license           GPL-2.0
 * @link              https://urielwilson.com
 *
 * @wordpress-plugin
 * Plugin Name:       Remove WordPress Version Number
 * Plugin URI:        https://switchwebdev.com/wordpress-plugins/
 * Description:       A quict and easy way to remove the WordPress version number.
 * Version:           0.2.1
 * Requires at least: 4.0
 * Requires PHP:      5.6
 * Author:            SwitchWebdev.com
 * Author URI:        https://switchwebdev.com
 * Text Domain:       remove-version-number
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

	// deny direct access.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	// remove version from head.
	remove_action( 'wp_head', 'wp_generator' );

	// remove version from rss.
	add_filter( 'the_generator', '__return_empty_string' );

	// remove version from styles.
	add_filter( 'style_loader_src', function ( $src ) {
			if ( strpos( $src, 'ver=' ) ) {
				$src = remove_query_arg( 'ver', $src );
			}
			return $src;
		}, 9999
	);

	// remove version from scripts.
	add_filter( 'script_loader_src', function ( $src ) {
			if ( strpos( $src, 'ver=' ) ) {
				$src = remove_query_arg( 'ver', $src );
			}
			return $src;
		}, 9999
	);
