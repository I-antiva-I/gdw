<?php
/**
 * Public Class
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace counter_box;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WP_Plugin_Public {

	private $info;
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
		// Display on the site
		add_shortcode( $this->plugin['shortcode'], array( $this, 'shortcode' ) );
	}

	function shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'id' => '',
		), $atts, $this->plugin['shortcode'] );

		$id = absint( $atts['id'] );
		global $wpdb;
		$table   = $wpdb->prefix . $this->plugin['prefix'];
		$counter = $wpdb->get_row( "SELECT * FROM " . $table . " WHERE id = " . $id, OBJECT );
		$param   = unserialize( $counter->param );

		$check = $this->check( $param, $id );

		if ( $check === false ) {
			return false;
		}

		if ( empty( $counter->status ) ) {
			return false;
		}

		$rest = '';
		if ( ! empty( $param['test_mode'] ) ) {
			if ( $param['type'] === 'UserTimer' || $param['type'] === 'TimerStopGo' || $param['type'] === 'Counter' ) {
				$rest = '<button class="counter-reset">'.esc_attr__('Reset counter', 'counter_box').'</button>';
			}
		}

		$content = '<div style="display:none;" class="counter-box-' . absint($id) . '">';
		$content .= $param['content'];
		$content .= $rest;
		$content .= '</div>';


		$pre_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$slug    = $this->plugin['slug'];
		$version = $this->plugin['version'];

		$url_style = plugin_dir_url( __FILE__ ) . 'assets/css/style' . $pre_suffix . '.css';
		wp_enqueue_style( $slug, $url_style, null, $version );

		$url_script = plugin_dir_url( __FILE__ ) . 'assets/js/counterBox' . $pre_suffix . '.js';
		wp_enqueue_script( $slug, $url_script, array(), $version );

		$script = $this->get_script( $param, $id );
		wp_localize_script( $slug, 'CounterBox_' . $id, $script );

		if ( ! empty( $param['test_mode'] ) ) {
			$url_script_reset = plugin_dir_url( __FILE__ ) . 'assets/js/counterReset' . $pre_suffix . '.js';
			wp_enqueue_script( $slug . '-reset', $url_script_reset, array(), $version );
		}

		return $content;

	}


	public function get_script( $param, $id ) {
		$script = array();
		require 'script.php';

		return $script;
	}

	private function check( $param, $id ) {
		$check = true;

		$user = $this->check_user( $param );
		$lang = $this->check_language( $param );
		$day  = $this->check_day( $param );
		$time = $this->check_time( $param );
		$date = $this->check_date( $param );

		$test_mode = ! empty( $param['test_mode'] ) ? 'yes' : 'no';

		if ( $test_mode === 'no' ) {
			if ( $user === false || $lang === false || $day === false || $time === false || $date === false ) {
				$check = false;
			}

		} else {
			if ( ! current_user_can( 'administrator' ) ) {
				$check = false;
			}
		}

		return $check;
	}


	private function check_time( $param ) {

		$time_start = isset( $param['time_start'] ) ? $param['time_start'] : '00:00';
		$time_end   = isset( $param['time_end'] ) ? $param['time_end'] : '23:59';

		$start   = str_replace( ':', ',', $time_start );
		$end     = str_replace( ':', ',', $time_end );
		$current = date( 'H,i' );

		if ( $start <= $current && $current <= $end ) {
			return true;
		} else {
			return false;
		}
	}

	private function check_user( $param ) {
		$user      = true;
		$item_user = ! empty( $param['item_user'] ) ? $param['item_user'] : '1';
		if ( $item_user == 1 ) {
			$user = true;
		} elseif ( $item_user == 2 ) {
			if ( is_user_logged_in() ) {
				if ( $param['user_role'] == 'all' ) {
					$user = true;
				} else {
					$current_user = wp_get_current_user();
					if ( $param['user_role'] == $current_user->roles[0] ) {
						$user = true;
					} else {
						$user = false;
					}
				}
			} else {
				$user = false;
			}
		} elseif ( $item_user == 3 ) {
			$user = ! is_user_logged_in();
		}

		return $user;
	}

	private function check_language( $param ) {
		$lang = true;
		if ( ! empty( $param['language_checkbox'] ) ) {
			$item_lang = $param['language'];
			$site_lang = get_locale();
			if ( substr( $site_lang, 0, 2 ) == $item_lang ) {
				$lang = true;
			} else {
				$lang = false;
			}
		} elseif ( empty( $param['language_checkbox'] ) ) {
			$lang = true;
		}

		return $lang;
	}

	private function check_day( $param ) {
		$weekday = isset( $param['weekday'] ) ? $param['weekday'] : 'none';
		$day     = true;
		if ( $weekday !== 'none' ) {
			if ( $weekday != date( 'N' ) ) {
				$day = false;
			}
		}

		return $day;
	}

	private function check_date( $param ) {
		$date = true;
		if ( ! empty( $param['set_dates'] ) ) {
			$current = date( 'Y-m-d' );
			$start   = $param['date_start'];
			$end     = $param['date_end'];
			if ( $start <= $current && $current <= $end ) {
				$date = true;
			} else {
				$date = false;
			}
		}

		return $date;
	}


}