<?
// The template for displaying all single posts and attachments

get_header();
global $post;
?>

<div id="content" class="content">

	<main id="main" class="main" role="main">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<? get_template_part('/template-parts/parts/page', 'banner'); ?>
					<? get_template_part('/template-parts/parts/page', 'content'); ?>
					<section class="relaterede-nyheder-block section">
						<div class="container">
							<div class="row gx-5">
								<h2>Nyheder</h2>
								<?
								// WP_Query arguments
								$args = array(
									'post_type'      => 'post',
									'posts_per_page' => 3,
									'order'          => 'DESC',
									'orderby'        => 'post_date',
									'post__not_in' => array($post->ID)
								);

								// The Query
								$query = new WP_Query($args);
								$nyheder = $query->posts;

								foreach ($nyheder as $nyhed) : ?>

									<? $nyhed_url = get_post_field('post_name', $nyhed->ID) ?>

									<?
									get_template_part(
										'/template-parts/components/related',
										null,
										[
											'id' => get_the_ID($nyhed),
											'link' => get_the_permalink($nyhed),
											'heading' => get_the_title($nyhed),
											'date' => get_the_date('', $nyhed),
											'image' => get_the_post_thumbnail($nyhed, 'full'),
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