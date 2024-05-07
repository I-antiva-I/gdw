<?php
/**
 * Param style
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$width = array(
	'label'   => esc_attr__( 'Width', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[width]',
		'id'    => 'width',
		'value' => isset( $param['width'] ) ? $param['width'] : '30',
		'min'   => '0',
	],
	'addon'   => [
		'name'    => 'param[width_unit]',
		'value'   => isset( $param['width_unit'] ) ? $param['width_unit'] : 'auto',
		'id'    => 'widthUnit',
		'options' => [
			'auto' => esc_attr__( 'auto', 'counter_box' ),
			'px'   => esc_attr__( 'px', 'counter_box' ),
		],
	],
	'tooltip' => esc_attr__( 'Set the width for counter element.', 'counter_box' ),
);

$height = array(
	'label'   => esc_attr__( 'Height', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[height]',
		'id'    => 'height',
		'value' => isset( $param['height'] ) ? $param['height'] : '30',
		'min'   => '0',
	],
	'addon'   => [
		'name'    => 'param[height_unit]',
		'id'    => 'heightUnit',
		'value'   => isset( $param['height_unit'] ) ? $param['height_unit'] : 'auto',
		'options' => [
			'auto' => esc_attr__( 'auto', 'counter_box' ),
			'px'   => esc_attr__( 'px', 'counter_box' ),
		],
	],
	'tooltip' => esc_attr__( 'Set the height for counter element.', 'counter_box' ),
);

$background = array(
	'label'   => esc_attr__( 'Background', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[background]',
		'id'    => 'background',
		'value' => isset( $param['background'] ) ? $param['background'] : 'rgba(255, 255, 255, 0)',
	],
	'tooltip' => esc_attr__( 'Background of element.', 'counter_box' ),
);

$border_radius = array(
	'label'   => esc_attr__( 'Border Radius', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[border_radius]',
		'id'    => 'border_radius',
		'value' => isset( $param['border_radius'] ) ? $param['border_radius'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border radius.', 'counter_box' ),
);

$border_style = array(
	'label'   => esc_attr__( 'Border Style', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[border_style]',
		'id'    => 'border_style',
		'value' => isset( $param['border_style'] ) ? $param['border_style'] : 'none',
	],
	'options' => [
		'none'   => esc_attr__( 'None', 'counter_box' ),
		'solid'  => esc_attr__( 'Solid', 'counter_box' ),
		'dotted' => esc_attr__( 'Dotted', 'counter_box' ),
		'dashed' => esc_attr__( 'Dashed', 'counter_box' ),
		'double' => esc_attr__( 'Double', 'counter_box' ),
		'groove' => esc_attr__( 'Groove', 'counter_box' ),
		'inset'  => esc_attr__( 'Inset', 'counter_box' ),
		'outset' => esc_attr__( 'Outset', 'counter_box' ),
		'ridge'  => esc_attr__( 'Ridge', 'counter_box' ),
	],
	'tooltip' => esc_attr__( 'Choose a border style.', 'counter_box' ),
//	'func'    => 'checkBorder()',
);

$border_width = array(
	'label'   => esc_attr__( 'Border Thickness', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[border_width]',
		'id'    => 'border_width',
		'value' => isset( $param['border_width'] ) ? $param['border_width'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border width.', 'counter_box' ),
);

$border_color = array(
	'label' => esc_attr__( 'Border Color', 'counter_box' ),
	'attr'  => [
		'name'  => 'param[border_color]',
		'id'    => 'border_color',
		'value' => isset( $param['border_color'] ) ? $param['border_color'] : 'rgba(255, 255, 255, 0)',

	],
);
