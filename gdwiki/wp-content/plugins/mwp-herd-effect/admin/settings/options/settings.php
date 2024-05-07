<?php
/**
 * Notification settings parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

//region Notification link
$herd_link = array(
	'label' => esc_attr__( 'Link', 'herd-effects' ),
	'attr'  => [
		'type'        => 'text',
		'value'       => '',
	],
	'tooltip'  => esc_attr__( 'Enter the link for the notification or live empty.', 'herd-effects' ),
	'icon'  => '',
);

$click_link = array(
	'label' => esc_attr__( 'Don\'t show after click', 'herd-effects' ),
	'attr'  => [
		'type'        => 'checkbox',
		'value'       => '',
	],
	'tooltip'  => esc_attr__( 'Don\'t show the notification after when user click on it.', 'herd-effects' ),
	'icon'  => '',
);

$link_target = array(
	'label'   => esc_attr__( 'Link target', 'herd-effects' ),
	'attr'  => [
		'type'        => 'select',
		'value'       => 'In the same frame',
	],
	'icon'    => '',
	'func'    => '',
);
//endregion

//region Show notification
$sec_step = array(
	'label'   => esc_attr__( 'Appearance mode', 'herd-effects' ),
	'attr'    => [
		'type'  => 'select',
		'value' => 'Stable',
	],
	'tooltip'    => esc_attr__( 'Select how do you want that notification will show: stable or random time', 'herd-effects' ),
	'icon'    => '',
	'func'    => 'steps',
);

$speed = array(
	'label' => esc_attr__( 'Show every', 'herd-effects' ),
	'attr' => [
		'name'   => 'param[speed]',
		'id'     => 'speed',
		'value'    => isset( $param['speed'] ) ? $param['speed'] : '5',
		'min'         => '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'sec',
	],
	'tooltip' => esc_attr__( 'Set the time period in sec. The notification will be shown after an equal period of time.', 'herd-effects' ),
);

$auto_close = array(
	'label' => esc_attr__( 'Auto-close', 'herd-effects' ),
	'attr' => [
		'type'   => 'number',
		'value'    => '7',
	],
	'addon' => [
		'unit' => 'sec',
	],
	'tooltip' => esc_attr__( 'Set the time for showing the notification on the page before it will close.', 'herd-effects' ),
);

$number = array(
	'label' => esc_attr__( 'Number of notifications', 'herd-effects' ),
	'attr' => [
		'name'   => 'param[number]',
		'id'     => 'number',
		'value'    => isset( $param['number'] ) ? $param['number'] : '3',
		'min'         => '0',
		'step'        => '1',
	],
	'tooltip' => esc_attr__( 'How many notifications will show one user on the page.', 'herd-effects' ),
);
//endregion

//region Animation
$window_animate = array(
	'label' => esc_attr__( 'Animation In', 'herd-effects' ),
	'attr'    => [
		'type'  => 'select',
		'value' => 'bounceIn',
	],
	'tooltip'    => esc_attr__( 'Specify notification transition open effect.', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);

$window_animate_out = array(
	'label' => esc_attr__( 'Animation Out', 'herd-effects' ),
	'attr'    => [
		'type'  => 'select',
		'value' => 'bounceOut',
	],
	'tooltip'    => esc_attr__( 'Specify notification transition close effect.', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);
//endregion



