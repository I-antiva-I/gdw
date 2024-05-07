<?php
/**
 * Add new Element
 *
 * @package     WP_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once( 'settings/database.php' );

$url_form = admin_url() . 'admin.php?page=' . $this->plugin['slug'];

$test_mode = array(
	'label'   => esc_attr__( 'Test Mode', 'counter_box' ),
	'attr'    => [
		'name'  => 'param[test_mode]',
		'id'    => 'test_mode',
		'value' => isset( $param['test_mode'] ) ? $param['test_mode'] : '',
	],
	'tooltip' => esc_attr__( 'If test mode is enabled, the counter will show for admin only', 'counter_box' ),
);

$status_mode = array(
	'label'   => esc_attr__( 'Activated', 'counter_box' ),
	'attr'    => [
		'name'  => 'status',
		'id'    => 'status',
		'value' => $status,
	],
	'tooltip' => esc_attr__( 'If check - the counter will show on the frontend. If uncheck - counter not displayed on the frontend.', 'counter_box' ),
);

?>

    <form action="<?php echo esc_url( $url_form ); ?>" method="post" name="post" class="wow-plugin" id="wow-plugin">
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-1">
                <div id="post-body-content" style="position: relative;">
                    <div id="titlediv" class="is-b-margin">
                        <div id="titlewrap">
                            <label class="screen-reader-text" id="title-prompt-text" for="title">
								<?php esc_html_e( 'Enter title here', 'counter_box' ); ?>
                            </label>
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <input class="input is-radiusless is-info" type="text"
                                           placeholder="<?php esc_attr_e( 'Register an item name', 'counter_box' ); ?>"
                                           value="<?php echo esc_attr( $title ); ?>" name="title">
                                </div>
                                <div class="control">
                                    <button class="button button-primary button-large is-size-6 is-radiusless"
                                            id="submit">
                                        <span><?php echo esc_html( $btn ); ?></span>
                                        <span class="icon is-small has-text-white">
                                        &#10004;
                                    </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="is-inline-block"><?php $this->checkbox( $status_mode ); ?></div>
                            <div class="is-inline-block"><?php $this->checkbox( $test_mode ); ?></div>
                        </div>
                    </div>

                    <div class="live-preview">
                        <h3><span class="dashicons dashicons-admin-customizer"></span>
							<?php esc_html_e( 'Live Preview', 'counter_box' ); ?>
                        </h3>
                        <div class="toggle-preview">
                            <span class="plus is-hidden"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
                            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
                        </div>
                        <div class="live-builder">
                            <div id="builder">
                                <div class="counter-box"></div>
                            </div>

                        </div>
                    </div>

                </div>

                <div id="postbox-container-2" class="postbox-container">
                    <div id="postoptions" class="postbox ">
						<?php include_once 'settings/tabs.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--  main param for adding in database-->
        <input type="hidden" name="tool_id" value="<?php echo absint( $tool_id ); ?>" id="tool_id"/>
        <input type="hidden" name="add" id="add_action" value="<?php echo absint( $add_action ); ?>"/>
        <input type="hidden" name="id" value="<?php echo absint( $id ); ?>"/>
        <input type="hidden" name="data" value="<?php echo esc_attr( $data ); ?>"/>
        <input type="hidden" name="page" value="<?php echo esc_attr( $this->plugin['slug'] ); ?>"/>
        <input type="hidden" name="prefix" value="<?php echo esc_attr( $this->plugin['prefix'] ); ?>" id="prefix"/>
		<?php wp_nonce_field( $this->plugin['slug'] . '_action', $this->plugin['slug'] . '_nonce' ); ?>
    </form>

<?php
