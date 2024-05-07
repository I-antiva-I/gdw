<?php
/**
 * Style settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/style.php' );

?>

<!--region Location-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Location', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->number( $herd_top ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number( $herd_bottom ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number( $herd_left ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number( $herd_right ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Title-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Title', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
	                <?php $this->number( $title_size ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number( $title_line_height ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->select( $title_font ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->select( $title_font_weight ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->select( $title_font_style ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->select( $title_align ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->pro( $title_color ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Content-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Content', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
	                <?php $this->pro( $content_width ); ?>
                </div>
                <div class="column is-half">
                    <?php $this->pro( $content_height ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number( $content_size ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number( $content_line_height ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->select( $content_font ); ?>
                </div>
                <div class="column is-half">
		            <?php $this->pro( $bg_color ); ?>
                </div>
                <div class="column is-half">
	                <?php $this->pro( $text_color ); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!--endregion-->

<!--region Icon-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Icon', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->pro($icon_width); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number($icon_size); ?>
                </div>
                <div class="column is-half">
	                <?php $this->pro($icon_background); ?>
                </div>
                <div class="column is-half">
	                <?php $this->pro($icon_color); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Close Button-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Close Button', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->checkbox($show_close); ?>
                </div>
                <div class="column is-half">
	                <?php $this->number($close_size); ?>
                </div>
                <div class="column is-half">
	                <?php $this->pro($close_color); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Border-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Border', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php $this->pro( $border_radius ); ?>
                </div>
                <div class="column is-half">
					<?php $this->pro( $border_style ); ?>
                </div>
                <div class="column is-half">
					<?php $this->pro( $border_width ); ?>
                </div>
                <div class="column is-half">
					<?php $this->pro( $border_color ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Shadow-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Shadow', 'herd-effects' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-half">
					<?php echo $this->pro( $shadow ); ?>
                </div>
                <div class="column is-half">
					<?php echo $this->pro( $shadow_h_offset ); ?>
                </div>
                <div class="column is-half">
					<?php echo $this->pro( $shadow_v_offset ); ?>
                </div>
                <div class="column is-half">
					<?php echo $this->pro( $shadow_blur ); ?>
                </div>
                <div class="column is-half">
					<?php echo $this->pro( $shadow_spread ); ?>
                </div>
                <div class="column is-half">
					<?php echo $this->pro( $shadow_color ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->
