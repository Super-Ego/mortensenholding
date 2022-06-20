<?
// The template for displaying 404 (page not found) pages.

get_header();

?>

<div id="content" class="content">

	<main id="main" class="main" role="main">

		<article class="content-not-found">

			<section id="404-banner" class="section article-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1><? _e('Hov! Denne side findes ikke.', 'superegowp'); ?></h1>
							<p><? _e('Den side, du ledte efter, blev ikke fundet, men prøv at kigge igen.', 'superegowp'); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<? get_search_form(); ?>
						</div>
					</div>
				</div>
			</section> <!-- end article header -->

		</article> <!-- end article -->

	</main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>