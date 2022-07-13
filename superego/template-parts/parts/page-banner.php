<?

// get global Mobile Detect
global $detect;

// Custom fields
$side_banner_billede = get_field('side_banner_billede');
$side_banner_overlay = get_field('side_banner_overlay');
$side_banner_overskrift = get_field('side_banner_overskrift');
$side_banner_tekst = get_field('side_banner_tekst');
$side_banner_figur_placering = get_field('side_banner_figur_placering');

?>

<? if ($side_banner_billede) : ?>
    <? if ($side_banner_overlay) : ?>
        <section id="page-banner" class="section page-banner-overlay">
            <!-- Banner with overlay -->
            <div class="container banner-overlay">
                <div class="row">
                    <div class="col-12 banner-content">
                        <? if ($side_banner_overskrift) : ?>
                            <h1 id="site-title"><?= $side_banner_overskrift; ?></h1>
                        <? endif; ?>
                        <? if ($side_banner_tekst) : ?>
                            <?= $side_banner_tekst; ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>

            <div class="background-image with-overlay">
                <div class="inner">
                    <?= svg_image('side_overlay') ?>
                    <figure class="image-figure">
                        <?= wp_get_attachment_image($side_banner_billede, 'full', false); ?>
                    </figure>
                </div>
            </div>
        <? else : ?>
            <section id="page-banner" class="section page-banner">
                <!-- Banner without overlay -->
                <div class="container banner-no-overlay">
                    <div class="background-image">
                        <figure class="image-figure">
                            <?= wp_get_attachment_image($side_banner_billede, 'full', false); ?>
                        </figure>
                    </div>
                </div>
            <? endif; ?>

            <? if (!$detect->isMobile()) : ?>
                <? if (!$side_banner_figur_placering) : ?>
                    <div class="banner-figure left"></div>
                <? else : ?>
                    <div class="banner-figure right"></div>
                <? endif; ?>
            <? endif; ?>
            </section>
        <? endif; ?>