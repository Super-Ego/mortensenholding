<?
// The template for displaying single ejendom

get_header();
global $post;
?>

<div id="content" class="content">

    <main id="main" class="main" role="main">
        <? if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                    <? get_template_part('/template-parts/parts/single', 'ejendom-banner'); ?>
                    <? get_template_part('/template-parts/parts/page', 'content'); ?>
                    <section class="relaterede-ejendomme-block section">
                        <div class="container">
                            <div class="row gx-5">
                                <h2>Relaterede ejendomme</h2>
                                <?
                                // WP_Query arguments
                                $custom_terms = wp_get_object_terms($post->ID, 'mortensen_type', array('fields' => 'slugs'));

                                //print_r($custom_terms);

                                $args = array(
                                    'post_type'      => 'ejendom',
                                    // 'tax_query'      => array(
                                    //     array(
                                    //         'taxonomy' => 'mortensen_type',
                                    //         'field'    => 'slug',
                                    //         'terms'    => '$custom_terms',
                                    //     )
                                    // ),
                                    'posts_per_page' => 3,
                                    'orderby'        => 'rand',
                                    'post__not_in'   => array($post->ID),
                                );

                                // The Query
                                $query = new WP_Query($args);
                                $ejendomme = $query->posts;

                                foreach ($ejendomme as $ejendom) : ?>
                                    <?
                                    get_template_part(
                                        '/template-parts/components/related',
                                        null,
                                        [
                                            'id' => get_the_ID($ejendom),
                                            'link' => get_the_permalink($ejendom),
                                            'heading' => get_the_title($ejendom),
                                            'date' => get_the_date('', $ejendom),
                                            'image' => get_the_post_thumbnail($ejendom, 'full'),
                                        ]
                                    );
                                    ?>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </section>
                </article>

            <? endwhile;
        else : ?>

            <? get_template_part('/template-parts/parts/content', 'missing'); ?>

        <? endif; ?>

    </main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>