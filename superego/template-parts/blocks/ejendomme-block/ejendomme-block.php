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
$ejendom_url = get_post_field('post_name', $ejendom->ID);

// Register Isotope JS (CDN)
wp_enqueue_script('isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', ['jquery'], null, false);
// Register Isotope
wp_enqueue_script('isotope-js-call', THEME . '/assets/scripts/isotope.js', array('jquery'), false, false);
?>

<section id="ejendoms-filter" class="section <? echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="filter">

                    <div class="filter-tab beliggenhed-tab">
                        <div class="inner">
                            <div class="wrapper">
                                <span class="title">Beliggenhed</span>
                                <div class="selected">Alle</div>
                            </div>
                            <div class="drop-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
                                </svg>
                            </div>
                        </div>

                        <div class="options-wrapper">
                            <div class="options" data-filter-group="beliggenhed">
                                <div class="option" data-filter=""><span>Alle</span></div>
                                <?
                                $beliggenheder = get_terms(
                                    array(
                                        'taxonomy'   => 'beliggenhed',
                                        'hide_empty' => false,
                                    )
                                );

                                if (!empty($beliggenheder) && is_array($beliggenheder)) :
                                    foreach ($beliggenheder as $beliggenhed) : ?>
                                        <div class="option" data-filter=".<? echo $beliggenhed->slug; ?>">
                                            <span><? echo $beliggenhed->name; ?></span>
                                            <div class="count">
                                            </div>
                                        </div>
                                <? endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="filter-tab type-tab">
                        <div class="inner">
                            <div class="wrapper">
                                <span class="title">Type</span>
                                <div class="selected">Alle</div>
                            </div>
                            <div class="drop-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
                                </svg>
                            </div>
                        </div>
                        <div class="options-wrapper">
                            <div class="options" data-filter-group="type">
                                <div class="option" data-filter=""><span>Alle</span></div>
                                <?
                                $types = get_terms(
                                    array(
                                        'taxonomy'   => 'mortensen_type',
                                        'hide_empty' => false,
                                    )
                                );

                                if (!empty($types) && is_array($types)) :
                                    foreach ($types as $type) : ?>
                                        <div class="option" data-filter=".<? echo $type->slug; ?>">
                                            <span><? echo $type->name; ?></span>
                                            <div class="count"></div>
                                        </div>
                                <? endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="filter-tab storrelse-tab">
                        <div class="inner">
                            <div class="wrapper">
                                <span class="title">Størrelse</span>
                                <div class="selected">Alle</div>
                            </div>
                            <div class="drop-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
                                </svg>
                            </div>
                        </div>
                        <div class="options-wrapper">
                            <div class="options" data-filter-group="storrelse">
                                <div class="option" data-filter=""><span>Alle</span></div>
                                <?
                                $storrelser = get_terms(
                                    array(
                                        'taxonomy'   => 'storrelse',
                                        'hide_empty' => false,
                                        'orderby' => 'slug',
                                        'order' => 'ASC',
                                    )
                                );

                                if (!empty($storrelser) && is_array($storrelser)) :
                                    foreach ($storrelser as $storrelse) : ?>
                                        <? $name_3 = str_replace([' ', '+', '-'], '', $storrelse->name); ?>

                                        <div class="option" data-filter=".<? echo $name_3; ?>">
                                            <span><? echo $storrelse->name; ?></span>
                                            <div class="count"></div>
                                        </div>
                                <? endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="ejendomme-oversigt" class="section with-filter <? echo esc_attr($className); ?>">
    <div class="container">
        <div class="row isotope-grid">

            <?
            $args = array(
                'post_type'          => 'ejendom',
                'posts_per_page'     => -1,
                'orderby'            => 'title',
                'order'              => 'ASC',
                'cat'                 => $ejendom_category,
                'tag_id'            => $tags,
            );

            $query = new WP_Query($args);
            $ejendomme = $query->posts;

            if ($ejendomme) :

                foreach ($ejendomme as $ejendom) : ?>
                    <?
                    $beliggenhed_term = get_the_terms($ejendom, 'beliggenhed');
                    $type_term = get_the_terms($ejendom, 'mortensen_type');
                    $storrelse_term = get_the_terms($ejendom, 'storrelse');

                    $beliggenhed_slug = $beliggenhed_term[0]->slug;
                    $beliggenhed = $beliggenhed_term[0]->name;
                    $type = $type_term[0]->slug;
                    $storrelse = $storrelse_term[0]->name;
                    $storrelse = str_replace([' ', '+', '-'], '', $storrelse);



                    $classes = array(
                        $beliggenhed_slug,
                        $type,
                        $storrelse,
                    )
                    ?>

                    <div class="grid-item col-md-6 col-xl-4 <? foreach ($classes as $class) : echo $class;
                                                                echo ' ';
                                                            endforeach; ?>">
                        <a href="<?= get_the_permalink($ejendom->ID); ?>" class="ejendom">
                            <figure class="image-figure">
                                <?= get_the_post_thumbnail($ejendom->ID, 'medium_large') ?>
                            </figure>
                            <div class="inner">
                                <p class="address"><?= get_the_title($ejendom->ID); ?></p>
                                <p class="city"><?= $beliggenhed ?></p>
                            </div>
                        </a>
                    </div>

                <? endforeach;

            else : ?>
                <h3 style="text-align:center">Der blev ikke fundet nogle ejendomme.</h3>
            <? endif; ?>

        </div>
    </div>
</section>