<?php

/**
 * Notification script generation
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include( 'variables/script.php' );

$js .= 'jQuery( document ).ready(function() {';
$js .= 'jQuery("#notification-'.$id.'").Notification({';
$js .= 'Variable1: ["' . $variable1 . '"],';
$js .= 'Variable2: ["' . $variable2 . '"],';
$js .= 'Variable3: ["' . $variable3 . '"],';
$js .= 'Variable4: ["' . $variable4 . '"],';
$js .= 'Variable5: ["' . $variable5 . '"],';
$js .= 'Amount: [' . $amount . '],';
$js .= 'Content: "' . addslashes($content) . '",';
$js .= 'Show: [' . $show . '],';
$js .= 'Close: ' . $auto_close . ',';
$js .= 'AnimationEffectOpen: "' . $window_animate . '",';
$js .= 'AnimationEffectClose: "' . $window_animate_out . '",';
$js .= 'Number: ' . $number . ',';
$js .= 'Link: [' . $link . '],';
$js .= 'CloseButton: ' . $close . ',';
$js .= '});';
$js .= '});';
$js = trim( preg_replace( '~\s+~s', ' ', $js ) );

