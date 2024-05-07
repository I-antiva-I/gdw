<?php
/**
 * Settings parameters
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


$type = array(
	'label'   => esc_attr__( 'Type of counter', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[type]',
		'id'    => 'counterType',
		'value' => isset( $param['type'] ) ? $param['type'] : '',
	],
	'options' => [
		'CountToDate'    => esc_attr__( 'Countdown to date', 'counter_box' ),
		'ContFromDate'   => esc_attr__( 'Count from date', 'counter_box' ),
		'CountToWeekday' => esc_attr__( 'Countdown to week day', 'counter_box' ),
		'Timer'          => esc_attr__( 'Timer', 'counter_box' ),
		'UserTimer'      => esc_attr__( 'Timer for each user', 'counter_box' ),
		'TimerStopGo'    => esc_attr__( 'Timer Stop & Go', 'counter_box' ),
		'Counter'        => esc_attr__( 'Counter', 'counter_box' ),
	],
	'help'    => esc_attr__( 'More about types on https://wow-estore.com/doc/counter-box-pro-main-settings/', 'counter_box' ),
);

$default_date = !isset( $param['date'] ) ? date('Y-m-d') : '';

$date = array(
	'label'   => esc_attr__( 'Date', 'counter_box' ),
	'attr'    => [
		'name'        => 'param[date]',
		'id'          => 'counterDate',
		'value'       => isset( $param['date'] ) ? $param['date'] : $default_date,
		'placeholder' => esc_attr__( '', 'counter_box' ),
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'icon'    => '',
	'tooltip' => esc_attr__( 'Enter the date', 'counter_box' ),
);

$time = array(
	'label'   => esc_attr__( 'Time', 'counter_box' ),
	'attr'    => [
		'name'        => 'param[time]',
		'id'          => 'counterTime',
		'value'       => isset( $param['time'] ) ? $param['time'] : '23:59',
		'placeholder' => esc_attr__( '', 'counter_box' ),
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'icon'    => '',
	'tooltip' => esc_attr__( 'Enter the time', 'counter_box' ),
);

$weekday = array(
	'label'   => esc_attr__( 'Day of the week', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[dayweek]',
		'id'    => 'dayweek',
		'value' => isset( $param['dayweek'] ) ? $param['dayweek'] : 'everyday',
	],
	'options' => [
		'everyday'  => esc_attr__( 'Everyday', 'counter_box' ),
		'Monday'    => esc_attr__( 'Monday', 'counter_box' ),
		'Tuesday'   => esc_attr__( 'Tuesday', 'counter_box' ),
		'Wednesday' => esc_attr__( 'Wednesday', 'counter_box' ),
		'Thursday'  => esc_attr__( 'Thursday', 'counter_box' ),
		'Friday'    => esc_attr__( 'Friday', 'counter_box' ),
		'Saturday'  => esc_attr__( 'Saturday', 'counter_box' ),
		'Sunday'    => esc_attr__( 'Sunday ', 'counter_box' ),

	],
	'tooltip' => esc_attr__( 'Set the countdown for day of week. Countdown will be to the time of weekday and then refresh', 'counter_box' ),
);

$timezone = array(
	'label'   => esc_attr__( 'Timezone', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[timezone]',
		'id'    => 'timezone',
		'value' => isset( $param['timezone'] ) ? $param['timezone'] : '+00:00',
	],
	'options' => [
		'-12:00' => esc_attr__( '-12:00', 'counter_box' ),
		'-11:30' => esc_attr__( '-11:30', 'counter_box' ),
		'-11:00' => esc_attr__( '-11:00', 'counter_box' ),
		'-10:30' => esc_attr__( '-10:30', 'counter_box' ),
		'-10:00' => esc_attr__( '-10:00', 'counter_box' ),
		'-09:30' => esc_attr__( '-09:30', 'counter_box' ),
		'-09:00' => esc_attr__( '-09:00', 'counter_box' ),
		'-08:30' => esc_attr__( '-08:30', 'counter_box' ),
		'-08:00' => esc_attr__( '-08:00', 'counter_box' ),
		'-07:30' => esc_attr__( '-07:30', 'counter_box' ),
		'-07:00' => esc_attr__( '-07:00', 'counter_box' ),
		'-06:30' => esc_attr__( '-06:30', 'counter_box' ),
		'-06:00' => esc_attr__( '-06:00', 'counter_box' ),
		'-05:30' => esc_attr__( '-05:30', 'counter_box' ),
		'-05:00' => esc_attr__( '-05:00', 'counter_box' ),
		'-04:30' => esc_attr__( '-04:30', 'counter_box' ),
		'-04:00' => esc_attr__( '-04:00', 'counter_box' ),
		'-03:30' => esc_attr__( '-03:30', 'counter_box' ),
		'-03:00' => esc_attr__( '-03:00', 'counter_box' ),
		'-02:30' => esc_attr__( '-02:30', 'counter_box' ),
		'-02:00' => esc_attr__( '-02:00', 'counter_box' ),
		'-01:30' => esc_attr__( '-01:30', 'counter_box' ),
		'-01:00' => esc_attr__( '-01:00', 'counter_box' ),
		'-00:30' => esc_attr__( '-00:30', 'counter_box' ),
		'+00:00' => esc_attr__( '00:00', 'counter_box' ),
		'+0:30'  => esc_attr__( '+0:30', 'counter_box' ),
		'+01:00' => esc_attr__( '+01:00', 'counter_box' ),
		'+1:30'  => esc_attr__( '+1:30', 'counter_box' ),
		'+02:00' => esc_attr__( '+02:00', 'counter_box' ),
		'+02:30' => esc_attr__( '+02:30', 'counter_box' ),
		'+03:00' => esc_attr__( '+03:00', 'counter_box' ),
		'+03:30' => esc_attr__( '+03:30', 'counter_box' ),
		'+04:00' => esc_attr__( '+04:00', 'counter_box' ),
		'+04:30' => esc_attr__( '+04:30', 'counter_box' ),
		'+05:00' => esc_attr__( '+05:00', 'counter_box' ),
		'+5:30'  => esc_attr__( '+5:30', 'counter_box' ),
		'+05:45' => esc_attr__( '+05:45', 'counter_box' ),
		'+06:00' => esc_attr__( '+06:00', 'counter_box' ),
		'+06:30' => esc_attr__( '+06:30', 'counter_box' ),
		'+07:00' => esc_attr__( '+07:00', 'counter_box' ),
		'+07:30' => esc_attr__( '+07:30', 'counter_box' ),
		'+08:00' => esc_attr__( '+08:00', 'counter_box' ),
		'+08:30' => esc_attr__( '+08:30', 'counter_box' ),
		'+08:45' => esc_attr__( '+08:45', 'counter_box' ),
		'+09:00' => esc_attr__( '+09:00', 'counter_box' ),
		'+09:30' => esc_attr__( '+09:30', 'counter_box' ),
		'+10:00' => esc_attr__( '+10:00', 'counter_box' ),
		'+10:30' => esc_attr__( '+10:30', 'counter_box' ),
		'+11:00' => esc_attr__( '+11:00', 'counter_box' ),
		'+11:30' => esc_attr__( '+11:30', 'counter_box' ),
		'+12:00' => esc_attr__( '+12:00', 'counter_box' ),
		'+12:45' => esc_attr__( '+12:45', 'counter_box' ),
		'+13:00' => esc_attr__( '+13:00', 'counter_box' ),
		'+13:45' => esc_attr__( '+13:45', 'counter_box' ),
		'+14:00' => esc_attr__( '+14:00', 'counter_box' ),

	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'icon'    => '',
	'func'    => '',
	'tooltip' => esc_attr__( 'Set timezone for counter.', 'counter_box' )
);

$day = array(
	'label'   => esc_attr__( 'Days', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[day]',
		'id'    => 'counterDay',
		'value' => isset( $param['day'] ) ? $param['day'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'tooltip' => esc_attr__( 'Set the days for timer', 'counter_box' ),
);

$hours = array(
	'label'   => esc_attr__( 'Hours', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[hours]',
		'id'    => 'counterHours',
		'value' => isset( $param['hours'] ) ? $param['hours'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'tooltip' => esc_attr__( 'Set the hours for timer', 'counter_box' ),
);

$minutes = array(
	'label'   => esc_attr__( 'Minutes', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[minutes]',
		'id'    => 'counterMinutes',
		'value' => isset( $param['minutes'] ) ? $param['minutes'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'tooltip' => esc_attr__( 'Set the minutes for timer', 'counter_box' ),
);

$seconds = array(
	'label'   => esc_attr__( 'Seconds', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[seconds]',
		'id'    => 'counterSeconds',
		'value' => isset( $param['seconds'] ) ? $param['seconds'] : '10',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'tooltip' => esc_attr__( 'Set the seconds for timer', 'counter_box' ),
);

$start = array(
//	'label' => esc_attr__( 'Starting number', 'counter_box' ),
	'attr'  => [
		'name'  => 'param[start]',
		'id'    => 'start',
		'class' => 'check-number',
		'value' => isset( $param['start'] ) ? $param['start'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'start',
	],
	'help'  => esc_attr__( '', 'counter_box' ),
);

$finish = array(
//	'label' => esc_attr__( 'Finish number', 'counter_box' ),
	'attr'  => [
		'name'  => 'param[finish]',
		'id'    => 'finish',
		'class' => 'check-number',
		'value' => isset( $param['finish'] ) ? $param['finish'] : '5',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'finish',
	],

	'help'  => esc_attr__( '', 'counter_box' ),
);

$speed_min = array(
	'label' => esc_attr__( '', 'counter_box' ),
	'attr' => [
		'name'   => 'param[speed_min]',
		'id'     => 'speed_min',
		'class' => 'check-number',
		'value'    => isset( $param['speed_min'] ) ? $param['speed_min'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'min',
	],
	'help' => esc_attr__( '', 'counter_box' ),
);

$speed_max = array(
	'label' => esc_attr__( '', 'counter_box' ),
	'attr' => [
		'name'   => 'param[speed_max]',
		'id'     => 'speed_max',
		'class' => 'check-number',
		'value'    => isset( $param['speed_max'] ) ? $param['speed_max'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'max',
	],
	'help' => esc_attr__( '', 'counter_box' ),
);

$increment_min = array(
	'label' => esc_attr__( '', 'counter_box' ),
	'attr' => [
		'name'   => 'param[increment_min]',
		'id'     => 'increment_min',
		'class' => 'check-number',
		'value'    => isset( $param['increment_min'] ) ? $param['increment_min'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'min',
	],
	'help' => esc_attr__( '', 'counter_box' ),
);

$increment_max = array(
	'label' => esc_attr__( '', 'counter_box' ),
	'attr' => [
		'name'   => 'param[increment_max]',
		'id'     => 'increment_max',
		'class' => 'check-number',
		'value'    => isset( $param['increment_max'] ) ? $param['increment_max'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'max',
	],
	'help' => esc_attr__( '', 'counter_box' ),
);

$rounding = array(
	'label' => esc_attr__( 'Rounding numbers', 'counter_box' ),
	'attr' => [
		'name'   => 'param[rounding]',
		'id'     => 'rounding',
		'value'    => isset( $param['rounding'] ) ? $param['rounding'] : '0',
		'min'         => '0',
		'step'        => '1',
	],
	'help' => esc_attr__( '', 'counter_box' ),
	'tooltip' => esc_attr__( 'Rounds the number after the decimal point. Enter the required number of decimal places', 'counter_box' ),
);

$delimiter = array(
	'label'   => esc_attr__( 'Delimiter of number', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[delimiter]',
		'id'    => 'delimiter',
		'value' => isset( $param['delimiter'] ) ? $param['delimiter'] : '0',
	],

	'help'    => esc_attr__( '', 'counter_box' ),
	'icon'    => '',
	'func'    => '',
	'tooltip' => esc_attr__( 'Divide numbers by digits', 'counter_box' ),
);

$remember = array(
	'label'   => esc_attr__( 'Remember number for user', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[remember]',
		'id'    => 'remember',
		'value' => isset( $param['remember'] ) ? $param['remember'] : '0',
	],
	'help'    => esc_attr__( '', 'counter_box' ),
	'icon'    => '',
	'func'    => '',
	'tooltip' => esc_attr__( 'Remember numbers for user', 'counter_box' ),
);