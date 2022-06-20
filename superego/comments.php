<?

/**
 * Displays current comments and comment form. Works with includes/comments..
 */

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">

	<? // You can start editing here 
	?>

	<? if (have_comments()) : ?>
		<h2 class="comments-title">
			<?
			printf( // WPCS: XSS OK.
				esc_html(_nx('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'superegowp')),
				number_format_i18n(get_comments_number()),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h2>

		<? if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? 
		?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><? esc_html_e('Comment navigation', 'superegowp'); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><? previous_comments_link(esc_html__('Older Comments', 'superegowp')); ?></div>
					<div class="nav-next"><? next_comments_link(esc_html__('Newer Comments', 'superegowp')); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
		<? endif; // Check for comment navigation. 
		?>

		<ol class="commentlist">
			<? wp_list_comments('type=comment&callback=superego_comments'); ?>
		</ol>

		<? if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? 
		?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><? esc_html_e('Comment navigation', 'superegowp'); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><? previous_comments_link(esc_html__('Older Comments', 'superegowp')); ?></div>
					<div class="nav-next"><? next_comments_link(esc_html__('Newer Comments', 'superegowp')); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<? endif; // Check for comment navigation. 
		?>

	<? endif; // Check for have_comments(). 
	?>

	<?
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
	?>
		<p class="no-comments"><? esc_html_e('Comments are closed.', 'superegowp'); ?></p>
	<? endif; ?>

	<? comment_form(array('class_submit' => 'button')); ?>

</div><!-- #comments -->