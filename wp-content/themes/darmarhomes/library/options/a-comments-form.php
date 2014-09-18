<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Comments form options
*****************************************************
*/

$commenter = wp_get_current_commenter();
$req       = get_option( 'require_name_email' );
$aria_req  = ( $req ? " aria-required='true'" : '' );
$replyText = ( have_comments() ) ? ( __( 'Join the discussion, leave a reply!', WM_THEME_TEXTDOMAIN ) ) : ( __( 'Be the first to leave a reply!', WM_THEME_TEXTDOMAIN ) );

//form fields:
$fields = array(
	'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" class="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="22" tabindex="2"' . $aria_req . ' /> <label for="author">' . __( 'Name', WM_THEME_TEXTDOMAIN ) . '</label></p>',
	'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" class="text" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" size="22" tabindex="3"' . $aria_req . ' /> <label for="email">' . __( 'Email', WM_THEME_TEXTDOMAIN ) . '</label></p>',
	'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> <label for="url">' . __( 'Website', WM_THEME_TEXTDOMAIN ) . '</label></p>',
	);

//arguments to display comments form:
$commentFormArgs = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<p class="message"><textarea name="comment" id="comment" cols="40" rows="5" tabindex="1" aria-required="true"></textarea> <label for="comment" class="assistive-text invisible">' . __( 'Comment', WM_THEME_TEXTDOMAIN ) . '</label></p>',
	'must_log_in'          => '<p class="login-required">' . __( 'You have to be logged in to leave a comment.', WM_THEME_TEXTDOMAIN ) . ' <a href="' . wp_login_url( get_permalink() ) . '">' . __( 'Log in.', WM_THEME_TEXTDOMAIN ) . '</a></p>',
	'logged_in_as'         => '<p class="login-status">' . __( 'Logged in as', WM_THEME_TEXTDOMAIN ) . ' <a href="' . admin_url( 'profile.php' ) . '">' . $user_identity . '</a> | <a href="' . wp_logout_url( get_permalink() ) . '" title="' . __( 'Log out from your account', WM_THEME_TEXTDOMAIN ) . '">' . __( 'Log out &raquo;', WM_THEME_TEXTDOMAIN ) . '</a></p>',
	'comment_notes_before' => '<p class="note">' . $replyText . '</p>',
	'comment_notes_after'  => '<p class="allowed-tags note"><small><strong>HTML:</strong> ' . __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', WM_THEME_TEXTDOMAIN ) . ' <br /><code>' . allowed_tags() . '</code></small></p>',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => __( 'Leave a reply', WM_THEME_TEXTDOMAIN ),
	'title_reply_to'       => __( 'Leave a reply for %s', WM_THEME_TEXTDOMAIN ),
	'cancel_reply_link'    => __( 'Cancel comment', WM_THEME_TEXTDOMAIN ),
	'label_submit'         => __( 'Post comment', WM_THEME_TEXTDOMAIN ),
	);

?>