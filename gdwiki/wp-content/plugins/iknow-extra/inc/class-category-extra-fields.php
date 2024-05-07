<?php
/**
 * Class for taxonomy Extra fields
 *
 * @package     Wow-Company Plugin
 * @subpackage  Admin class
 * @copyright   Copyright (c) 2017, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Iknow_Category_Extra_Fields {


	public function __construct() {

		$taxonomy = isset($_REQUEST['taxonomy']) ? sanitize_key($_REQUEST['taxonomy'] ) : '';

		if (!empty($taxonomy)) {
			/* add browse and text field to upload image and add an fontawesome icon */
			add_action( "{$taxonomy}_add_form_fields", array( $this, 'add_new_fields' ), 10, 2 );
			add_action( "{$taxonomy}_edit_form_fields", array( $this, 'edit_icon_fields' ), 10, 2 );

			/* save the image or font awesome icon*/
			add_action( "edited_{$taxonomy}", array( $this, 'save_field' ), 10, 2 );
			add_action( "create_{$taxonomy}", array( $this, 'save_fields' ), 10, 2 );
		}
		/*filters for get category icon*/
		add_filter( 'iknow_category_icon', array( $this, 'get_cat_icon' ), 10, 2 );

		// function for show full description in taxonomy
		add_action('iknow_category_description', array( $this, 'get_cat_description' ) );
	}

	public function add_new_fields() {
		// this will add the custom meta field to the add new term page
		?>
        <div class="form-field">
            <label for="cat_extra[cat_icon]"><?php esc_html_e( 'Category Icon', 'iknow-extra' ); ?></label>
            <input type="text" name="cat_extra[cat_icon]" value="">
            <p class="description"><?php esc_html_e( 'Enter Icon class (for example: fab fa-font-awesome-flag). Before using, you need to include on the site any icon font.', 'iknow-extra' ); ?></p>
        </div>
		<?php
	}

	public function edit_icon_fields( $term ) {
		$cat_id = $term->term_id;
		// retrieve the existing value(s) for this meta field. This returns an array
		$cat_meta = get_option( 'iknow_cat_' . $cat_id . '_extra' );
		$cat_icon = ! empty( $cat_meta['cat_icon'] ) ? $cat_meta['cat_icon'] : '';
		$cat_desc = ! empty( $cat_meta['cat_desc'] ) ? $cat_meta['cat_desc'] : '';
		?>
        <!--        Add full description to category-->
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="cat_extra[cat_desc]"><?php esc_html_e( 'Full Description', 'iknow-extra' ); ?></label>
            </th>
            <td>
				<?php
				$settings = array(
					'wpautop'       => true,
					'media_buttons' => true,
					'quicktags'     => true,
					'textarea_rows' => '15',
					'textarea_name' => 'cat_extra[cat_desc]'
				);
				wp_editor( wp_kses_post( $cat_desc ), 'cat_extra_description', $settings );
				?>
                <p class="description">
					<?php esc_html_e( 'A full description will appear in taxonomy.', 'iknow-extra' ); ?>
                </p>
            </td>
        </tr>

        <!--        Add category Icon class-->
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="cat_extra[cat_icon]"><?php esc_html_e( 'Category Icon', 'iknow-extra' ); ?></label>
            </th>
            <td>
                <input type="text" name="cat_extra[cat_icon]" value="<?php echo esc_attr( $cat_icon ); ?>">
                <p class="description">
					<?php esc_html_e( 'Enter Icon class (for example: fab fa-font-awesome-flag). Before using, you need to include on the site any icon font.', 'iknow-extra' ); ?>
                </p>
            </td>
        </tr>
		<?php
	}

	public function save_field( $term_id ) {
		if ( isset( $_POST['cat_extra'] ) ) {
			$cat_id   = $term_id;
			$cat_meta = get_option( 'iknow_cat_' . $cat_id . '_extra' );
			$cat_array = array_map( 'wp_kses_post', wp_unslash( $_POST['cat_extra'] ) );
			$cat_keys = array_keys($cat_array );
			foreach ( $cat_keys as $key ) {
				$cat_meta[ $key ] = $cat_array[$key];
			}
			// Save the option array.
			update_option( 'iknow_cat_' . $cat_id . '_extra', $cat_meta );
		}
	}

	public function get_cat_icon( $cat_icon, $cat_id ) {
		$cat_meta = get_option( 'iknow_cat_' . $cat_id . '_extra' );
		if ( isset( $cat_meta['cat_icon'] ) && !empty( $cat_meta['cat_icon'] ) ) {
			$cat_icon = $cat_meta['cat_icon'];
		}
		return $cat_icon;
	}

	public function get_cat_description() {
		$term = get_queried_object();
		// [!] MODIFIED
		if($term != NULL)
		{
			$cat_meta = get_option( 'iknow_cat_' . $term->term_taxonomy_id . '_extra' );
			if ( isset( $cat_meta['cat_desc'] ) ) {
				// [!] MODIFIED
				$cat_desc = $cat_meta['cat_desc'];
				echo '<div class="category-description content">' . wp_kses_post($cat_desc) . '</div>';
			}
		}
	}
}

new Iknow_Category_Extra_Fields();

