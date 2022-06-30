<?

/**
 * Staggered Columns Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Define block name
$blockName = 'staggered-columns';

// Create id attribute
$id = $blockName . '-' . $block['id'];

// Create class attribute
$className = $blockName . '-block section';

// Import standard block settings
require(DIR . '/functions/block-settings.php');

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/list', 'core/html', 'core/buttons'];

// Custom fields
$kolonner = get_field('forskudte_kolonner_repeater');

?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>">
    <div class="container">
        <div class="row kolonner-grid">
            <? foreach ($kolonner as $kolonne) : ?>
                <?
                $kolonne_billede = $kolonne['kolonne_billede'];
                $kolonne_overskrift = $kolonne['kolonne_overskrift'];
                $kolonne_tekst = $kolonne['kolonne_tekst'];
                $kolonne_knap_tekst = $kolonne['kolonne_knap_tekst'];
                $kolonne_knap_link = $kolonne['kolonne_knap_link'];
                ?>
                <div class="col-12 col-lg-6 kolonne-item">
                    <figure class="image-figure">
                        <?= wp_get_attachment_image($kolonne_billede, 'full', false); ?>
                    </figure>

                    <div class="text-container">
                        <h3><?= $kolonne_overskrift ?></h3>
                        <p><?= $kolonne_tekst ?></p>
                        <a href="<?= $kolonne_knap_link ?>" class="btn"><?= $kolonne_knap_tekst ?></a>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>