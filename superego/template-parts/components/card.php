<?
// Use this snippet to pass data to a template-part
// get_template_part(
//    '/template-parts/components/card',
//     null,
//     [
//         'id' => get_the_ID(),
//         'image' => 195,
//         'link' => get_the_permalink(),
//         'heading' => get_the_title(),
//         'body' => get_the_excerpt(),
//     ]
// );

// Template Part arguments
$id = $args['id'];
$heading = $args['heading'];
$body = $args['body'];
$image = $args['image'];
$link = $args['link'];
?>

<article id="se-card-<?= $id; ?>" class="se-card" role="article">
    <div class="se-card__top">
        <figure class="image-figure">
            <?
            if ($image) :
                echo wp_get_attachment_image($image, 'large');
            else :
                the_post_thumbnail($id, 'full');
            endif;
            ?>
        </figure>
    </div>
    <div class="se-card__bottom">
        <h2><?= $heading ?></h2>
        <p><?= $body ?></p>
        <a href="<?= $link; ?>">Læs mere</a>
    </div>
</article>