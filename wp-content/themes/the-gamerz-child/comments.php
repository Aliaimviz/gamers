<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Gamerz
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comment_count = get_comments_number();
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'the-gamerz' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().


	?>
	<div class="row">
	<div class="col-md-1"><img alt="" src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32"></div>
	<div class="col-md-11">

		<div id="comment_form">
			<div><h4><i class="fa fa-comments" aria-hidden="true"></i>Comment</h4></div>
	<div>
		<textarea rows="10" name="comment" id="comment" class="textarea" placeholder="Enter Your Comment Here"></textarea>
	</div>
	<div>
		<input type="text" name="name" id="name" value="" class="textbox" placeholder="Name">
	</div>
	<div>
		<input type="email" name="email" id="email" value="" class="textbox" placeholder="Email">
	</div>
	
	<div class="comment-footer">
		
		<ul class="comments_ul">
			<li><img alt="" src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" style="border-radius: 15px;"></li>
			<li><i class="fa fa-user-o" aria-hidden="true"></i>JS</li>
			<li><i class="fa fa-user-o" aria-hidden="true"></i>Apri 13th, 2017 12:26</li>
		</ul>

		<p class="comment_para">Any1 played it ready? Is it worth buying?</p>


		<ul class="comments_rate_ul">
			<li>Rate this comment</li>
			<li>0 <i class="fa fa-thumbs-up" aria-hidden="true"></i></li>
			<li>0 <i class="fa fa-thumbs-down" aria-hidden="true"></i></li>
		</ul>


	</div>
</div>
	</div>
	</div>


</div><!-- #comments -->
