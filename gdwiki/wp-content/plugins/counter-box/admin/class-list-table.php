<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// WP_List_Table is not loaded automatically so we need to load it in our application
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Create a new table class that will extend the WP_List_Table
 *
 */
class Wow_List_Table extends WP_List_Table {

	/**
	 * Number of items per page
	 *
	 * @var int
	 * @since 1.5
	 */
	public $per_page = 30;

	private $data;
	private $plugin;

	/**
	 * Wow_List_Table constructor.
	 *
	 * @param string $data - Name of the datatable
	 * @param array $plugin - Information about the plugin
	 */
	public function __construct( $data, $plugin ) {
		$this->data   = $data;
		$this->plugin = $plugin;

		// Set parent defaults
		parent::__construct( array(
			'ajax' => false,
		) );
		$this->process_bulk_action();
	}

	/**
	 * Process the bulk actions
	 *
	 * @access public
	 * @return void
	 * @since  1.4
	 */
	public function process_bulk_action() {
		$ids    = isset( $_POST['ID'] ) ? absint($_POST['ID']) : false;
		$action = $this->current_action();
		if ( ! is_array( $ids ) ) {
			$ids = array( $ids );
		}
		if ( empty( $action ) ) {
			return;
		}
		global $wpdb;
		$table = $this->data;
		foreach ( $ids as $id ) {
			if ( 'delete-items' === $this->current_action() ) {
				$wpdb->delete( $table, array( 'id' => $id ) );
			} elseif ( 'activate-items' === $this->current_action() ) {
				$wpdb->update( $table, array( 'status' => '1' ), array( 'id' => $id ), array( '%d' ) );
			} elseif ( 'deactivate-items' === $this->current_action() ) {
				$wpdb->update( $table, array( 'status' => '' ), array( 'id' => $id ), array( '%d' ) );
			}
		}

	}

	public function search_box( $text, $input_id ) {
		$input_id = $input_id . '-search-input';
		if ( ! empty( $_REQUEST['orderby'] ) ) {
			echo '<input type="hidden" name="orderby" value="' . esc_attr( $_REQUEST['orderby'] ) . '" />';
		}
		if ( ! empty( $_REQUEST['order'] ) ) {
			echo '<input type="hidden" name="order" value="' . esc_attr( $_REQUEST['order'] ) . '" />';
		}
		?>
        <p class="search-box">
            <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ) ?>"><?php echo esc_html( $text ); ?>
                :</label>
            <input type="search" id="<?php echo esc_attr( $input_id ) ?>" name="s"
                   value="<?php _admin_search_query(); ?>"/>
			<?php submit_button( $text, 'button', false, false, array( 'ID' => 'search-submit' ) ); ?>
        </p>
		<?php
	}

	/**
	 * Define what data to show on each column of the table
	 *
	 * @param array $item Data
	 * @param String $column_name - Current column name
	 *
	 * @return Mixed
	 */
	public function column_default( $item, $column_name ) {
		$value = $item[ $column_name ];

		return $value;
	}

	public function column_title( $item ) {
		$slug          = $this->plugin['slug'];
		$title         = ! empty( $item['title'] ) ? $item['title'] : esc_attr__( 'Untitle', 'counter_box' );
		$edit_url      = admin_url( '/admin.php?page=' . $slug . '&tab=settings&act=update&id='
		                            . absint( $item['ID'] ) );
		$duplicate_url = admin_url( '/admin.php?page=' . $slug . '&tab=settings&act=duplicate&id='
		                            . absint( $item['ID'] ) );
		$delete_url    = admin_url( '/admin.php?page=' . $slug . '&info=delete&did=' . absint( $item['ID'] ) );
		$actions       = array(
			'edit'      => '<a href="' . esc_url( $edit_url ) . '">' . esc_attr__( 'Edit', 'counter_box' ) . '</a>',
			'duplicate' => '<a href="' . esc_url( wp_nonce_url( $duplicate_url, $slug . '_nonce' ) ) . '" class="has-text-success">' . esc_attr__( 'Duplicate', 'counter_box' )
			               . '</a>',
			'delete'    => '<a href="' . esc_url( wp_nonce_url( $delete_url, $slug . '_nonce' ) ) . '" class="has-text-danger">' . esc_attr__( 'Delete', 'counter_box' ) . '</a>',
		);

		return $title . $this->row_actions( $actions );
	}

	/**
	 * Prepare the items for the table to process
	 *
	 * @return Void
	 */
	public function prepare_items() {
		$columns     = $this->get_columns();
		$hidden      = $this->get_hidden_columns();
		$sortable    = $this->get_sortable_columns();
		$data        = $this->table_data();
		$perPage     = 30;
		$currentPage = $this->get_pagenum();
		if ( $data ) {
			usort( $data, array( &$this, 'sort_data' ) );
			$data = array_slice( $data, ( ( $currentPage - 1 ) * $perPage ), $perPage );
		}
		$totalItems            = $this->list_count();
		$this->_column_headers = array( $columns, $hidden, $sortable );
		$this->items           = $data;
		$this->set_pagination_args( array(
			'total_items' => $totalItems,
			'per_page'    => $perPage,
			'total_pages' => ceil( $totalItems / $perPage ),
		) );
	}

	/**
	 * Override the parent columns method. Defines the columns to use in your listing table
	 *
	 * @return Array
	 */
	public function get_columns() {
		$columns = array(
			'cb'     => '<input type="checkbox" />',
			'title'  => __( 'Title', 'counter_box' ),
			'code'   => __( 'Shortcode', 'counter_box' ),
			'test'   => __( 'Test Mode', 'counter_box' ),
			'status' => __( 'Status', 'counter_box' ),
		);

		return $columns;

	}

	/**
	 * Define which columns are hidden
	 *
	 * @return Array
	 */
	public function get_hidden_columns() {
		return array();
	}

	/**
	 * Define the sortable columns
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		return array(
			'ID' => array( 'ID', false ),
		);
	}

	/**
	 * Get the table data
	 *
	 * @return Array
	 */
	private function table_data() {
		global $wpdb;
		$data   = array();
		$paged  = $this->get_paged();
		$offset = $this->per_page * ( $paged - 1 );
		$search = $this->get_search();

		$table = $this->data;


		if ( ! $search || empty( $search ) ) {
			$result = $wpdb->get_results( "SELECT * FROM " . $table . " order by id desc" );
		} elseif ( is_numeric( $search ) ) {
			$query  = $wpdb->prepare( "SELECT * FROM $table WHERE id=%d", absint( $search ) );
			$result = $wpdb->get_results( $query );
		} else {
			$query  = $wpdb->prepare( "SELECT * FROM $table WHERE title=%s order by id desc", sanitize_text_field( $search ) );
			$result = $wpdb->get_results( $query );
		}

		$slug      = $this->plugin['slug'];
		$shortcode = $this->plugin['shortcode'];

		if ( $result ) {
			foreach ( $result as $key => $value ) {
				$param          = unserialize( $value->param );
				$test_on        = '<span class="has-text-danger has-text-weight-semibold">' . esc_html__( 'On', 'counter_box' ) . '</span>';
				$test_off       = esc_attr__( 'Off', 'counter_box' );
				$test           = ! empty( $param['test_mode'] ) ? $test_on : $test_off;
				$tooltip_off    = esc_attr__( 'Click for Deactivate the counter.', 'counter_box' );
				$tooltip_on     = esc_attr__( 'Click for Activate the counter.', 'counter_box' );
				$activate_url   = wp_nonce_url( admin_url() . 'admin.php?page=' . esc_attr( $slug ) . '&id=' . absint( $value->id ) . '&action=activate', $slug . '_nonce' );
				$deactivate_url = wp_nonce_url( admin_url() . 'admin.php?page=' . esc_attr( $slug ) . '&id=' . absint( $value->id ) . '&action=deactivate', $slug . '_nonce' );
				$status_on      = '<a href="' . esc_url( $deactivate_url ) . '" class="button is-info is-small has-tooltip-bottom" data-tooltip="' . esc_attr( $tooltip_off ) . '">' . esc_attr__( 'Activated', 'counter_box' ) . '</a>';
				$status_off     = '<a href="' . esc_url( $activate_url ) . '" class="button is-danger is-small has-tooltip-bottom" data-tooltip="' . esc_attr( $tooltip_on ) . '">' . esc_attr__( 'Deactivated', 'counter_box' ) . '</a>';
				$status         = ! empty( $value->status ) ? $status_on : $status_off;
				$title          = ! empty( $value->title ) ? $value->title : esc_attr__( 'Untitle', 'counter_box' );
				$data[]         = array(
					'ID'    => $value->id,
					'title' => '<a href="admin.php?page=' . esc_attr( $slug ) . '&tab=settings&act=update&id=' . absint( $value->id )
					           . '">' . esc_attr( $title ) . '</a>',
					'code'  => '[' . esc_attr( $shortcode ) . ' id="' . absint( $value->id ) . '"]',

					'test'   => $test,
					'status' => $status,

				);
			}
		}

		return $data;
	}

	/**
	 * Retrieve the current page number
	 *
	 * @access public
	 * @return int Current page number
	 * @since  1.5
	 */
	public function get_paged() {
		return isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
	}

	/**
	 * Retrieves the search query string
	 *
	 * @access public
	 * @return mixed string If search is present, false otherwise
	 * @since  1.0
	 */
	public function get_search() {
		return ! empty( $_POST['s'] ) ? sanitize_text_field( urldecode(  trim( $_POST['s'] ) ) ) : false;
	}

	public function list_count() {
		global $wpdb;
		$data   = $this->data;
		$result = $wpdb->get_results( "SELECT * FROM " . $data . " order by id asc" );

		return count( $result );
	}

	/**
	 * Render the checkbox column
	 *
	 * @access public
	 *
	 * @param array $item Contains all the data for the checkbox column
	 *
	 * @return string Displays a checkbox
	 * @since  1.0
	 */
	public function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', 'ID', $item['ID'] );
	}

	/**
	 * Retrieve the bulk actions
	 *
	 * @access public
	 * @return array $actions Array of the bulk actions
	 * @since  1.4
	 */
	public function get_bulk_actions() {
		$actions = array(
			'delete-items'     => esc_attr__( 'Delate', 'counter_box' ),
			'activate-items'   => esc_attr__( 'Activate counter', 'counter_box' ),
			'deactivate-items' => esc_attr__( 'Deactivate counter', 'counter_box' ),
		);

		return $actions;
	}

	/**
	 * Gets the name of the primary column.
	 *
	 * @return string Name of the primary column.
	 * @since  1.0
	 * @access protected
	 *
	 */
	protected function get_primary_column_name() {
		return 'ID';
	}

	/**
	 * Allows you to sort the data by the variables set in the $_GET
	 *
	 * @return Mixed
	 */
	private function sort_data( $a, $b ) {
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? sanitize_text_field( $_GET['orderby'] ) : 'ID';
		// If no order, default to asc
		$order = ( ! empty( $_GET['order'] ) ) ? sanitize_text_field( $_GET['order'] ) : 'desc';
		// Determine sort order
		$result = strnatcmp( $a[ $orderby ], $b[ $orderby ] );

		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : - $result;

	}

}
