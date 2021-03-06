<?

/**
 * Selskaber Block
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


// Enqueue Isotope
se_enqueue_isotope();
?>

<section id="<? echo esc_attr($id); ?>" class="<? echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 content">
                <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" />
            </div>
        </div>
        <div class="isotope-grid row">
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
                <?
                $branche = get_field('cpt_selskab_branche');

                get_template_part(
                    '/template-parts/components/isotope',
                    null,
                    [
                        'id' => get_the_ID($selskab),
                        'link' => get_the_permalink($selskab),
                        'heading' => get_the_title($selskab),
                        'date' => get_field('cpt_selskab_branche', $selskab),
                        'image' => get_the_post_thumbnail($selskab, 'full'),
                    ]
                );
                ?>
            <? endforeach; ?>
        </div>
    </div>
</section>