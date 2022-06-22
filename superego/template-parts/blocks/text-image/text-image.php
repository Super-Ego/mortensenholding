<?

/**
 * Standard Text & Image Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'text-image';

// Create id attribute
$id = $blockName . '-' . $block['id'];

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/list', 'core/html', 'core/buttons'];

// InnerBlocks template
$template = [
    ['core/heading', [
        'level' => 2,
        'placeholder' => 'Skriv din overskrift'
    ]],
    ['core/paragraph', [
        'placeholder' => 'Lorem ipsum odor amet, consectetuer adipiscing elit.'
    ]],
    ['core/buttons', []]
];

// Image settings
$imgId = get_field('billede') ?: 195;
$imgSize = 'medium_large';
$imgAttr = [];
?>

<!-- Text & Image Block -->
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="gutenberg-content">
                    <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?= esc_attr(wp_json_encode($template)); ?>" />
                </div>
            </div>
            <div class="col-lg-6">
                <figure class="image-figure">
                    <?= wp_get_attachment_image($imgId, $imgSize, false, $imgAttr); ?>
                </figure>
            </div>
        </div>
    </div>
</section>