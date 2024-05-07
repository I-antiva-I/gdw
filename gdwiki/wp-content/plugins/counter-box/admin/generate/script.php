<?php
/**
 * Notification script generation
 *
 * @package     WP_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$script['target']   = '#counter-box-' . $id;
$script['type'] = $param['counter_type'];

if ( $param['counter_type'] === 'toDate' ) {
	$date             = explode( '-', $param['countdown_date'] );
	$time             = explode( ':', $param['countdown_time'] );
	$month = $date[1] - 1;
	$script['toDate'] = [ $date[0], $month, $date[2], $time[0], $time[1] ];
}


