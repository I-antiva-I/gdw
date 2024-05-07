<?php
/**
 * Notification settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/settings.php' );

?>

<!--region link-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Notification link', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->pro( $herd_link ); ?>
                </div>
                <div class="column is-half">
					<?php $this->pro( $click_link ); ?>
                </div>
                <div class="column is-half">
					<?php $this->pro( $link_target ); ?>
                </div>
                <div class="column is-half">

                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Show-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Show notification', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->pro( $sec_step ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $speed ); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->pro( $auto_close ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $number ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Animation-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Animation', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->pro( $window_animate ); ?>
                </div>
                <div class="column is-half">
					<?php $this->pro( $window_animate_out ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->


