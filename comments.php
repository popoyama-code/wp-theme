<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) :
		?>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments">この記事にコメントは出来ません。</p>
			<?php
		endif;

	endif;

	$fields =  array(
		'author' =>
			'<p class="comments-area__author">'.
			'<input class="comments-area__author-form" id="author" name="author" type="text" placeholder="名前"'.
			'" size="30"' . $aria_req . ' /></p>',
	);

	$args = array(
		'title_reply'          => 'コメント欄',
		'title_reply_to'       => '%sに返信',
		'cancel_reply_link'    => '取消',
		'label_submit'         => '投稿',
		'comment_field'        => '<p class="comments-area__comment comments-form__comment"><textarea class="comments-area__comment-form" id="comment" name="comment" aria-required="true" placeholder="本文"></textarea></p>',
		'fields' => $fields,
	);
	comment_form($args);
	?>

</div>
