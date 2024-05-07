<?php
/**
 * Template for field time
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$label = !empty($arg['label']) ? $arg['label'] : '';
$attr  = !empty($arg['attr']) ? $arg['attr'] : '';
$help  = !empty($arg['help']) ? $arg['help'] : '';
$icon  = !empty($arg['icon']) ? $arg['icon'] : '';
$tooltip = !empty($arg['tooltip']) ? $arg['tooltip'] : '';

$checkbox_class = '';
$checkbox = '';
if (!empty($arg['checkbox'])) {
	$checkbox_class = ' checkbox';
	$check_name = $arg['checkbox']['name'];
	$check_val = $arg['checkbox']['value'];
	$cheched = !empty($arg['checkbox']['value']) ? ' checked="checked"' : '';
	$checkbox = '<input type="hidden" name="'.$check_name.'" value="">';
	$checkbox .= '<input type="checkbox" value="1"'.$cheched.'>';
}

$addon_class = '';
$addon = '';
if (!empty($arg['addon'])) {
	$addon_class = ' has-addons';
	$addon_attr = '';
	foreach ($arg['addon'] as $key => $val) {
		if ($key == 'value' || $key == 'options' || $key == 'class') {
			continue;
		}
		$addon_attr .= esc_attr($key) . '="' . esc_attr($val) . '"';
	}
	$addon_options = '';
	foreach ($arg['addon']['options'] as $key => $val) {
		$selected = ($arg['addon']['value'] == $key ) ? 'selected="selected"' : '';
		$addon_options .= '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
	}
	$add_addon_class = !empty($arg['addon']['class']) ? ' ' .$arg['addon']['class'] : '';
	$addon_field_classes = 'is-radiusless' . $add_addon_class;

	$addon = '<div class="control ">';
	$addon .= '<span class="select is-primary">';
	$addon .= '<select class="'.$addon_field_classes.'" '.$addon_attr.'>';
	$addon .= $addon_options;
	$addon .= '</select>';
	$addon .= '</span>';
	$addon .= '</div>';

}


$add_control_class = !empty($icon) ? ' ' .$icon : '';
$control_classes = 'control' . $add_control_class;

$add_field_class = !empty($arg['attr']['class']) ? ' ' .$arg['attr']['class'] : '';
$field_classes = 'input is-primary is-radiusless' . $add_field_class;

$attributes = '';
foreach ($attr as $key => $val) {
	if ($key == 'class') {
		continue;
	}
	$attributes .= esc_attr($key) . '="' . esc_attr($val) . '"';
}
?>
	<label class="label<?php echo esc_attr($checkbox_class); ?>">
		<?php echo $checkbox; ?> <?php echo esc_attr($label); ?>
		<?php if (!empty($tooltip)) : ?>
            <span class="is-primary has-tooltip-multiline has-tooltip-right" data-tooltip="<?php echo esc_attr($tooltip); ?>">
                <span class="wow-help dashicons dashicons-editor-help"></span>
            </span>
		<?php endif; ?>
	</label>
	<div class="field<?php echo esc_attr($addon_class); ?>">
		<div class="<?php echo esc_attr($control_classes); ?>">
			<input class="<?php echo esc_attr($field_classes); ?>" type="time" <?php echo $attributes; ?>>
			<?php if (!empty($icon)) : ?>
				<span class="icon is-small is-left">
	      <i class="<?php echo esc_attr($icon); ?>"></i>
	    </span>
			<?php endif;?>
		</div>
		<?php if (!empty($addon)) : ?>
			<?php echo $addon; ?>
		<?php endif;?>
	</div>
<?php if (!empty($help)) : ?>
	<p class="help is-info"><?php echo esc_attr($help); ?></p>
<?php endif;?>