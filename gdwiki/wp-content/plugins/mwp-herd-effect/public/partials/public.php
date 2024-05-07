<?php
/**
 * Display the Item on the frontend
 *
 * @package     Wow_Plugin
 * @subpackage  Public/Partials/Frontend
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_type_old = ! empty( $param['herd_custom'] ) ? 'custom' : 'icon';
$image_type = isset( $param['image_type'] ) ? $param['image_type'] : $image_type_old;

if ( $image_type === 'custom' ) {
	$icon = '<img src="' . $param['herd_custom_link'] . '">';
} else {
	$icon = '<span class="' . $param['menu_icon'] . '"></span>';
}

$notice = '';
$notice .= '<div id="notification-' . $id . '" class="notification">';
$notice .= '<div class="notification-close">&times;</div>';
$notice .= '<div class="notification-block">';
$notice .= '<div class="notification-img">' . $icon . '</div>';
$notice .= '<div class="notification-text-block">';
$notice .= '<div class="notification-title">' . $param['herd_title'] . '</div>';
$notice .= '<div class="notification-text"></div>';
$notice .= '</div></div></div>';
echo $notice;