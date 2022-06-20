<?
// Comment Layout
function superego_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>
	<li <? comment_class('panel'); ?>>
		<div class="media-object">
			<div class="media-object-section">
				<? echo get_avatar($comment, 75); ?>
			</div>
			<div class="media-object-section">
				<article id="comment-<? comment_ID(); ?>">
					<header class="comment-author">
						<?
						// create variable
						$bgauthemail = get_comment_author_email();
						?>
						<? printf(__('%s', 'superegowp'), get_comment_author_link()) ?> on
						<time datetime="<? echo comment_time('Y-m-j'); ?>"><a href="<? echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><? comment_time(__(' F jS, Y - g:ia', 'superegowp')); ?> </a></time>
						<? edit_comment_link(__('(Edit)', 'superegowp'), '  ', '') ?>
					</header>
					<? if ($comment->comment_approved == '0') : ?>
						<div class="alert alert-info">
							<p><? _e('Your comment is awaiting moderation.', 'superegowp') ?></p>
						</div>
					<? endif; ?>
					<section class="comment_content clearfix">
						<? comment_text() ?>
					</section>
					<? comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</article>
			</div>
		</div>
		<!-- </li> is added by WordPress automatically -->
	<?
}
