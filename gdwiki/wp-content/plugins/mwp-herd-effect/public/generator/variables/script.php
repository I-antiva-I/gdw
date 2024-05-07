<?php
/**
 * Variables for script generation
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


if ( ! empty( $param['herd_name'] ) ) {
	$variable1 = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $param['herd_name'] );
	$variable1 = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $variable1 );
	$variable1 = str_replace( ',', '","', $variable1 );
} else {
	$variable1 = '';
}

if ( ! empty( $param['herd_city'] ) ) {
	$variable2 = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $param['herd_city'] );
	$variable2 = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $variable2 );
	$variable2 = str_replace( ',', '","', $variable2 );
} else {
	$variable2 = '';
}

if ( ! empty( $param['herd_product'] ) ) {
	$variable3 = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $param['herd_product'] );
	$variable3 = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $variable3 );
	$variable3 = str_replace( ',', '","', $variable3 );
} else {
	$variable3 = '';
}

if ( ! empty( $param['variable4'] ) ) {
	$variable4 = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $param['variable4'] );
	$variable4 = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $variable4 );
	$variable4 = str_replace( ',', '","', $variable4 );
} else {
	$variable4 = '';
}

if ( ! empty( $param['variable5'] ) ) {
	$variable5 = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $param['variable5'] );
	$variable5 = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $variable5 );
	$variable5 = str_replace( ',', '","', $variable5 );
} else {
	$variable5 = '';
}

$amount_min = ! empty( $param['amount_min'] ) ? $param['amount_min'] : 0;
$amount_max = ! empty( $param['amount_max'] ) ? $param['amount_max'] : 0;
$amount     = $amount_min . ', ' . $amount_max;

$content = $param['herd_text'];

$sec_step = 'stable';
$speed_min = ! empty( $param['speed'] ) ? $param['speed'] : 5;
$speed_max = 0;

$show = '"' . $sec_step . '", ' . $speed_min . ', ' . $speed_max;

$auto_close = 7;

$window_animate     = 'bounceIn';
$window_animate_out = 'bounceOut';

$number = ! empty( $param['number'] ) ? $param['number'] : '3';

$include_link = 'false';
$herd_link    = '';
$link_target  = '_self';
$click_link   = 'false';
$link         = $include_link . ', "' . $herd_link . '", "' . $link_target . '", ' . $click_link;

$close = ( ! empty( $param['show_close'] ) ) ? 'true' : 'false';