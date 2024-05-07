<?php

/**
 * Admin Class
 *
 * @package     Wow_Plugin
 * @author      Dmytro Lobov
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     GNU Public License
 * @version     1.0
 */

namespace counter_box;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WP_Plugin_Admin
 *
 * @package wow_plugin
 *
 * @property array plugin - base information about the plugin
 * @property array url    - home, pro and other URL for plugin
 * @property array rating - website and link for rating
 *
 */
class WP_Plugin_Admin {

	/**
	 * Setup to admin panel of the plugin
	 *
	 * @param array $info general information about the plugin
	 *
	 * @since 1.0
	 */

	/**
	 * @var mixed
	 */
	private $plugin;
	/**
	 * @var mixed
	 */
	private $url;
	/**
	 * @var mixed
	 */
	private $rating;

	public function __construct( $info ) {
		$this->plugin = $info['plugin'];
		$this->url    = $info['url'];
		$this->rating = $info['rating'];

		add_filter( 'plugin_action_links', array( $this, 'settings_link' ), 10, 2 ); // add settings link
		add_filter( 'admin_footer_text', array( $this, 'footer_text' ) ); // add footer information
		add_action( 'admin_menu', array( $this, 'add_admin_page' ) ); // add admin page
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) ); // add admin script
		add_action( 'wp_ajax_wow_plugin_message', array( $this, 'ad_message_deactivate' ) ); // deactivate Ad message
		add_action( 'wp_ajax_' . $this->plugin['prefix'] . '_item_save', array( $this, 'item_save' ) ); // save element

	}


	/**
	 * Add the link to the plugin page on Plugins page
	 *
	 * @param $actions
	 * @param $plugin_file - the plugin main file
	 *
	 * @return mixed
	 */
	public function settings_link( $actions, $plugin_file ) {
		if ( false === strpos( $plugin_file, plugin_basename( $this->plugin['file'] ) ) ) {
			return $actions;
		}
		$link          = admin_url( 'admin.php?page=' . $this->plugin['slug'] );
		$settings_link = '<a href="' . esc_url( $link ) . '">' . esc_attr__( 'Settings', 'counter_box' ) . '</a>';
		array_unshift( $actions, $settings_link );

		return $actions;
	}

	/**
	 * Add custom text in the footer on the wow plugin page
	 *
	 * @param $footer_text - text in the footer
	 *
	 * @return string - end text in the footer
	 * @since 1.0
	 */
	public function footer_text( $footer_text ) {
		global $wow_plugin_page;
		if ( $wow_plugin_page == $this->plugin['slug'] ) {
			$text = sprintf(
				__( 'Thank you for using <a href="%1$s" target="_blank">%2$s</a>! Please <a href="%3$s" target="_blank">rate us on %4$s</a>', 'counter_box' ),
				esc_url( $this->url['home'] ),
				esc_attr( $this->plugin['name'] ),
				esc_url( $this->rating['url'] ),
				esc_attr( $this->rating['website'] )
			);

			return str_replace( '</span>', '', $footer_text ) . ' | ' . $text . '</span>';
		} else {
			return $footer_text;
		}
	}

	/**
	 * Add the plugin page in admin menu
	 *
	 * @since 1.0
	 */
	public function add_admin_page() {
		$title      = $this->plugin['name'] . ' version ' . $this->plugin['version'];
		$menu_title = $this->plugin['menu'];
		$capability = 'manage_options';
		$slug       = $this->plugin['slug'];
		$icon       = 'dashicons-clock';
		add_menu_page( $title, $menu_title, $capability, $slug, array( $this, 'plugin_page' ), $icon, 90 );
		add_submenu_page( $slug, 'All Counters', 'All Counters', $capability, $slug );

		$subpages_arr = array(
			'settings'  => array( 'Add New Counter', 'Add New' ),
			'support'   => array( 'Counter Box Support', 'Support' ),
			'extension' => array( 'Counter Box Extension', 'Extension' ),
		);

		$subpages = apply_filters( $this->plugin['slug'] . '_sub_menu', $subpages_arr );

		foreach ( $subpages as $key => $val ) {
			$sub_slug = $slug . '&tab=' . $key;
			$url      = admin_url( 'admin.php?page=' . $sub_slug );
			add_submenu_page( $slug, $val[0], $val[1], $capability, $url );
		}

	}

	/**
	 * Include main plugin page
	 *
	 * @since 1.0
	 */
	public function plugin_page() {
		global $wow_plugin_page;
		$wow_plugin_page = $this->plugin['slug'];
		require_once 'page-main.php';
	}


	/**
	 * Include admin style and scripts on the plugin page
	 *
	 * @since 1.0
	 */
	public function admin_scripts( $hook ) {
		$page = 'toplevel_page_' . $this->plugin['slug'];

		if ( $page != $hook ) {
			return false;
		}

		$slug       = $this->plugin['slug'];
		$version    = $this->plugin['version'];
		$url_assets = plugin_dir_url( __FILE__ ) . 'assets/';
		$pre_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( $slug . '-admin', $url_assets . 'css/main' . $pre_suffix . '.css', false, $version );
		wp_enqueue_style( $slug . '-custom', $url_assets . 'css/custom' . $pre_suffix . '.css', false, $version );
		wp_enqueue_style( $slug . '-preview', $url_assets . 'css/preview' . $pre_suffix . '.css', false, $version );

		$url_navigation = $url_assets . 'js/navigation' . $pre_suffix . '.js';
		wp_enqueue_script( $slug . '-navigation', $url_navigation, array( 'jquery' ), $version, true );

		if ( isset( $_GET['tab'] ) && $_GET['tab'] !== 'settings' ) {
			return false;
		}

		// include the plugin admin script
		$url_script = $url_assets . 'js/script' . $pre_suffix . '.js';
		wp_enqueue_script( $slug . '-admin', $url_script, array( 'jquery' ), $version, true );

		$url_preview = plugin_dir_url( __FILE__ ) . 'assets/js/preview' . $pre_suffix . '.js';
		wp_enqueue_script( $slug . '-preview', $url_preview, array( 'jquery' ), $version, true );

		// include the color picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		// include an alpha rgba color picker
		$url_alpha = $url_assets . 'js/wp-color-picker-alpha.min.js';
		wp_enqueue_script( 'wp-color-picker-alpha', $url_alpha, array( 'wp-color-picker' ) );

	}

	/**
	 * Deactivate the Ad message on plugin page
	 *
	 * @since 1.0
	 */
	public function ad_message_deactivate() {
		update_option( 'wow_' . $this->plugin['prefix'] . '_message', 'read' );
		wp_die();
	}

	static function input( $arg ) {
		include( 'fields/input.php' );
	}

	static function number( $arg ) {
		include( 'fields/number.php' );
	}

	static function select( $arg ) {
		include( 'fields/select.php' );
	}

	static function editor( $arg ) {
		include( 'fields/editor.php' );
	}

	static function textarea( $arg ) {
		include( 'fields/textarea.php' );
	}

	static function color( $arg ) {
		include( 'fields/color.php' );
	}

	static function checkbox( $arg ) {
		include( 'fields/checkbox.php' );
	}

	static function time( $arg ) {
		include( 'fields/time.php' );
	}

	static function date( $arg ) {
		include( 'fields/date.php' );
	}

	/**
	 * Save and Update the Item into the plugin Database
	 *
	 * @return array response from DB
	 *
	 * @since 1.0
	 */
	public function save_data() {
		global $wpdb;

		$add   = ( isset( $_REQUEST['add'] ) ) ? absint( $_REQUEST['add'] ) : '';
		$table = ( isset( $_REQUEST['data'] ) ) ? sanitize_text_field( $_REQUEST['data'] ) : '';
		$param = array_map( 'wp_kses_post', wp_unslash( $_POST['param'] ) );
		$id    = absint( $_POST['tool_id'] );

		$data = array(
			'id'     => $id,
			'title'  => wp_unslash( sanitize_text_field( $_POST['title'] ) ),
			'param'  => serialize( $param ),
			'status' => absint( $_POST['status'] ),
		);

		if ( $add === 1 ) {
			$wpdb->insert( $table, $data );
		} elseif ( $add === 2 ) {
			$wpdb->update( $table, $data, array( 'id' => $id ), $format = null, $where_format = null );
		}

		$response = array(
			'status'  => 'OK',
			'message' => esc_attr__( 'Item Updated', 'counter_box' ),
		);

		return $response;
	}

	public function item_save() {
		$response = 'No';
		if ( isset( $_POST[ $this->plugin['slug'] . '_nonce' ] ) ) {
			if ( ! empty( $_POST )
			     && wp_verify_nonce( $_POST[ $this->plugin['slug'] . '_nonce' ], $this->plugin['slug'] . '_action' )
			     && current_user_can( 'manage_options' )
			) {
				$response = self:: save_data();
			}
		}
		wp_send_json( $response );
		wp_die();
	}

}
