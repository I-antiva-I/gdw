<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Tergeting settings
 *
 * @package     Lead_Generation
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


//region Schedule
$weekday = array(
	'label'   => esc_attr__( 'Day of the week', 'herd-effects' ),
	'attr'    => [
		'type'  => 'select',
		'value' => esc_attr__( 'Everyday', 'herd-effects' ),
	],
	'tooltip'    => esc_attr__( 'Select the day of the week when the notification will be displayed.', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);


$time_start = array(
	'label' => esc_attr__( 'Time from', 'herd-effects' ),
	'attr'  => [
		'type'        => 'time',
		'value'       => '00:00',
	],
	'tooltip'  => esc_attr__( 'Specify what from time of the day to show the notice', 'herd-effects' ),
	'icon'  => '',
);

$time_end = array(
	'label' => esc_attr__( 'Time to', 'herd-effects' ),
	'attr'  => [
		'type'        => 'time',
		'value'       => '23:59',
	],
	'tooltip'  => esc_attr__( 'Specify what to time of the day to show the notice.', 'herd-effects' ),
	'icon'  => '',
);

$set_dates = array(
	'label' => esc_attr__( 'Set Dates', 'herd-effects' ),
	'attr'  => [
		'type'        => 'checkbox',
		'value'       =>'',
	],
	'tooltip'  => esc_attr__( 'Check this if you want to set the show notification between dates.', 'herd-effects' ),
	'icon'  => '',
	'func'  => 'setDate',
);

//endregion

//region Devices
$screen_more = array(
	'label'    => esc_attr__( 'Don\'t show on screens more', 'herd-effects' ),
	'attr'     => [
		'name'  => 'param[screen_more]',
		'id'    => 'screen_more',
		'value' => isset( $param['screen_more'] ) ? $param['screen_more'] : '1024',
		'min'   => '0',
		'step'  => '1',
	],
	'checkbox' => [
		'name'  => 'param[include_more_screen]',
		'id'    => 'include_more_screen',
		'value' => isset( $param['include_more_screen'] ) ? $param['include_more_screen'] : 0,
	],
	'addon'    => [
		'unit' => 'px',
	],
	'tooltip'     => esc_attr__( 'Specify the window breakpoint when the notification will be shown', 'herd-effects' ),
);

$mobil_show = ! empty( $param['mobil_show'] ) ? $param['mobil_show'] : 0;

$screen = array(
	'label'    => esc_attr__( 'Don\'t show on screens less', 'herd-effects' ),
	'attr'     => [
		'name'  => 'param[screen]',
		'id'    => 'screen',
		'value' => isset( $param['screen'] ) ? $param['screen'] : '480',
		'min'   => '0',
		'step'  => '0.01',
	],
	'checkbox' => [
		'name'  => 'param[include_mobile]',
		'id'    => 'include_mobile',
		'value' => isset( $param['include_mobile'] ) ? $param['include_mobile'] : $mobil_show,
	],
	'addon'    => [
		'unit' => 'px',
	],
	'tooltip'     => esc_attr__( 'Specify the window breakpoint ( min width)', 'herd-effects' ),
);
//endregion

//region Users Role
$item_user = array(
	'label'   => esc_attr__( 'Show for users', 'herd-effects' ),
	'attr'    => [
		'type'  => 'select',
		'value' => esc_attr__( 'All Users', 'herd-effects' ),
	],
	'icon'    => '',
	'func'    => 'userRole',
);

//endregion

//region languages
$umodallang = isset( $param['umodallang '] ) ? $param['umodallang '] : '';

$lang = array(
	'label'    => esc_attr__( 'Enable language dependency', 'herd-effects' ),
	'attr'     => [
		'type'  => 'checkbox',
		'value' => '',
	],
	'tooltip'     => esc_attr__( 'Choose the language in which the notification will be displayed.', 'herd-effects' ),
	'icon'     => '',
	'func'     => '',
);
//endregion

//region Display

$show_option = array(
	'all'        => esc_attr__( 'All posts and pages', 'herd-effects' ),
	'shortecode' => esc_attr__( 'Where shortcode is inserted', 'herd-effects' ),
);

$herd_show = isset( $param['herd_show'] ) ? $param['herd_show'] : 'all';

$show = array(
	'label'   => esc_attr__( 'Display on', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[show]',
		'id'    => 'show',
		'value' => isset( $param['show'] ) ? $param['show'] : $herd_show,
	],
	'options' => $show_option,
	'tooltip'    => esc_attr__( 'Choose a condition to target to specific content.', 'herd-effects' ),
	'icon'    => '',
	'func'    => 'showChange',
);

//endregion

//region Other
$disable_fontawesome = array(
	'label' => esc_attr__( 'Disable Font Awesome 5', 'herd-effects' ),
	'attr'  => [
		'name'        => 'param[disable_fontawesome]',
		'id'          => 'disable_fontawesome',
		'value'       => isset( $param['disable_fontawesome'] ) ? $param['disable_fontawesome'] : '0',
	],
	'tooltip'  => esc_attr__( 'Disable Font Awesome 5 style on front-end of the site.', 'herd-effects' ),
	'icon'  => '',
);

$test_mode = array(
	'label'   => esc_attr__( 'Test mode', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[test_mode]',
		'id'    => 'test_mode',
		'value' => isset( $param['test_mode'] ) ? $param['test_mode'] : 'no',
	],
	'options' => [
		'no'  => esc_attr__( 'No', 'herd-effects' ),
		'yes' => esc_attr__( 'Yes', 'herd-effects' ),
	],
	'tooltip'    => esc_attr__( 'If test mode is enabled, the notification will show for admin only', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);
//endregion