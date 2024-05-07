<?php
/**
 * Plugin Name:       Iknow extra
 * Plugin URI:        hhttps://wordpress.org/plugins/iknow-extra/
 * Description:       The extension for free WordPress theme Iknow
 * Version:           1.2
 * Author:            Wow-Company
 * Author URI:        https://wow-estore.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       iknow-extra
 */

if ( 'iknow' != get_option( 'template' ) ) {
	if ( ! function_exists( 'iknow_theme_activated' ) ) {
		function iknow_theme_activated() {
			$message = sprintf( __( 'This plugin "Iknow Extra" works only with WordPress theme "Iknow". Please, install and activate the theme "Iknow" first (<a href="%1$s" target="_blank">https://wordpress.org/themes/iknow/</a>)', 'iknow-extra' ), esc_url( 'https://wordpress.org/themes/iknow/' ) );
			echo '<div class="notice notice-error"> <p>' . $message . '</p></div>';
		}

		add_action( 'admin_notices', 'iknow_theme_activated' );
	}
} else {
	iknow_extra();
}

function iknow_extra_language() {
	$languages_folder = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	load_plugin_textdomain( 'iknow-extra', false, $languages_folder );
}

add_action( 'plugins_loaded', 'iknow_extra_language' );

function iknow_extra() {
	include "inc/voting.php";
	include "inc/class-category-extra-fields.php";
	add_action( 'wp_enqueue_scripts', 'iknow_extra_script' );
}

function iknow_extra_script() {
	$pre_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'iknow-extra', plugin_dir_url( __FILE__ ) . 'assets/script' . $pre_suffix . '.js', array(), '1.0', true );
	wp_localize_script( 'iknow-extra', 'iknow_ajax',
		array( 'url' => esc_url( admin_url( 'admin-ajax.php' ) ), 'nonce' => wp_create_nonce( 'ajax-nonce' ) ) );
}