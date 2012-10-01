<?php
/*
Template Name: Congress Pages
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>
<?php //set comment defaults
$fields =  array(
	'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><label for="author">' . __( 'Name' ) . '</label> <span class="required">*</span></p>',
	'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><label for="email">' . __( 'Email' ) . '</label> <span class="required">*</span></p>',
	'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">' . __( 'Website' ) . '</label>' .
	            '</p>',
);
$defaults = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => __( 'Speak Your Mind' ),
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' )
);
$args = array(
	'type' => 'comment',
	'avatar_size' => 48
);
?>

<style type="text/css" media="screen">
  #single-content-top{
    height:37px;
  }
</style>

<div id="content-sidebar-wrap"> 
 <div id="single-content-top"></div>
 <div id="content" class="hfeed noSidebar"> 
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:960px;">
   <div class="entry-content"> 
    <?php the_content(); ?>
   </div>
  
  </div>
 </div>
 
<?php get_footer(); ?>