<?php
/**
 * Targeting
 *
 * @package     Wow_Pluign
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/display.php' );

?>

<!--region Schedule-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Schedule', 'counter_box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->select( $weekday ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->time( $time_start ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->time( $time_end ); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->checkbox( $set_dates ); ?>
                </div>
                <div class="column is-one-third date-set">
					<?php $this->date( $date_start ); ?>
                </div>
                <div class="column is-one-third date-set">
					<?php $this->date( $date_end ); ?>
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
            <span class="faq-title"><?php esc_attr_e( 'User Role', 'counter_box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->select( $item_user ); ?>
                </div>
                <div class="column is-one-third user-role">
					<?php $this->select( $user_role ); ?>
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
            <span class="faq-title"><?php esc_attr_e( 'Site language', 'counter_box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->select( $language ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->
