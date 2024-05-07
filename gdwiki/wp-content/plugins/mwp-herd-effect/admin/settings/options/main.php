<?php
/**
 * Main Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tax_args   = array(
	'public'   => true,
	'_builtin' => false,
);
$output     = 'names';
$operator   = 'and';
$taxonomies = get_taxonomies( $tax_args, $output, $operator );

$show_option = array(
	'all'        => esc_attr__( 'All posts and pages', 'herd-effects' ),
	'onlypost'   => esc_attr__( 'All posts', 'herd-effects' ),
	'onlypage'   => esc_attr__( 'All pages', 'herd-effects' ),
	'posts'      => esc_attr__( 'Posts with certain IDs', 'herd-effects' ),
	'pages'      => esc_attr__( 'Pages with certain IDs', 'herd-effects' ),
	'postsincat' => esc_attr__( 'Posts in Categorys with IDs', 'herd-effects' ),
	'expost'     => esc_attr__( 'All posts. except...', 'herd-effects' ),
	'expage'     => esc_attr__( 'All pages, except...', 'herd-effects' ),
	'shortecode' => esc_attr__( 'Where shortcode is inserted', 'herd-effects' ),
);
if ( $taxonomies ) {
	$show_option['taxonomy'] = esc_attr__( 'Taxonomy', 'herd-effects' );
}

$herd_show = isset( $param['herd_show'] ) ? $param['herd_show'] : 'all';

$show = array(
	'id'     => 'show',
	'name'   => 'param[show]',
	'type'   => 'select',
	'val'    => isset( $param['show'] ) ? $param['show'] : $herd_show,
	'option' => $show_option,
	'func'   => 'showchange(this);',
	'sep'    => '<p/>',
);

$show_help = array(
	'text' => esc_attr__( 'Choose a condition to target to specific content.', 'herd-effects' ),
);

// Taxonomy
$taxonomy_option = array();
if ( $taxonomies ) {
	foreach ( $taxonomies as $taxonomy ) {
		$taxonomy_option[ $taxonomy ] = $taxonomy;
	}
}

$taxonomy = array(
	'id'     => 'taxonomy',
	'name'   => 'param[taxonomy]',
	'type'   => 'select',
	'val'    => isset( $param['taxonomy'] ) ? $param['taxonomy'] : '',
	'option' => $taxonomy_option,
	'sep'    => '<p/>',
);


$herd_id_post = isset( $param['herd_id_post'] ) ? $param['herd_id_post'] : '';

// Content ID'sa
$id_post = array(
	'id'     => 'id_post',
	'name'   => 'param[id_post]',
	'type'   => 'text',
	'val'    => isset( $param['id_post'] ) ? $param['id_post'] : $herd_id_post,
	'option' => array(
		'placeholder' => esc_attr__( 'Enter IDs, separated by comma.', 'herd-effects' ),
	),
	'sep'    => '<p/>',
);
