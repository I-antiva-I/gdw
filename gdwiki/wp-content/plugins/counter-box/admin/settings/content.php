<?php
/**
 * Content
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/content.php' );

?>

<div class="columns is-multiline is-variable">
    <div class="column is-full editor">
		<?php $this->editor( $content ); ?>
    </div>
</div>

<div class="columns is-multiline">
    <div class="column is-full">
        You can use the next shortcodes in the content for display the counters:
    </div>
    <div class="column is-full box-countdown box-timer variables">
        <ul style="font-weight: bold; font-size: 12px; color: #222;">
            <li>{day} - <span style="font-weight: normal; color: #999; background: none;">display of days count</span></li>
            <li>{hour} - <span style="font-weight: normal; color: #999; background: none;">display of hours count</span></li>
            <li>{min} - <span style="font-weight: normal; color: #999; background: none;">display of minutes count</span></li>
            <li>{sec} - <span style="font-weight: normal; color: #999; background: none;">display of seconds count</span></li>
        </ul>
        <p class="help is-info"> For Example: Left {day} : {hour} : {min} : {sec}</p>
    </div>
    <div class="column is-full box-counter variables">
        <ul style="font-weight: bold; font-size: 12px; color: #222;">
            <li>{counter} - <span style="font-weight: normal; color: #999; background: none;">display of counter</span></li>
        </ul>
        <p class="help is-info">For Example: Counter: {counter}</p>
    </div>
</div>