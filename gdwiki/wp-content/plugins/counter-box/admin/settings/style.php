<?php
/**
 * Setting style
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/style.php' );

?>

<div class="columns is-multiline">
    <div class="column is-one-quarter">
		<?php $this->number( $width ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->number( $height ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->number( $border_radius ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->color( $background ); ?>
    </div>
</div>

<div class="columns is-multiline">
    <div class="column is-one-quarter">
		<?php $this->select( $border_style ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->number( $border_width ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->color( $border_color ); ?>
    </div>
</div>