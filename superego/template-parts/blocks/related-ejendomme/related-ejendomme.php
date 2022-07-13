<?

/**
 * Relaterede ejendomme Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'relaterede-ejendomme';

// Create id attribute
$id = $blockName . '-' . $block['id'];

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

// Custom fields

// Register Isotope JS (CDN)
wp_enqueue_script('isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', ['jquery'], null, false);
// Register Isotope
wp_enqueue_script('isotope-js-call', THEME . '/assets/scripts/isotope.js', array('jquery'), false, false);
?>

<section id="<? echo esc_attr($id); ?>" class="<? echo esc_attr($className); ?>">
    <div class="container">
        <div class="row gx-5">
            <h2>Relaterede ejendomme</h2>
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'ejendom',
                'posts_per_page' => 3,
                'order'          => 'DESC',
                'orderby'        => 'post_date',
                'post__not_in'   => array($ejendom->ID),
            );

            // The Query
            $query = new WP_Query($args);
            $ejendomme = $query->posts;

            foreach ($ejendomme as $ejendom) : ?>
                <?
                get_template_part(
                    '/template-parts/components/related',
                    null,
                    [
                        'id' => get_the_ID($ejendom),
                        'link' => get_the_permalink($ejendom),
                        'heading' => get_the_title($ejendom),
                        'date' => get_the_date('', $ejendom),
                        'image' => get_the_post_thumbnail($ejendom, 'full'),
                    ]
                );
                ?>
            <? endforeach; ?>
        </div>
    </div>
</section>