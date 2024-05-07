<?php
/**
 * Plugin main page
 *
 * @package     Wow_Plugin
 * @author      Dmytro Lobov
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     GNU Public License
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;
$data = $wpdb->prefix . $this->plugin['prefix'];
$info = ( isset( $_REQUEST['info'] ) ) ? sanitize_text_field( $_REQUEST['info'] ) : '';
if ( $info === 'saved' ) {
	$message_data = __( 'Item Added', 'counter_box' );
	echo '<div class="updated" id="message"><p><strong>' . esc_html($message_data) . '</strong>.</p></div>';
} elseif ( $info === 'update' ) {
	$message_data = __( 'Item Updated', 'counter_box' );
	echo '<div class="updated" id="message"><p><strong>' . esc_html($message_data) . '</strong>.</p></div>';
} elseif ( $info === 'delete' ) {
	$del_id = absint( $_GET['did'] );
	if ( ! empty( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], $this->plugin['slug'] . '_nonce' ) ) {
		$delete = $wpdb->delete( $data, array( 'ID' => $del_id ), array( '%d' ) );
		if ( absint( $delete ) > 0 ) {
			$message_data = __( 'Item Deleted', 'popup-box' );
			echo '<div class="updated" id="message"><p><strong>' . esc_html($message_data) . '</strong>.</p></div>';
		}
	}

}


$action_popup = ( isset( $_REQUEST['action'] ) ) ? sanitize_text_field( $_REQUEST['action'] ) : '';
if ( $action_popup === 'activate' ) {
	$id = absint( $_GET['id'] );
	if ( ! empty( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], $this->plugin['slug'] . '_nonce' ) ) {
		$wpdb->update( $data, array( 'status' => '1' ), array( 'ID' => $id ), array( '%d' ) );
		$message_data = __( 'Counter Activated', 'popup-box' );
		echo '<div class="updated" id="message"><p><strong>' . esc_html( $message_data ) . '</strong>.</p></div>';
	}
} elseif ( $action_popup === 'deactivate' ) {
	$id = absint( $_GET['id'] );
	if ( ! empty( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], $this->plugin['slug'] . '_nonce' ) ) {
		$wpdb->update( $data, array( 'status' => '' ), array( 'ID' => $id ), array( '%d' ) );
		$message_data = __( 'Counter Deactivated', 'popup-box' );
		echo '<div class="updated" id="message"><p><strong>' . esc_html( $message_data ) . '</strong>.</p></div>';
	}
}


$current_tab = ( isset( $_REQUEST["tab"] ) ) ? sanitize_text_field( $_REQUEST["tab"] ) : 'list';

$tabs_arr = array(
	'list'      => __( 'List', 'counter_box' ),
	'settings'  => __( 'Add new', 'counter_box' ),
	'support'   => __( 'Support', 'counter_box' ),
	'extension' => __( 'Pro Features', 'counter_box' ),
	'more'      => __( 'More Plugins', 'counter_box' ),
	'rate'      => __( 'Rate', 'counter_box' ),
);

$tabs = apply_filters( $this->plugin['slug'] . '_tab_menu', $tabs_arr );

$rate_url = 'https://wordpress.org/support/plugin/counter-box/reviews/#new-post';
$docs_url = 'https://wow-estore.com/docs/counter-box-install-and-activate/';

$rating = $this->rating['wp_url'];
?>
    <div class="wrap">
        <h1 class="wp-heading-inline">
            <?php echo esc_html( $this->plugin['name'] ); ?>
            v. <?php echo esc_html( $this->plugin['version'] ); ?>
        </h1>
        <a href="?page=<?php echo esc_attr( $this->plugin['slug'] ); ?>&tab=settings" class="page-title-action">
			<?php esc_html_e( 'Add New', 'counter_box' ); ?>
        </a>
        <hr class="wp-header-end">
		<?php if ( get_option( 'wow_' . $this->plugin['prefix'] . '_message' ) != 'read' ) : ?>
            <div class="notice notice-info is-dismissible wow-plugin-message">
                <p class="ideas">
                    <i class="dashicons dashicons-megaphone has-text-danger is-r-margin"></i>We are constantly trying to
                    improve the plugin and add more useful
                    features to it. Your support and your ideas for improving the plugin are very important to us. <br/>
                    <i class="dashicons dashicons-star-filled has-text-warning is-r-margin"></i>If you like the plugin,
                    please <a href="<?php echo esc_url( $rating ); ?>" target="_blank">leave a review</a> about it at
                    WordPress.org.<br/>
                    <i class="dashicons dashicons-share has-text-info is-r-margin"></i>Help other users find this plugin
                    and take advantage of it. <b>Share:</b>
                    <span data-share="facebook">Facebook</span>, <span data-share="twitter">Twitter</span>,
                    <span data-share="vk">VK</span>, <span data-share="linkedin">LinkedIn</span>,
                    <span data-share="pinterest">Pinterest</span>, <span data-share="xing">XING</span>, <span
                            data-share="reddit">Reddit</span>, <span data-share="blogger">Blogger</span>, <span
                            data-share="telegram">Telegram</span>
                </p>
                <input type="hidden" id="wp-title" value="<?php echo esc_attr( $this->rating['wp_title'] ); ?>">
                <input type="hidden" id="wp-url" value="<?php echo esc_url( $this->rating['wp_home'] ); ?>">
            </div>
		<?php endif; ?>

        <div id="wow-message"></div>

		<?php
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $name ) {
			$class = ( $tab === $current_tab ) ? ' nav-tab-active' : '';
			if ( $tab === 'settings' ) {
				$action = ( isset( $_REQUEST["act"] ) ) ? sanitize_text_field( $_REQUEST["act"] ) : '';
				if ( ! empty( $action ) && $action === 'update' ) {
					echo '<a class="nav-tab' . esc_attr( $class ) . '" href="?page=' . esc_attr( $this->plugin['slug'] ) . '&tab='
					     . esc_attr( $tab ) . '">' . esc_html__( 'Update', 'counter_box' ) . ' #'
					     . absint( $_REQUEST["id"] ) . '</a>';
				} else {
					echo '<a class="nav-tab' . esc_attr( $class ) . '" href="?page=' . esc_attr( $this->plugin['slug'] ) . '&tab='
					     . esc_attr( $tab ) . '">' . esc_html( $name ) . '</a>';
				}
			} elseif ( $tab === 'more' ) {
				echo '<a class="nav-tab" href="https://wow-estore.com/" target="_blank">' . esc_html( $name ) . '</a>';
			} elseif ( $tab === 'rate' ) {
				echo '<a class="nav-tab' . esc_attr( $class ) . '" href="' . esc_url( $rate_url ) . '" target="_blank"><span class="dashicons dashicons-star-filled" style="color:#ffcc01;"></span> ' . esc_html( $name ) . '</a>';

			} elseif ( $tab === 'docs' ) {
				echo '<a class="nav-tab' . esc_attr( $class ) . '" href="' . esc_url( $docs_url ) . '" target="_blank"><span class="dashicons dashicons-media-document" style="color:#006bb3;"></span>' . esc_html( $name ) . '</a>';

			} else {
				echo '<a class="nav-tab' . esc_attr( $class ) . '" href="?page=' . esc_attr( $this->plugin['slug'] ) . '&tab='
				     . esc_attr( $tab ) . '">' . esc_html( $name ) . '</a>';
			}

		}
		echo '</h2>';
		$current_tab = array_key_exists( $current_tab, $tabs_arr ) ? 'page-' . $current_tab : 'page-list';
		$file        = apply_filters( $this->plugin['slug'] . '_menu_file', $current_tab );
		include_once( $file . '.php' );
		?>
    </div><input type="hidden" id="wow-navigation" value="<?php echo esc_attr( $this->plugin['slug'] ); ?>">
<?php
