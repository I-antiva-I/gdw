<?php
/**
 * Settings
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/settings.php' );

?>
<div class="columns is-multiline">
    <div class="column is-one-third">
		<?php $this->select( $type ); ?>
    </div>

</div>

<div class="columns is-multiline box-countdown">
    <div class="column is-one-third box-date">
		<?php $this->date( $date ); ?>
    </div>
    <div class="column is-one-third box-weekday">
		<?php $this->select( $weekday ); ?>
    </div>
    <div class="column is-one-third">
		<?php $this->time( $time ); ?>
    </div>

    <div class="column is-one-third">
		<?php $this->select( $timezone ); ?>
    </div>
</div>

<div class="columns is-multiline box-timer">
    <div class="column is-one-quarter">
		<?php $this->number( $day ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->number( $hours ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->number( $minutes ); ?>
    </div>
    <div class="column is-one-quarter">
		<?php $this->number( $seconds ); ?>
    </div>
</div>

<div class="columns is-multiline box-counter is-vcentered">

    <div class="column is-one-third has-text-right-tablet">
        <label class="label"><?php esc_html_e( 'Number range');?></label>
    </div>
    <div class="column is-one-third">
		<?php $this->number( $start); ?>
    </div>
    <div class="column is-one-third">
		<?php $this->number( $finish ); ?>
    </div>

    <div class="column is-one-third has-text-right-tablet">
        <label class="label"><?php esc_html_e( 'Speed');?></label>
    </div>
    <div class="column is-one-third">
		<?php $this->number( $speed_min); ?>
    </div>
    <div class="column is-one-third">
		<?php $this->number( $speed_max ); ?>
    </div>

    <div class="column is-one-third has-text-right-tablet">
        <label class="label"><?php esc_html_e( 'Increment');?></label>
    </div>
    <div class="column is-one-third">
		<?php $this->number( $increment_min); ?>
    </div>
    <div class="column is-one-third">
		<?php $this->number( $increment_max ); ?>
    </div>

    <div class="column is-one-third">
		<?php $this->number( $rounding); ?>
    </div>

</div>
