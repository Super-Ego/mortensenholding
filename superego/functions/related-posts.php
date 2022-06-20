<?
// Related Posts Function, matches posts by tags - call using superego_related_posts(); )
function superego_related_posts()
{
	global $post;
	$tag_arr = '';
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		foreach ($tags as $tag) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 3, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts($args);
		if ($related_posts) {
			echo __('<h4>Related Posts</h4>', 'superegowp');
			echo '<ul class="superego-related-posts">';
			foreach ($related_posts as $post) : setup_postdata($post); ?>
				<li class="related_post">
					<a href="<? the_permalink() ?>" title="<? the_title_attribute(); ?>"><? the_title(); ?></a>
					<? get_template_part('parts/content', 'byline'); ?>
				</li>
<? endforeach;
		}
	}
	wp_reset_postdata();
	echo '</ul>';
} /* end superego related posts function */
