<?php
/**
 * Public Class
 *
 * @package     Wow_Plugin
 * @subpackage  Public
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.0
 */

namespace herd_effects;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Wow_Plugin_Public
 *
 * @package wow_plugin
 *
 * @property array plugin   - base information about the plugin
 * @property array url      - home, pro and other URL for plugin
 * @property array rating   - website and link for rating
 * @property string basedir - filesystem directory path for the plugin
 * @property string baseurl - URL directory path for the plugin
 */
class Wow_Plugin_Public {

	private $plugin;
	private $url;
	private $rating;
	private $basedir;
	private $baseurl;

	/**
	 * Setup to frontend of the plugin
	 *
	 * @param array $info general information about the plugin
	 *
	 * @since 1.0
	 */

	public function __construct( $info ) {

		$this->plugin = $info['plugin'];
		$this->url    = $info['url'];
		$this->rating = $info['rating'];

		$upload        = wp_upload_dir();
		$this->basedir = $upload['basedir'] . '/' . $this->plugin['slug'] . '/';
		$this->baseurl = $upload['baseurl'] . '/' . $this->plugin['slug'] . '/';


		add_shortcode( 'Wow-Herd-Effects-Pro', array( $this, 'shortcode' ) ); // old Shortcode
		add_shortcode( $this->plugin['shortcode'], array( $this, 'shortcode' ) );

		// Display on the site
		add_action( 'wp_footer', array( $this, 'display' ) );

	}

	public function plugin_scripts() {
		$url_style = $this->plugin['url'] . 'assets/css/style.min.css';
		wp_enqueue_style( $this->plugin['slug'], $url_style, array(), $this->plugin['version'] );
	}

	/**
	 * Display a shortcode
	 *
	 * @param $atts
	 *
	 * @return false|string
	 */
	public function shortcode( $atts ) {
		ob_start();
		require plugin_dir_path( __FILE__ ) . 'shortcode.php';
		$shortcode = ob_get_contents();
		ob_end_clean();
		return $shortcode;
	}

	/**
	 * Display the Item on the specific pages, not via the Shortcode
	 */
	public function display() {
		require plugin_dir_path( __FILE__ ) . 'display.php';
	}

	public function inline_style( $param, $id ) {
		$css = '';
		require 'generator/style.php';
		return $css;
	}

	public function inline_script( $param, $id ) {
		$js = '';
		require 'generator/script.php';
		return $js;
	}

	private function check( $param ) {
		$check = true;
		$test_mode = isset ( $param['test_mode'] ) ? $param['test_mode'] : 'no';
		if ( ! current_user_can( 'administrator' ) && $test_mode === 'yes' ) {
			$check = false;
		}
		return $check;
	}

}

