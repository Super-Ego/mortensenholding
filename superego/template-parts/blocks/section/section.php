<?

/**
 * Standard Superego Section Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'text-image';

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

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

<!-- Section Block -->
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col gutenberg-content">
                <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?= esc_attr(wp_json_encode($template)); ?>" />
            </div>
        </div>
    </div>
</section>