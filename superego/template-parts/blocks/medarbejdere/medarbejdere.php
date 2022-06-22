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

?>

<!-- Medarbejdere block -->
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'medarbejdere',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
            );

            // The Query
            $query = new WP_Query($args);
            $posts = $query->posts;

            foreach ($posts as $post) :
                $stilling = get_field('medarbejder_stilling', $post->ID) ?: 'Stilling';
                $email = get_field('medarbejder_email', $post->ID) ?: 'din@email.dk';
                $telefon = get_field('medarbejder_telefonnummer', $post->ID) ?: '12345678';
            ?>

                <div class="col-md-6 medarbejder-column">
                    <div class="medarbejder">
                        <figure class="image-figure">
                            <?= the_post_thumbnail('full'); ?>
                        </figure>
                        <div class="medarbejder__inner">
                            <h3 class="medarbejder__navn"><?= get_the_title($post->ID); ?></h3>
                            <p class="medarbejder__stilling"><?= $stilling; ?></p>
                            <div class="medarbejder__kontakt">
                                <a href="tel:<?= $telefon; ?>"><?= $telefon; ?></a>
                                <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                            </div>
                        </div>
                    </div>
                </div>

            <? endforeach; ?>
        </div>
    </div>
</section>