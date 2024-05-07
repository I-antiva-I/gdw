<?php
/**
 * Shortcode
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace herd_effects;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

extract( shortcode_atts( array( 'id' => "" ), $atts ) );
global $wpdb;
$table  = $wpdb->prefix . 'wow_' . $this->plugin['prefix'];
$sSQL   = $wpdb->prepare( "select * from $table WHERE id = %d", $id );
$result = $wpdb->get_results( $sSQL );
if ( count( $result ) > 0 ) {
	foreach ( $result as $key => $val ) {
		$param = unserialize( $val->param );

		$check = $this->check($param);
		if ($check === false) {
			return false;
		}

		ob_start();
		include( 'partials/public.php' );
		$content = ob_get_contents();
		ob_end_clean();
		echo $content;

		$slug    = $this->plugin['slug'];
		$version = $this->plugin['version'];

		if ( empty( $param['disable_fontawesome'] ) ) {
			$url_vendors     = $this->plugin['url'] . 'vendors/';
			$url_fontawesome = $url_vendors . 'fontawesome/css/all.min.css';
			wp_enqueue_style( $slug . '-fontawesome', $url_fontawesome, null, '5.12' );
		}

		$url_style = plugin_dir_url( __FILE__ ) . 'assets/css/style.min.css';
		wp_enqueue_style( $slug, $url_style, null, $version );

		$inline_style = self::inline_style( $param, $id );
		wp_add_inline_style( $slug, $inline_style );

		$url_animation = plugin_dir_url( __FILE__ ) . 'assets/css/animate.min.css';
		wp_enqueue_style( $slug . '-animate', $url_animation, null, $version );

		$url_script = plugin_dir_url( __FILE__ ) . 'assets/js/script.min.js';
		wp_enqueue_script( $slug, $url_script, array( 'jquery' ), $version, true );

		$inline_js = self::inline_script( $param, $id );
		wp_add_inline_script( $slug, $inline_js );
	}
}
