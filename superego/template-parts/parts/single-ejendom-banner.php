<?
se_enqueue_swiper();

// Register Swiper JS (local)
wp_enqueue_script('swiper-js-call', THEME . '/assets/scripts/swiper.js', array('jquery'), false, false);

// Custom fields
$gallery_images = get_field('cpt_property_banner_gallery');
$cpt_property_available = get_field('cpt_property_available');
$company_phone = get_theme_mod('setting_telefon');

?>

<? if ($cpt_property_available) : ?>
    <div id="available" class="property-available">
        <div class="inner d-flex align-items-center">
            <h5>Lejemålet er ledigt</h5>
            <a href="tel:<?= $company_phone ?>">Tlf. <?= $company_phone ?></a>
            <div id="closeAvailable" class="close">
                <?= svg_image('x') ?>
            </div>
        </div>
    </div>
    <div id="flag-container" class="d-flex align-items-center justify-content-center">
        <div id="openAvailable" class="open">
            <?= svg_image('flag') ?>
        </div>
    </div>
<? endif; ?>

<? if ($gallery_images) : ?>
    <section id="single-ejendom-banner" class="section" title="<? the_title(); ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ejendomSwiper">
                        <div class="swiper-wrapper">
                            <? foreach ($gallery_images as $gallery_image) : ?>
                                <div class="swiper-slide">
                                    <figure class="image-figure">
                                        <?= wp_get_attachment_image($gallery_image, 'full', false); ?>
                                    </figure>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="buttons d-flex">
                            <div class="button-left">
                                <?= svg_image('left-arrow') ?>
                            </div>
                            <div class="button-right">
                                <?= svg_image('right-arrow') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>