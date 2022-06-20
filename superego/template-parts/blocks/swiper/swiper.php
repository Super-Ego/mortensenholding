<?

/**
 * Standard Swiper.js slider block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'swiper';

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

// Enqueue Swiper.js
se_enqueue_swiper();
?>

<!-- Swiper Template Block -->
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="swiper-container swiper-slider">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <h4>Slide content 1</h4>
                        </div>

                        <div class="swiper-slide">
                            <h4>Slide content 2</h4>
                        </div>

                        <div class="swiper-slide">
                            <h4>Slide content 3</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>