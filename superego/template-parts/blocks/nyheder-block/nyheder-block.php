<?

/**
 * Nyheder Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'nyheder';

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
        <div class="isotope-grid row">
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                'order'          => 'DESC',
                'orderby'        => 'post_date',
            );

            // The Query
            $query = new WP_Query($args);
            $nyheder = $query->posts;

            foreach ($nyheder as $nyhed) : ?>
                <?
                get_template_part(
                    '/template-parts/components/isotope',
                    null,
                    [
                        'id' => get_the_ID($nyhed),
                        'link' => get_the_permalink($nyhed),
                        'heading' => get_the_title($nyhed),
                        'date' => get_the_date('', $nyhed),
                        'image' => get_the_post_thumbnail($nyhed, 'full'),
                    ]
                );
                ?>
            <? endforeach; ?>
        </div>
    </div>
</section>