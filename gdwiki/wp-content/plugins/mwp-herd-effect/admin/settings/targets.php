<?php
/**
 * Targeting
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/targets.php' );

?>

<!--region Schedule-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Schedule', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->pro( $weekday ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->pro( $time_start ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->pro( $time_end ); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->pro( $set_dates ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Devices-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Devices Control', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->number($screen_more); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number($screen); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Users Role-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'User Role', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->pro($item_user); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region language-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Site language', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-full">
					<?php $this->pro($lang); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Display-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Display on site', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns">
                <div class="column is-half">
					<?php $this->select($show); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column is-full shortcode">
                    <label class="label"><?php esc_attr_e( 'Shortcode', 'herd-effects' ); ?></label>
                    <code>[<?php echo $this->plugin['shortcode']; ?> id="<?php echo $tool_id; ?>"]</code>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Other-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Other Settings', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
	                <?php $this->checkbox( $disable_fontawesome ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->select( $test_mode ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

