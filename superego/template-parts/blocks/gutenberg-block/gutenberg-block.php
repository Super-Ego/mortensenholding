<?

/**
 * Custom Gutenberg Block template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'gutenberg-block';

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(get_template_directory() . '/functions/block-settings.php');

// Load values and assign defaults.
$field = get_field('block_field') ?: 'Default value';

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/list', 'core/image', 'core/spacer', 'core/columns', 'core/column', 'core/buttons', 'core/shortcode'];

// InnerBlocks template
$template = [
	['core/heading', [
		'level' => 2,
		'placeholder' => 'Standard sektions block til diverse'
	]],
	['core/paragraph', [
		'placeholder' => 'Kan indeholde alt fra tekst til billeder mm.'
	]],
];

?>

<!-- Gutenberg Template Block -->
<section id="<?= esc_attr($id); ?>" class="section <?= esc_attr($className); ?> <?= $custom_classes; ?>">
	<div class="container">
		<div class="row">
			<div class="col gutenberg-content">
				<InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?= esc_attr(wp_json_encode($template)); ?>" />
			</div>
		</div>
	</div>
</section>