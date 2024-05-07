<?php
/**
 * Content for notification
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$content = array(
	'label' => esc_attr__( 'Content', 'counter_box' ),
	'attr'  => [
		'name'  => 'param[content]',
		'id'    => 'counterBoxContent',
		'value' => isset( $param['content'] ) ? $param['content'] : '',
	],
);
