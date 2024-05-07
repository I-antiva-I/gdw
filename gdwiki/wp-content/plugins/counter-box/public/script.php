<?php
/**
 * Counter script generation
 *
 * @package     WP_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$script['selector'] = '.counter-box-' . $id;
$script['type']     = $param['type'];

if ( $param['type'] === 'CountToDate' || $param['type'] === 'ContFromDate' || $param['type'] === 'CountToWeekday' ) {

	$script['date_options'] = [
		'date'     => ( $param['type'] === 'CountToWeekday' ) ? $param['dayweek'] : $param['date'],
		'time'     => $param['time'],
		'timezone' => $param['timezone'],
	];
} elseif ( $param['type'] === 'Timer' || $param['type'] === 'UserTimer' || $param['type'] === 'TimerStopGo' ) {
	$script['timer_options'] = [
		'day'     => $param['day'],
		'hours'   => $param['hours'],
		'minutes' => $param['minutes'],
		'seconds' => $param['seconds'],
	];
} elseif ( $param['type'] === 'Counter' ) {
	$script['counter_options'] = [
		'start'     => $param['start'],
		'finish'    => $param['finish'],
		'speed'     => [
			'min' => $param['speed_min'],
			'max' => $param['speed_max'],
		],
		'increment' => [
			'min' => $param['increment_min'],
			'max' => $param['increment_max'],
		],
		'round'     => $param['rounding'],
		'delimiter' => empty( $param['delimiter'] ) ? '0' : $param['delimiter'],
		'remember'  => empty( $param['remember'] ) ? '0' : $param['remember'],
	];
}

$script['targets'] = [];

if ( ! empty( $param['hideCounter'] ) ) {
	$script['targets']['hideCounter'] = '1';
}

if ( ! empty( $param['showMessage'] ) ) {
	$script['targets']['showMessage'] = $param['message'];
}

if ( ! empty( $param['hideBlock_checkbox'] ) ) {
	$script['targets']['hideBlock'] = $param['hideBlock'];
}

if ( ! empty( $param['showBlock_checkbox'] ) ) {
	$script['targets']['showBlock'] = $param['showBlock'];
}

if ( ! empty( $param['redirect_checkbox'] ) ) {
	$script['targets']['redirect'] = $param['redirect'];
}

if ( ! empty( $param['action_checkbox'] ) ) {
	$script['targets']['action'] = $param['action'];
}

$script['container_css'] = '';
$script['number_css']    = '';

if ( ! empty( $param['width_unit'] ) && $param['width_unit'] !== 'auto' ) {
	$script['number_css'] .= 'width:' . $param['width'] . 'px;';
}

if ( ! empty( $param['height_unit'] ) && $param['height_unit'] !== 'auto' ) {
	$script['number_css'] .= 'height:' . $param['height'] . 'px;';
	$script['number_css'] .= 'line-height:' . $param['height'] . 'px;';
}

if ( ! empty( $param['background'] ) ) {
	$script['number_css'] .= 'background:' . $param['background'] . ';';
}

if ( ! empty( $param['border_radius'] ) ) {
	$script['number_css'] .= 'border-radius:' . $param['border_radius'] . 'px;';
}

if ( ! empty( $param['border_style'] ) && $param['border_style'] !== 'none' ) {
	$script['number_css'] .= 'border-style:' . $param['border_style'] . ';';
	$script['number_css'] .= 'border-width:' . $param['border_width'] . ';';
	$script['number_css'] .= 'border-color:' . $param['border_color'] . ';';
}













