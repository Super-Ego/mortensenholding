<?

/**
 * Page content Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// get global Mobile Detect
global $detect;

// Define block name
$blockName = 'page-content';

// Create id attribute
$id = $blockName . '-' . $block['id'];

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/list', 'core/image', 'core/spacer', 'core/columns', 'core/column', 'core/buttons', 'core/shortcode', 'core/quote'];

// Custom fields
$page_content_heading = get_field('page_content_heading');
$page_content_button = get_field('page_content_button');
$page_content_figure = get_field('page_content_figure');

?>

<!-- Page content Block -->
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <h1><?= $page_content_heading ?></h1>
            </div>
            <? if (!$detect->isMobile() && $page_content_button) : ?>
                <div class="col-md-2 col-lg-4">
                    <a href="<?= $page_content_button['url']; ?>" class="btn"><?= $page_content_button['title']; ?></a>
                </div>
                <div class="col-12 col-md-10 col-lg-8 gutenberg-content">
                    <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" />
                </div>
            <? else : ?>
                <div class="col-12 col-md-10 offset-md-2 col-lg-8 offset-lg-4 gutenberg-content">
                    <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" />
                </div>
            <? endif; ?>
        </div>
    </div>
    <? if (!$detect->isMobile() && $page_content_figure) : ?>
        <div class="overlay-fig">
            <?= svg_image('overlay_fig_grey') ?>
        </div>
    <? endif; ?>
</section>