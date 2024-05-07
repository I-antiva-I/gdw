<?php
/**
 * Variables parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$amount_min = array(
	'label' => esc_attr__( 'Amount min', 'herd-effects' ),
	'attr' => [
		'name'   => 'param[amount_min]',
		'id'     => 'amount_min',
		'value'    => isset( $param['amount_min'] ) ? $param['amount_min'] : '1000',
		'min'         => '0',
		'step'        => '1',
	],
	'help' => 'Enter the min amount for dynamic creating the amount',
);

$amount_max = array(
	'label' => esc_attr__( 'Amount max', 'herd-effects' ),
	'attr' => [
		'name'   => 'param[amount_max]',
		'id'     => 'amount_max',
		'value'    => isset( $param['amount_max'] ) ? $param['amount_max'] : '2500',
		'min'         => '0',
		'step'        => '1',
	],
	'help' => 'Enter the max amount for dynamic creating the amount',
);


$herd_name = array(
	'attr' => [
		'name'   => 'param[herd_name]',
		'id'     => 'herd_name',
		'value'    => isset( $param['herd_name'] ) ? $param['herd_name'] : '',
		'placeholder' => 'Enter the values separated by comma.',

	],
	'help' => 'If you need to use a character &#39; in the value, use it with a backslash \&#39;',
);

$herd_city = array(
	'attr' => [
		'name'   => 'param[herd_city]',
		'id'     => 'herd_city',
		'value'    => isset( $param['herd_city'] ) ? $param['herd_city'] : '',
		'placeholder' => 'Enter the values separated by comma.',

	],
	'help' => 'If you need to use a character &#39; in the value, use it with a backslash \&#39;',
);

$herd_product = array(
	'attr' => [
		'name'   => 'param[herd_product]',
		'id'     => 'herd_product',
		'value'    => isset( $param['herd_product'] ) ? $param['herd_product'] : '',
		'placeholder' => 'Enter the values separated by comma.',

	],
	'help' => 'If you need to use a character &#39; in the value, use it with a backslash \&#39;',
);

$variable4 = array(
	'attr' => [
		'name'   => 'param[variable4]',
		'id'     => 'variable4',
		'value'    => isset( $param['variable4'] ) ? $param['variable4'] : '',
		'placeholder' => 'Enter the values separated by comma.',

	],
	'help' => 'If you need to use a character &#39; in the value, use it with a backslash \&#39;',
);

$variable5 = array(
	'attr' => [
		'name'   => 'param[variable5]',
		'id'     => 'variable5',
		'value'    => isset( $param['variable5'] ) ? $param['variable5'] : '',
		'placeholder' => 'Enter the values separated by comma.',

	],
	'help' => 'If you need to use a character &#39; in the value, use it with a backslash \&#39;',
);
