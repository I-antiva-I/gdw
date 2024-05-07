<?php
/**
 * Plugin Name:       Herd Effects
 * Plugin URI:        https://wordpress.org/plugins/mwp-herd-effect/
 * Description:       Create and show fake notifications to motivate users to take action on your site!
 * Version:           5.2.5
 * Author:            Wow-Company
 * Author URI:        https://wow-estore.com/author/admin/?author_downloads=true
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       herd-effects
 * Domain Path:       /languages
 *
 * PHP version 5.6.0
 *
 * @category    Wordpress_Plugin
 * @package     Wow_Plugin
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.1
 */

// Required set the namespace for plugin.
namespace herd_effects;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wow_Plugin' ) ) :

	/**
	 * Main Wow_Plugin Class.
	 *
	 * @since 1.0
	 */
	final class Wow_Plugin {

		private static $_instance;
		/**
		 * @var Wow_Plugin_Admin
		 */
		private $admin;
		/**
		 * @var Wow_Plugin_Public
		 */
		private $public;

		/**
		 * Wow Plugin information
		 *
		 * All information which need for correctly plugin working
		 *
		 * @return array
		 * @static
		 */
		public static function information() {

			$info = array(
				'plugin' => array(
					'name'      => esc_attr__( 'Herd Effects', 'herd-effects' ), // Plugin name
					'menu'      => esc_attr__( 'Herd Effects', 'herd-effects' ), // Plugin name in menu
					'author'    => 'Wow-Company', // Author
					'prefix'    => 'hep', // Prefix for database
					'text'      => 'herd-effects',    // Text domain for translate files
					'version'   => '5.2.5', // Current version of the plugin
					'file'      => __FILE__, // Main file of the plugin
					'slug'      => dirname( plugin_basename( __FILE__ ) ), // Name of the plugin folder
					'url'       => plugin_dir_url( __FILE__ ), // filesystem directory path for the plugin
					'dir'       => plugin_dir_path( __FILE__ ), // URL directory path for the plugin
					'shortcode' => 'Herd-Effects',
				),
				'url'    => array(
					'author'   => 'https://wow-estore.com/',
					'home'     => 'https://wordpress.org/plugins/mwp-herd-effect/',
					'support'  => 'https://wordpress.org/support/plugin/mwp-herd-effect/',
					'facebook' => 'https://www.facebook.com/wowaffect/',
				),
				'rating' => array(
					'website' => esc_attr__( 'Wordpress.org', 'herd-effects' ), // Name site for rating plugin
					'url'     => 'https://wordpress.org/support/plugin/mwp-herd-effect/reviews/#new-post',
					'wp_url'   => 'https://wordpress.org/support/plugin/mwp-herd-effect/reviews/#new-post',
					'wp_home'  => 'https://wordpress.org/plugins/mwp-herd-effect/',
					'wp_title' => 'Herd Effects – fake notifications with social proof',
				),
			);

			return $info;

		}

		/**
		 * Main Wow_Plugin Instance.
		 *
		 * Insures that only one instance of Wow_Plugin exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @return object|Wow_Plugin The one true Wow_Plugin for Current plugin
		 *
		 * @uses      Wow_Plugin::_includes() Include the required files.
		 * @uses      Wow_Plugin::text_domain() load the language files.
		 * @since     1.0
		 * @static
		 * @staticvar array $_instance
		 */
		public static function instance() {

			if ( ! isset( self::$_instance ) && ! ( self::$_instance instanceof Wow_Plugin ) ) {

				$info = self::information();

				self::$_instance = new Wow_Plugin;

				register_activation_hook( __FILE__, array( self::$_instance, 'plugin_activate' ) );
				add_action( 'plugins_loaded', array( self::$_instance, 'text_domain' ) );

				self::$_instance->_includes();
				self::$_instance->admin = new Wow_Plugin_Admin( $info );
				self::$_instance->public = new Wow_Plugin_Public( $info );
			}

			return self::$_instance;
		}

		/**
		 * Throw error on object clone.
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @return void
		 * @since  1.0
		 * @access protected
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', 'herd-effects' ), '0.1' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @return void
		 * @since  1.0
		 * @access protected
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', 'herd-effects' ), '0.1' );
		}


		/**
		 * Include required files.
		 *
		 * @access private
		 * @return void
		 * @since  1.0
		 */
		private function _includes() {
			if ( ! class_exists( 'Wow_Company' ) ) {
				include_once 'includes/class-wow-company.php';
			}
			include_once 'admin/class-admin.php';
			include_once 'public/class-public.php';
		}

		/**
		 * Activate the plugin.
		 * create the database
		 * create the folder in wp-upload
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function plugin_activate() {
			$info   = self::information();
			$prefix = $info['plugin']['prefix'];
			global $wpdb;
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			// Create the database for plugin
			$table = $wpdb->prefix . 'wow_' . $prefix;
			$sql   = "CREATE TABLE " . $table . " (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				title VARCHAR(200) NOT NULL,
				param TEXT,
				script TEXT,
				style TEXT,
				UNIQUE KEY id (id)
			) DEFAULT CHARSET=utf8;";
			dbDelta( $sql );

			deactivate_plugins( 'wow-herd-effects-pro/wow-herd-effects-pro.php' );
		}
		/**
		 * Download the folder with languages.
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function text_domain() {
			$languages_folder = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
			load_plugin_textdomain( 'herd-effects', false, $languages_folder );
		}


	}

endif; // End if class_exists check.

/**
 * The main function for that returns Wow_Plugin
 *
 * @since 1.0
 */
function Wow_Plugin_run() {
	return Wow_Plugin::instance();
}

// Get Running.
Wow_Plugin_run();
