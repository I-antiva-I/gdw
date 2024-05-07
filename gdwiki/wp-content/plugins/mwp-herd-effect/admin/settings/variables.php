<?php
/**
 * Variables
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/variables.php' );

$v_url = 'https://github.com/dmytrolobov/variables';

?>

<p class="help is-dark">You can copy variables of names and cities on the page  <a href="<?php echo esc_url($v_url);?>" target='_blank'><?php echo esc_url($v_url);?></a></p>

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title">[amount]</span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column">
					<?php $this->number( $amount_min ); ?>
                </div>
                <div class="column">
					<?php $this->number( $amount_max ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title">[variable1]</span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column">
					<?php $this->textarea( $herd_name ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title">[variable2]</span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column">
					<?php $this->textarea( $herd_city ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title">[variable3]</span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column">
					<?php $this->textarea( $herd_product ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title">[variable4]</span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column">
					<?php $this->textarea( $variable4 ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title">[variable5]</span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column">
					<?php $this->textarea( $variable5 ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
