<?php
/**
 * Content for notification
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Icon includes
$icons_dir = $this->plugin['dir'];
include_once( $icons_dir . 'vendors/fontawesome/icons.php' );
$icons_new = array();
foreach ( $icons as $key => $value ) {
	$icons_new[ $value ] = $value;
}

$herd_title = array(
	'label' => esc_attr__( 'Title', 'herd-effects' ),
	'attr'  => [
		'name'        => 'param[herd_title]',
		'id'          => 'herd_title',
		'value'       => isset( $param['herd_title'] ) ? $param['herd_title'] : '',
		'placeholder' => esc_attr__( 'Enter notification title', 'herd-effects' ),
	],
	'tooltip'  => 'If left the empty, the notification will be without a title',
	'icon'  => '',
);

$image_type_default = isset( $param['herd_custom'] ) ? $param['herd_custom'] : 'icon';

$image_type = array(
	'label'   => esc_attr__( 'Icon type', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[image_type]',
		'id'    => 'image_type',
		'value' => isset( $param['image_type'] ) ? $param['image_type'] : $image_type_default,
	],
	'options' => [
		'icon'   => esc_attr__( 'Font Awesome Icons', 'herd-effects' ),
		'custom' => esc_attr__( 'Custom', 'herd-effects' ),
	],
	'help'    => '',
	'icon'    => '',
	'func'    => 'iconType',
);

$menu_icon = array(
	'label'   => esc_attr__( 'Icon', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[menu_icon]',
		'id'    => 'menu_icon',
		'value' => isset( $param['menu_icon'] ) ? $param['menu_icon'] : '',
		'class' => 'icons',
	],
	'options' => $icons_new,
	'tooltip'    => 'Select the Icon for notification',
	'icon'    => '',
);

$herd_custom_link = array(
	'label' => esc_attr__( 'Custom Image', 'herd-effects' ),
	'attr'  => [
		'name'        => 'param[herd_custom_link]',
		'id'          => 'herd_custom_link',
		'value'       => isset( $param['herd_custom_link'] ) ? $param['herd_custom_link'] : '',
		'placeholder' => esc_attr__( 'Enter Icon URL', 'herd-effects' ),
	],
	'tooltip'  => 'Download icon on site and then enter the URL to icon',
	'icon'  => '',
);

$herd_text = array(
	'label' => esc_attr__( 'Notification Content', 'herd-effects' ),
	'attr'  => [
		'name'  => 'param[herd_text]',
		'id'    => 'herd_text',
		'value' => isset( $param['herd_text'] ) ? $param['herd_text'] : '[variable1] from [variable2] has just bought [variable3] [amount] minutes ago.',
	],
	'help'  => 'Enter the text for notification using the variables for dynamic change text. Use shortcodes for variables like [amount] or [variable1]',
);

