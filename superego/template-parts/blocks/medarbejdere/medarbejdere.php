<?

/**
 * Medarbejder Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'medarbejdere';

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(get_template_directory() . '/functions/block-settings.php');

// Register Isotope JS (CDN)
wp_enqueue_script('isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', ['jquery'], null, false);
// Register Isotope
wp_enqueue_script('isotope-js-call', THEME . '/assets/scripts/isotope.js', array('jquery'), false, false);
?>

<!-- Medarbejdere block -->
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="isotope-grid row">
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'medarbejdere',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'post_date',
            );

            // The Query
            $query = new WP_Query($args);
            $medarbejdere = $query->posts;

            foreach ($medarbejdere as $medarbejder) :
                $stilling = get_field('medarbejder_stilling', $medarbejder->ID) ?: 'Stilling';
                $email = get_field('medarbejder_email', $medarbejder->ID) ?: 'din@email.dk';
                $telefon = get_field('medarbejder_telefonnummer', $medarbejder->ID) ?: '12345678';
            ?>

                <div class="col-12 col-md-6 col-xl-4 grid-item medarbejder-column">
                    <div class="medarbejder">
                        <figure class="image-figure">
                            <?= get_the_post_thumbnail($medarbejder->ID, 'full'); ?>
                        </figure>
                        <div class="medarbejder__inner">
                            <h3 class="h5 medarbejder__navn"><?= get_the_title($medarbejder->ID); ?></h3>
                            <p class="medarbejder__stilling"><?= $stilling; ?></p>
                            <a class="medarbejder__kontakt" href="tel:<?= $telefon; ?>"><span>Tlf.:</span> <?= $telefon; ?></a><br>
                            <a class="medarbejder__kontakt" href="mailto:<?= $email; ?>"><span>Mail:</span> <?= $email; ?></a>
                        </div>
                    </div>
                </div>

            <? endforeach; ?>
        </div>
    </div>
</section>