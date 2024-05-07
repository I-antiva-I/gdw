<?php
/**
 * Notification content
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/content.php' );

?>

<div class="columns is-multiline is-variable">
    <div class="column is-one-third">
	    <?php $this->input( $herd_title ); ?>
    </div>
    <div class="column is-one-third">
	    <?php $this->select( $image_type ); ?>
    </div>
    <div class="column is-one-third" id="iconTypeIcon">
	    <?php $this->select( $menu_icon ); ?>
    </div>
    <div class="column is-one-third is-hidden" id="iconTypeCustom">
		<?php $this->input( $herd_custom_link ); ?>
    </div>

    <div class="column is-full editor">
		<?php $this->editor( $herd_text ); ?>
    </div>
</div>


