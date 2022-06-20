<?
// The template for displaying search results pages
// For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result

get_header();

?>

<main class="main" role="main">

	<section id="archive-banner" class="section archive-banner search-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 id="archive-title"><? _e('Søgeresultater for:', 'superegowp'); ?> <? echo esc_attr(get_search_query()); ?>/h1>
				</div>
			</div>
		</div>
	</section>

	<? if (have_posts()) : while (have_posts()) : the_post(); ?>

			<? get_template_part('/template-parts/parts/loop', 'archive'); ?>

		<? endwhile; ?>

		<? superego_pagination(); ?>

	<? else : ?>

		<? get_template_part('/template-parts/parts/content', 'missing'); ?>

	<? endif; ?>

</main> <!-- end #main -->

<? get_footer(); ?>