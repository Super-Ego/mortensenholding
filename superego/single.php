<?
// The template for displaying all single posts and attachments

get_header();
global $post;
?>

<div id="content" class="content">

	<main id="main" class="main" role="main">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<? get_template_part('/template-parts/parts/single', 'banner'); ?>
					<? get_template_part('/template-parts/parts/single', 'content'); ?>
				</article>

			<? endwhile;
		else : ?>

			<? get_template_part('/template-parts/parts/content', 'missing'); ?>

		<? endif; ?>

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>