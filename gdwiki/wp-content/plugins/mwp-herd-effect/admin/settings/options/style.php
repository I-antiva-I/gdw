<?php
/**
 * Style parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

//region Location
$herd_top = array(
	'label'    => esc_attr__( 'Top', 'herd-effects' ),
	'attr'     => [
		'name'  => 'param[herd_top]',
		'id'    => 'herd_top',
		'value' => isset( $param['herd_top'] ) ? $param['herd_top'] : '10',
		'min'   => '0',
		'step'  => '0.01',
	],
	'checkbox' => [
		'name'  => 'param[include_herd_top]',
		'id'    => 'include_herd_top',
		'value' => isset( $param['include_herd_top'] ) ? $param['include_herd_top'] : 1,
	],
	'addon'    => [
		'name'    => 'param[herd_top_unit]',
		'value'   => isset( $param['herd_top_unit'] ) ? $param['herd_top_unit'] : '%',
		'id'      => 'herd_top_unit',
		'options' => [
			'%'  => esc_attr__( '%', 'herd-effects' ),
			'px' => esc_attr__( 'px', 'herd-effects' ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the top edge of the screen.', 'herd-effects' ),
);

$herd_bottom = array(
	'label'    => esc_attr__( 'Bottom', 'herd-effects' ),
	'attr'     => [
		'name'  => 'param[herd_bottom]',
		'id'    => 'herd_bottom',
		'value' => isset( $param['herd_bottom'] ) ? $param['herd_bottom'] : '10',
		'min'   => '0',
		'step'  => '0.01',
	],
	'checkbox' => [
		'name'  => 'param[include_herd_bottom]',
		'id'    => 'include_herd_bottom',
		'value' => isset( $param['include_herd_bottom'] ) ? $param['include_herd_bottom'] : 0,
	],
	'addon'    => [
		'name'    => 'param[herd_bottom_unit]',
		'value'   => isset( $param['herd_bottom_unit'] ) ? $param['herd_bottom_unit'] : '%',
		'id'      => 'herd_bottom_unit',
		'options' => [
			'%'  => esc_attr__( '%', 'herd-effects' ),
			'px' => esc_attr__( 'px', 'herd-effects' ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the bottom edge of the screen.', 'herd-effects' ),
);

$herd_left = array(
	'label'    => esc_attr__( 'Left', 'herd-effects' ),
	'attr'     => [
		'name'  => 'param[herd_left]',
		'id'    => 'herd_left',
		'value' => isset( $param['herd_left'] ) ? $param['herd_left'] : '10',
		'min'   => '0',
		'step'  => '0.01',
	],
	'checkbox' => [
		'name'  => 'param[include_herd_left]',
		'id'    => 'include_herd_left',
		'value' => isset( $param['include_herd_left'] ) ? $param['include_herd_left'] : 0,
	],
	'addon'    => [
		'name'    => 'param[herd_left_unit]',
		'value'   => isset( $param['herd_left_unit'] ) ? $param['herd_left_unit'] : '%',
		'id'      => 'herd_left_unit',
		'options' => [
			'%'  => esc_attr__( '%', 'herd-effects' ),
			'px' => esc_attr__( 'px', 'herd-effects' ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the left edge of the screen.', 'herd-effects' ),
);

$herd_right = array(
	'label'    => esc_attr__( 'Right', 'herd-effects' ),
	'attr'     => [
		'name'  => 'param[herd_right]',
		'id'    => 'herd_right',
		'value' => isset( $param['herd_right'] ) ? $param['herd_right'] : '10',
		'min'   => '0',
		'step'  => '0.01',
	],
	'checkbox' => [
		'name'  => 'param[include_herd_right]',
		'id'    => 'include_herd_right',
		'value' => isset( $param['include_herd_right'] ) ? $param['include_herd_right'] : 1,
	],
	'addon'    => [
		'name'    => 'param[herd_right_unit]',
		'value'   => isset( $param['herd_right_unit'] ) ? $param['herd_right_unit'] : '%',
		'id'      => 'herd_right_unit',
		'options' => [
			'%'  => esc_attr__( '%', 'herd-effects' ),
			'px' => esc_attr__( 'px', 'herd-effects' ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the right edge of the screen.', 'herd-effects' ),
);
//endregion

//region Title
$title_size = array(
	'label'   => esc_attr__( 'Font Size', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[title_size]',
		'id'    => 'title_size',
		'value' => isset( $param['title_size'] ) ? $param['title_size'] : '16',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the font size for Title', 'herd-effects' ),
);

$title_line_height = array(
	'label'   => esc_attr__( 'Line Height', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[title_line_height]',
		'id'    => 'title_line_height',
		'value' => isset( $param['title_line_height'] ) ? $param['title_line_height'] : '32',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The line-height property defines the amount of space above and below inline elements', 'herd-effects' ),
);

$title_font = array(
	'label'   => esc_attr__( 'Font Family', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[title_font]',
		'id'    => 'title_font',
		'value' => isset( $param['title_font'] ) ? $param['title_font'] : 'inherit',
	],
	'options' => [
		'inherit'         => esc_attr__( 'Use Your Themes', 'herd-effects' ),
		'Tahoma'          => 'Tahoma',
		'Georgia'         => 'Georgia',
		'Comic Sans MS'   => 'Comic Sans MS',
		'Arial'           => 'Arial',
		'Lucida Grande'   => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	],
	'tooltip' => esc_attr__( 'Select the Font for Title', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);

$title_font_weight = array(
	'label'   => esc_attr__( 'Font Weight', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[title_font_weight]',
		'id'    => 'title_font_weight',
		'value' => isset( $param['title_font_weight'] ) ? $param['title_font_weight'] : 'bolder',
	],
	'options' => [
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
	],
	'tooltip' => esc_attr__( 'Set the Font weight for Title.', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);

$title_font_style = array(
	'label'   => esc_attr__( 'Font Style', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[title_font_style]',
		'id'    => 'title_font_style',
		'value' => isset( $param['title_font_style'] ) ? $param['title_font_style'] : 'normal',
	],
	'options' => [
		'normal' => 'Normal',
		'italic' => 'Italic',
	],

	'icon'    => '',
	'func'    => '',
);

$title_align = array(
	'label'   => esc_attr__( 'Align', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[title_align]',
		'id'    => 'title_align',
		'value' => isset( $param['title_align'] ) ? $param['title_align'] : 'left',
	],
	'options' => [
		'left'   => 'Left',
		'center' => 'Center',
		'right'  => 'Right',
	],

	'icon'    => '',
	'func'    => '',
);

$title_color = array(
	'label'   => esc_attr__( 'Color', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/white.jpg',
	],
	'tooltip' => esc_attr__( 'Set Title color', 'herd-effects' ),
	'icon'    => '',
);
//endregion

//region Content
$content_width = array(
	'label'   => esc_attr__( 'Block Width', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 200,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set content block width', 'herd-effects' ),
);

$content_height = array(
	'label'   => esc_attr__( 'Block Height', 'herd-effects' ),
	'attr'  => [
		'type'        => 'text',
		'value'       => 'auto',
	],
	'addon'   => [
		'unit' => 'auto',
	],
	'tooltip' => esc_attr__( 'Set content block height.', 'herd-effects' ),
);

$content_size = array(
	'label'   => esc_attr__( 'Font Size', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[content_size]',
		'id'    => 'content_size',
		'value' => isset( $param['content_size'] ) ? $param['content_size'] : '14',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the font size for content', 'herd-effects' ),
);

$content_font = array(
	'label'   => esc_attr__( 'Font Family', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[content_font]',
		'id'    => 'content_font',
		'value' => isset( $param['content_font'] ) ? $param['content_font'] : 'inherit',
	],
	'options' => [
		'inherit'         => esc_attr__( 'Use Your Themes', 'herd-effects' ),
		'Sans-Serif'      => 'Sans-Serif',
		'Tahoma'          => 'Tahoma',
		'Georgia'         => 'Georgia',
		'Comic Sans MS'   => 'Comic Sans MS',
		'Arial'           => 'Arial',
		'Lucida Grande'   => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	],
	'tooltip' => esc_attr__( 'Select the Font for Content.', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);

$content_line_height = array(
	'label'   => esc_attr__( 'Line Height', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[content_line_height]',
		'id'    => 'content_line_height',
		'value' => isset( $param['content_line_height'] ) ? $param['content_line_height'] : '18',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The line-height property defines the amount of space above and below inline elements', 'herd-effects' ),
);

$bg_color = array(
	'label' => esc_attr__( 'Background', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/black.jpg',
	],
	'icon'  => '',
);

$text_color = array(
	'label' => esc_attr__( 'Text Color', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/white.jpg',
	],
);
//endregion

//region Icon
$icon_width = array(
	'label'   => esc_attr__( 'Block Width', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 60,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set Image block width', 'herd-effects' ),
);

$icon_size = array(
	'label'   => esc_attr__( 'Size', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[icon_size]',
		'id'    => 'icon_size',
		'value' => isset( $param['icon_size'] ) ? $param['icon_size'] : '40',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the size for Icon', 'herd-effects' ),
);

$icon_bg = isset( $param['bg_color'] ) ? $param['bg_color'] : 'rgba(0,0,0,0.75)';

$icon_background = array(
	'label' => esc_attr__( 'Background', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/black.jpg',
	],

	'icon'  => '',
);

$icon_color = array(
	'label' => esc_attr__( 'Color', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/white.jpg',
	],

	'icon'  => '',
);
//endregion

//region Close Button
$show_close = array(
	'label'   => esc_attr__( 'Show Close Button', 'herd-effects' ),
	'attr'    => [
		'name'        => 'param[show_close]',
		'id'          => 'show_close',
		'value'       => isset( $param['show_close'] ) ? $param['show_close'] : '',

	],

	'icon'    => '',
);

$close_size = array(
	'label'   => esc_attr__( 'Size', 'herd-effects' ),
	'attr'    => [
		'name'  => 'param[close_size]',
		'id'    => 'close_size',
		'value' => isset( $param['close_size'] ) ? $param['close_size'] : '24',
		'min'   => '1',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the font size for Close Button.', 'herd-effects' ),
);

$close_color = array(
	'label' => esc_attr__( 'Color', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/white.jpg',
	],
	'icon'  => '',
);
//endregion

//region Border
$border_radius = array(
	'label'   => esc_attr__( 'Radius', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 0,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border radius.', 'herd-effects' ),
);

$border_style = array(
	'label'   => esc_attr__( 'Style', 'herd-effects' ),
	'attr'  => [
		'type'        => 'select',
		'value'       => 'None',
	],
	'tooltip' => esc_attr__( 'Choose a border style.', 'herd-effects' ),
);

$border_width = array(
	'label'   => esc_attr__( 'Thickness', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 0,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border width.', 'herd-effects' ),
);

$border_color = array(
	'label' => esc_attr__( 'Color', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/border.jpg',
	],
	'help'  => '',
	'icon'  => '',
);

//endregion

//region Shadow
$shadow = array(
	'label'   => esc_attr__( 'Shadow', 'herd-effects' ),
	'attr'  => [
		'type'        => 'select',
		'value'       => 'None',
	],
	'tooltip' => esc_attr__( 'Set the box shadow.', 'herd-effects' ),
	'icon'    => '',
	'func'    => '',
);

$shadow_h_offset = array(
	'label'   => esc_attr__( 'Horizontal Position', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 0,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The horizontal offset of the shadow. A positive value puts the shadow on the right side of the box, a negative value puts the shadow on the left side of the box.', 'herd-effects' ),
);

$shadow_v_offset = array(
	'label'   => esc_attr__( 'Vertical Position', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 0,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The vertical offset of the shadow. A positive value puts the shadow below the box, a negative value puts the shadow above the box.', 'herd-effects' ),
);

$shadow_blur = array(
	'label'   => esc_attr__( 'Blur', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 0,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The blur radius. The higher the number, the more blurred the shadow will be.', 'herd-effects' ),
);

$shadow_spread = array(
	'label'   => esc_attr__( 'Spread', 'herd-effects' ),
	'attr'  => [
		'type'        => 'number',
		'value'       => 0,
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The spread radius. A positive value increases the size of the shadow, a negative value decreases the size of the shadow.', 'herd-effects' ),
);

$shadow_color = array(
	'label'   => esc_attr__( 'Color', 'herd-effects' ),
	'attr'  => [
		'type'        => 'color',
		'value'       => $this->plugin['url'].'admin/assets/img/black.jpg',
	],
	'tooltip' => esc_attr__( 'The color of the shadow.', 'herd-effects' ),
	'icon'    => '',
);
//endregion
