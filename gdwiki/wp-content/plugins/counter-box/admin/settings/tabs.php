<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Tabs menu for Settings
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$tab_elements = array(
	'settings' => esc_attr__( 'Settings', 'counter_box' ),
	'content'  => esc_attr__( 'Content', 'counter_box' ),
	'style'    => esc_attr__( 'Style', 'counter_box' ),
);

$tab_li      = '';
$tab_content = '';
$i           = '1';

echo '<div class="tabs is-centered" id="tab"><ul>';
foreach ( $tab_elements as $key => $val ) {
	$active      = ( $i == 1 ) ? 'is-active' : '';
	echo '<li class="' . esc_attr($active) . ' is-marginless" data-tab="' . absint($i) . '"><a>' . esc_html($val) . '</a></li>';
    $i ++;
}
echo '</ul></div>';

echo '<div id="tab-content" class="inside">';
$ii           = '1';
foreach ( $tab_elements as $key => $val ) {
	$active      = ( $ii == 1 ) ? 'is-active' : '';
	echo '<div class="' . esc_attr($active) . ' tab-content" data-content="' . absint($ii) . '">';
	include( $key . '.php' );
	echo '</div>';
	$ii ++;
}
echo '</div>';



