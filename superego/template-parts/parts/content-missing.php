<? // The template part for displaying a message that posts cannot be found ?>

<div class="post-not-found">

	<? if ( is_search() ) : ?>

		<header class="article-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><? _e( 'Beklager, ingen resultater.', 'superegowp' );?></h1>
					</div>
				</div>
			</div>
		</header>

		<section class="entry-content section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><? _e( 'Prøv din søgning igen.', 'superegowp' );?></p>
					</div>
				</div>
			</div>
		</section>

		<section class="search section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<? get_search_form(); ?>
					</div>
				</div>
			</div>
		</section> <!-- end search section -->

		<footer class="article-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><? _e( 'This is the error message in the parts/content-missing. template.', 'superegowp' ); ?></p>
					</div>
				</div>
			</div>
		</footer>

	<? else: ?>

		<header class="article-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><? _e( 'Hov! Denne side findes ikke.', 'superegowp' ); ?></h1>
					</div>
				</div>
			</div>
		</header>

		<section class="entry-content section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><? _e( 'Uh Oh. Something is missing. Try double checking things.', 'superegowp' ); ?></p>
					</div>
				</div>
			</div>
		</section>

		<section class="search section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<? get_search_form(); ?>
					</div>
				</div>
			</div>
		</section> <!-- end search section -->

		<footer class="article-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><? _e( 'This is the error message in the parts/content-missing. template.', 'superegowp' ); ?></p>
					</div>
				</div>
			</div>
		</footer>

	<? endif; ?>

</div>
