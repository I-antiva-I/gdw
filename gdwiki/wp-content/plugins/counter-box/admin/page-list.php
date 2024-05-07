<?php
/**
 * List of Items
 *
 * @package     Wow_Plugin
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   Wow-Company
 * @license     GNU Public License
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once 'class-list-table.php';

$list_table = new Wow_List_Table( $data, $this->plugin );
$list_table->prepare_items();
?>
<div class="wrap">
	<form method="post">
		<?php
		$list_table->search_box( esc_attr__( 'Search', 'counter_box' ), $this->plugin['slug'] );
		$list_table->display();
		?>
		<input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ); ?>"/>
	</form>
</div>
