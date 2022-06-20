<? // Template Name: Full Width (No Sidebar)

get_header();

// ACF Variables
$field = get_field('field');
?>

<div id="content" class="content">

	<main id="main" class="main" role="main">
		<? if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<? the_ID(); ?>" <? post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

					<? get_template_part('/template-parts/parts/page', 'banner'); ?>
					<? get_template_part('/template-parts/parts/page', 'content'); ?>

				</article> <!-- end article -->
		<? endwhile;
		endif; ?>
	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>