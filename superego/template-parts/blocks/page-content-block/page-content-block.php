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

// Get post type
$what_post_type = get_post_type($post_id);
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
            <? elseif ($what_post_type == 'ejendom') : ?>
                <?
                $type_term = get_the_terms($ejendom, 'mortensen_type');
                $type = $type_term[0]->name;

                $page_content_property_address = get_field('page_content_property_address');
                $page_content_property_rent = get_field('page_content_property_rent');
                $page_content_property_size = get_field('page_content_property_size');
                ?>
                <div class="col-md-2 col-lg-4 ejendom-info">
                    <p class="caption">Type</p>
                    <p><?= $type ?></p>

                    <? if ($page_content_property_address) : ?>
                        <p class="caption">Beliggenhed</p>
                        <p><?= $page_content_property_address ?></p>
                    <? endif; ?>

                    <? if ($page_content_property_rent) : ?>
                        <p class="caption">Leje</p>
                        <p><?= $page_content_property_rent ?></p>
                    <? endif; ?>

                    <? if ($page_content_property_size) : ?>
                        <p class="caption">Størrelse</p>
                        <p><?= $page_content_property_size ?></p>
                    <? endif; ?>
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