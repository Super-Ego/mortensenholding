<?
// Template part for displaying posts
// Used for single, index, archive, search.
?>
<div class="col-lg-6">

	<?

	get_template_part(
		'/template-parts/components/card',
		null,
		[
			'id' => get_the_ID(),
			'link' => get_the_permalink(),
			'heading' => get_the_title(),
			'body' => get_the_excerpt(),
		]
	);

	?>

</div>