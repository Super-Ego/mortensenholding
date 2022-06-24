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
$blockName = 'selskaber';

// Create id attribute
$id = $blockName . '-' . $block['id'];

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/list', 'core/html', 'core/buttons'];

// Custom fields

?>

<section id="<? echo esc_attr($id); ?>" class="<? echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" />
            </div> 
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'selskaber',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
            );

            // The Query
            $query = new WP_Query($args);
            $selskaber = $query->posts;

            foreach ($selskaber as $selskab) : ?>

                <? $branche = get_field('cpt_selskab_branche', $selskab->ID) ?>

                <div class="col-12 col-md-6 col-lg-4 selskab-container">
                    <figure class="image-figure">
                        <?= get_the_post_thumbnail($selskab->ID, 'full'); ?>
                    </figure>
                    <div class="selskab-title-container">
                        <p class="selskab-branche h5"><?= $branche ?></p>
                        <h3 class="h5 selskab-title"><?= get_the_title($selskab->ID) ?></h3>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>