<?php
/**
 * Variables for style generation
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Location
$herd_top_unit = isset( $param['herd_top_unit'] ) ? $param['herd_top_unit'] : '%';
$top           = ! empty( $param['include_herd_top'] ) ? 'top: ' . $param['herd_top'] . $herd_top_unit . ';' : '';

$herd_bottom_unit = isset( $param['herd_bottom_unit'] ) ? $param['herd_bottom_unit'] : '%';
$bottom           = ! empty( $param['include_herd_bottom'] ) ? 'bottom: ' . $param['herd_bottom'] . $herd_bottom_unit . ';' : '';

$herd_left_unit = isset( $param['herd_left_unit'] ) ? $param['herd_left_unit'] : '%';
$left           = ! empty( $param['include_herd_left'] ) ? 'left: ' . $param['herd_left'] . $herd_left_unit . ';' : '';

$herd_right_unit = isset( $param['herd_right_unit'] ) ? $param['herd_right_unit'] : '%';
$right           = ! empty( $param['include_herd_right'] ) ? 'right: ' . $param['herd_right'] . $herd_right_unit . ';' : '';

$location = $top . $bottom . $left . $right;

$background = 'rgba(0,0,0,0.75)';

// Border
$border_radius = '0';
$border        = 'none';

// Shadows
$box_shadow = 'box-shadow: none;';

// Popup Title style
$title_font        = ! empty( $param['title_font'] ) ? $param['title_font'] : 'inherit';
$title_size        = ! empty( $param['title_size'] ) ? $param['title_size'] . 'px' : '16px';
$title_line_height = ! empty( $param['title_line_height'] ) ? $param['title_line_height'] . 'px' : '32px';
$title_font_weight = ! empty( $param['title_font_weight'] ) ? $param['title_font_weight'] : 'bolder';
$title_font_style  = ! empty( $param['title_font_style'] ) ? $param['title_font_style'] : 'normal';
$title_align       = ! empty( $param['title_align'] ) ? $param['title_align'] : 'left';
$title_color       = '#ffffff';

$content_width      = '200px';
$content_height = 'auto';

$content_font        = ! empty( $param['content_font'] ) ? $param['content_font'] : 'inherit';
$content_size        = ! empty( $param['content_size'] ) ? $param['content_size'] . 'px' : '14px';
$content_line_height = ! empty( $param['content_line_height'] ) ? $param['content_line_height'] . 'px' : '18px';
$text_color          = '#ffffff';

$icon_width = '60px';
$icon_size       = ! empty( $param['icon_size'] ) ? $param['icon_size'] . 'px' : '40px';
$icon_color      = '#ffffff';
$icon_bg         = 'rgba(0,0,0,0.75)';
$icon_background = $icon_bg;

$close_size  = ! empty( $param['close_size'] ) ? $param['close_size'] : '24';
$close_color = '#ffffff';

$include_more_screen = isset( $param['include_more_screen'] ) ? $param['include_more_screen'] : 0;
$screen_more         = ! empty( $param['screen_more'] ) ? $param['screen_more'] : 1024;

$include_mobile = isset( $param['include_mobile'] ) ? $param['include_mobile'] : 0;
$screen         = ! empty( $param['screen'] ) ? $param['screen'] : 480;