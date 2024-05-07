<?php
/**
 * Template for field Color
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

$add_control_class = !empty($icon) ? ' ' .$icon : '';
$control_classes = 'control' . $add_control_class;

$add_field_class = !empty($arg['attr']['class']) ? ' ' .$arg['attr']['class'] : '';
$field_classes = 'input is-primary is-radiusless wp-color-picker-field ' . $add_field_class;

$attributes = '';
foreach ($attr as $key => $val) {
	if ($key == 'class') {
		continue;
	}
	$attributes .= esc_attr($key) . '="' . esc_attr($val) . '"';
}
?>

<div class="field">
	<?php if (!empty($label)) : ?>
		<label class="label">
            <?php echo esc_attr($label); ?>
			<?php if (!empty($tooltip)) : ?>
                <span class="is-primary has-tooltip-multiline has-tooltip-right" data-tooltip="<?php echo esc_attr($tooltip); ?>">
                    <span class="wow-help dashicons dashicons-editor-help"></span>
                </span>
			<?php endif; ?>
        </label>
	<?php endif;?>
	<div class="<?php echo esc_attr($control_classes); ?>">
		<input class="<?php echo esc_attr($field_classes); ?>" type="text" data-alpha="true" <?php echo $attributes; ?>>
		<?php if (!empty($icon)) : ?>
			<span class="icon is-small is-left">
	      <i class="<?php echo esc_attr($icon); ?>"></i>
	    </span>
		<?php endif;?>
	</div>
	<?php if (!empty($help)) : ?>
		<p class="help is-info"><?php echo esc_attr($help); ?></p>
	<?php endif;?>
</div>