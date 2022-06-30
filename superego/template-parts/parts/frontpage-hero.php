<?

// Custom fields
$frontpage_titel = get_field('frontpage_titel');
$frontpage_brodtekst = get_field('frontpage_brodtekst');
$frontpage_knap = get_field('frontpage_knap');
$frontpage_baggrundsbillede = get_field('frontpage_baggrundsbillede');

$loading = ['loading' => 'eager'];

?>

<section id="frontpage-banner" class="section">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 banner-content">
                    <h1 id="site-title"><?= $frontpage_titel; ?></h1>
                    <p><?= $frontpage_brodtekst; ?></p>
                    <a href="<?= $frontpage_knap['url']; ?>" class="btn"><?= $frontpage_knap['title']; ?></a>
                </div>
            </div>
        </div>

        <div class="background-image">
            <div class="inner">
                <?= svg_image('mortensen-overlay') ?>
                <figure class="image-figure">
                    <?= wp_get_attachment_image($frontpage_baggrundsbillede, 'full', false, $loading); ?>
                </figure>
            </div>
        </div>
    </div>


</section>