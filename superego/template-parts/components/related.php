<?
// Use this snippet to pass data to a template-part
// get_template_part(
//    '/template-parts/components/card',
//     null,
//     [
//         'id' => get_the_ID(),
//         'link' => get_the_permalink(),
//         'heading' => get_the_title(),
//         'date' => get_the_date(),
//         'image' => get_the_post_thumbnail(),
//     ]
// );

// Template Part arguments
$id = $args['id'];
$heading = $args['heading'];
$date = $args['date'];
$link = $args['link'];
$image = $args['image'];
?>

<div class="col-12 col-md-6 col-xl-4 related-item">
    <a href="<?= $link ?>">
        <figure class="image-figure">
            <?= $image ?>
        </figure>
        <div class="captions">
            <p class="caption-1 h5"><?= $date ?></p>
            <h3 class="caption-2 h5"><?= $heading ?></h3>
        </div>
    </a>
</div>