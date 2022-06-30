<?

/**
 * Ejendomme Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'ejendomme';

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
            <div class="col-12 content">
                <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)); ?>" />
            </div>
        </div>

        <div class="ejendomme-grid row">
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'ejendomme',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
            );

            // The Query
            $query = new WP_Query($args);
            $ejendomme = $query->posts;

            foreach ($ejendomme as $ejendom) : ?>

                <? $address = get_field('cpt_ejendom_address', $ejendom->ID) ?>
                <? $zip = get_field('cpt_ejendom_zip', $ejendom->ID) ?>
                <? $city= get_field('cpt_ejendom_city', $ejendom->ID) ?>
                <? $ejendom_url = get_post_field('post_name', $ejendom->ID) ?>

                <div class="col-12 col-md-6 col-xl-4 ejendom-item">
                    <a href="<?= $ejendom_url ?>">
                        <figure class="image-figure">
                            <?= get_the_post_thumbnail($ejendom->ID, 'full'); ?>
                        </figure>
                        <div class="selskab-title-container">
                            <p class="ejendom-adresse"><?= $address ?></p>
                            <p class="ejendom-by"><?= $zip ?> <?= $city ?></p>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>