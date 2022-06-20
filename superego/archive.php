<?

/**
 * Displays archive pages if a speicifc template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

<div class="content" class="content">

	<main id="main" class="main" role="main">

		<section id="archive-banner" class="section">
			<div class="container">
				<div class="row">
					<div class="col">
						<header>
							<h1 class="archive-title"><? post_type_archive_title(); ?></h1>
							<? the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
						</header>
					</div>
				</div>
			</div>
		</section>

		<section id="archive-loop" class="section no-padding-top">
			<div class="container">
				<div class="row">
					<? if (have_posts()) : while (have_posts()) : the_post(); ?>

							<? get_template_part('/template-parts/parts/loop', 'archive'); ?>

						<? endwhile; ?>

						<? superego_pagination(); ?>

					<? else : ?>

						<? get_template_part('/template-parts/parts/content', 'missing'); ?>

					<? endif; ?>
				</div>
			</div>
		</section>


	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>