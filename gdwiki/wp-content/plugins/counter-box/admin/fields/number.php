<?php
/**
 * Template for field input
 *
 * @package     Wow_Plugin
 * @copyright   Wow-Company <yoda@wow-company.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$label   = ! empty( $arg['label'] ) ? $arg['label'] : '';
$attr    = ! empty( $arg['attr'] ) ? $arg['attr'] : '';
$help    = ! empty( $arg['help'] ) ? $arg['help'] : '';
$icon    = ! empty( $arg['icon'] ) ? $arg['icon'] : '';
$tooltip = ! empty( $arg['tooltip'] ) ? $arg['tooltip'] : '';

$check_id       = '';
$checkbox_class = '';
$checkbox       = '';
if ( ! empty( $arg['checkbox'] ) ) {
	$checkbox_class = ' checkbox';
	$check_name     = $arg['checkbox']['name'];
	$check_val      = $arg['checkbox']['value'];
	$check_id       = $arg['checkbox']['id'];
	$disabled       = isset( $arg['checkbox']['disabled'] ) ? ' disabled="disabled"' : '';
	$check_class    = isset( $arg['checkbox']['class'] ) ? ' ' . $arg['checkbox']['class'] : '';
	$cheched        = ! empty( $arg['checkbox']['value'] ) ? ' checked="checked"' : '';
	$checkbox       = '<input type="hidden" name="' . esc_attr( $check_name ) . '" value="">';
	$checkbox       .= '<input type="checkbox" class="is-radiusless' . esc_attr( $check_class ) . '" id="' . esc_attr( $check_id ) . '" name="' . esc_attr( $check_name ) . '" value="1"' . $cheched . $disabled . '>';
}

$addon_class = '';
$addon       = '';
if ( ! empty( $arg['addon'] ) ) {
	$addon_class = ' has-addons';

	if ( ! empty( $arg['addon']['unit'] ) ) {
		$addon = '<div class="control ">';
		$addon .= '<span class="button is-info is-radiusless is-size-6">';
		$addon .= $arg['addon']['unit'];
		$addon .= '</span>';
		$addon .= '</div>';
	} else {
		$addon_attr = '';
		foreach ( $arg['addon'] as $key => $val ) {
			if ( $key == 'value' || $key == 'options' || $key == 'class' ) {
				continue;
			}
			$addon_attr .= esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
		}
		$addon_options = '';
		foreach ( $arg['addon']['options'] as $key => $val ) {
			$selected      = ( $arg['addon']['value'] == $key ) ? 'selected="selected"' : '';
			$addon_options .= '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_attr( $val ) . '</option>';
		}
		$add_addon_class     = ! empty( $arg['addon']['class'] ) ? ' ' . $arg['addon']['class'] : '';
		$addon_field_classes = 'is-radiusless' . esc_attr( $add_addon_class );

		$addon = '<div class="control ">';
		$addon .= '<span class="select is-primary">';
		$addon .= '<select class="' . esc_attr( $addon_field_classes ) . '" ' . $addon_attr . '>';
		$addon .= $addon_options;
		$addon .= '</select>';
		$addon .= '</span>';
		$addon .= '</div>';
	}

}


$add_control_class = ! empty( $icon ) ? ' ' . $icon : '';
$control_classes   = 'control' . $add_control_class;

$add_field_class = ! empty( $arg['attr']['class'] ) ? ' ' . $arg['attr']['class'] : '';
$field_classes   = 'input is-primary is-radiusless' . $add_field_class;

$attributes = '';
foreach ( $attr as $key => $val ) {
	if ( $key == 'class' ) {
		continue;
	}
	$attributes .= esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
}
?>

    <label class="label<?php echo esc_attr( $checkbox_class ); ?>" for="<?php echo esc_attr( $check_id ); ?>">
	    <?php
	    if ( ! empty( $arg['checkbox'] ) ) {
		    $checkbox_class = ' checkbox';
		    $check_name     = $arg['checkbox']['name'];
		    $check_val      = $arg['checkbox']['value'];
		    $check_id       = $arg['checkbox']['id'];
		    $disabled       = isset( $arg['checkbox']['disabled'] ) ? ' disabled' : '';
		    $check_class    = isset( $arg['checkbox']['class'] ) ? ' ' . $arg['checkbox']['class'] : '';
		    $cheched        = ! empty( $arg['checkbox']['value'] ) ? ' checked' : '';
		    echo '<input type="hidden" name="' . esc_attr( $check_name ) . '" value="">';
		    echo '<input type="checkbox" class="is-radiusless' . esc_attr( $check_class ) . '" id="' . esc_attr( $check_id ) . '" name="' . esc_attr( $check_name ) . '" value="1"' . esc_attr($cheched) . esc_attr($disabled) . '>';
	    }
	    ?>
		<?php echo esc_attr( $label ); ?>
		<?php if ( ! empty( $tooltip ) ) : ?>
            <span class="is-primary has-tooltip-multiline has-tooltip-right"
                  data-tooltip="<?php echo esc_attr( $tooltip ); ?>">
                <span class="wow-help dashicons dashicons-editor-help"></span>
            </span>
		<?php endif; ?>
    </label>
    <div class="field<?php echo esc_attr( $addon_class ); ?>">
        <div class="<?php echo esc_attr( $control_classes ); ?> is-expanded">
            <input class="<?php echo esc_attr( $field_classes ); ?>" type="number" <?php
            foreach ( $attr as $key => $val ) {
	            if ( $key == 'class' ) {
		            continue;
	            }
	            echo esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
            }
            ?>>
			<?php if ( ! empty( $icon ) ) : ?>
                <span class="icon is-small is-left">
	      <i class="<?php echo esc_attr( $icon ); ?>"></i>
	    </span>
			<?php endif; ?>
        </div>
		<?php
		if ( ! empty( $arg['addon'] ) ) {
			$addon_class = ' has-addons';

			if ( ! empty( $arg['addon']['unit'] ) ) {
				echo '<div class="control ">';
				echo '<span class="button is-info is-radiusless is-size-6">';
				echo esc_attr( $arg['addon']['unit'] );
				echo '</span>';
				echo '</div>';
			} else {
				$add_addon_class     = ! empty( $arg['addon']['class'] ) ? ' ' . $arg['addon']['class'] : '';
				$addon_field_classes = 'is-radiusless' . $add_addon_class;

				echo '<div class="control ">';
				echo '<span class="select is-primary">';
				echo '<select class="' . esc_attr( $addon_field_classes ) . '"';
				foreach ( $arg['addon'] as $key => $val ) {
					if ( $key == 'value' || $key == 'options' || $key == 'class' ) {
						continue;
					}
					echo esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
				}
				echo '>';
				foreach ( $arg['addon']['options'] as $key => $val ) {
					$selected = ( $arg['addon']['value'] == $key ) ? 'selected' : '';
					echo '<option value="' . esc_attr( $key ) . '" ' . esc_attr( $selected ) . '>' . esc_attr( $val ) . '</option>';
				}
				echo '</select>';
				echo '</span>';
				echo '</div>';
			}

		}
        ?>
    </div>
<?php if ( ! empty( $help ) ) : ?>
    <p class="help is-info"><?php echo esc_attr( $help ); ?></p>
<?php endif; ?>