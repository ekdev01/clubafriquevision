<?php 
	/*
	 * This file is used to generate comments form.
	 */	

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (post_password_required()){
		?> <p class="nopassword"><?php echo __('This post is password protected. Enter the password to view comments.','crunchpress'); ?></p> <?php
		return;
	}
if ( have_comments() ) : ?>
	<h3><?php comments_number(__('No Comment','crunchpress'), __('One Comment','crunchpress'), __('% Comments','crunchpress') );?></h3>
	<ul id="comments" class="comments-list">
		<?php wp_list_comments(array('callback' => 'get_comment_list')); ?>
	</ul>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<br>
		<div class="comments-navigation">
			<div class="previous"> <?php previous_comments_link('Older Comments'); ?> </div>
			<div class="next"> <?php next_comments_link('Newer Comments'); ?> </div>
		</div>
	<?php endif; ?>
<?php endif; ?>
<?php 

	$comment_form = array( 
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<li class="comment-form-author">' .
						'<label for="author">' . __( 'Name', 'crunchpress' ) . ( $req ? '<span class="required">*</span>' : '' ).'</label> ' .
						'<input class="comm-field" id="author" name="author" type="text" value="' .
						esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1" />' .						
						'<div class="clear"></div>' .
						'</li><!-- #form-section-author .form-section -->',
			'email'  => '<li class="comment-form-email">' .
						'<label for="email">' . __( 'Email', 'crunchpress' ) . ( $req ? '<span class="required">*</span>' : '' ) .'</label> ' .
						'<input id="email" class="comm-field" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2" />' .						
						'</li><!-- #form-section-email .form-section -->',
			'url'    => '<li class="comment-form-url">' .
						'<label for="url">' . __( 'Website', 'crunchpress' ) . '</label>' .
						'<input id="url" class="comm-field" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3" />' .						
						'<div class="clear"></div>' .
						'</li><li class="comment-form-comment"><!-- #form-section-url .form-section -->' ) ),
			'comment_field' => '' .
						'<div class="textarea-cp"><label for="comment">' . __( 'Comment Here', 'crunchpress' ) . '</label>' .
						'<textarea cols="60" rows="10" class="comm-area" id="comment" name="comment" aria-required="true"></textarea></div>' .
						'',
		'comment_notes_before' => '<ul class="form-list contact">',
		'comment_notes_after' => '</li></ul><!-- #form-section-comment .form-section -->',
		'title_reply' => __('Leave a Reply','crunchpress'),
	);
	
	
	
	comment_form($comment_form, $post->ID); 
	

?>