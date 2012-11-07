<?php
/*
Template Name: Sentinel Slider
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>

<!-- <script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script> -->

<style type="text/css" media="screen">
  #homepage_bot{
    display:none;
  }
  #content-sidebar-wrap{
    min-height:0px !important;
  }
  
  #sentinelSlider{
     height:420px;
  }
  
  .sliderWrap{
    float:left;
    width:570px;
    height:420px;
    border:1px dashed #ccc;
  }
  
  .sWrap{
    width:570px;
    position:absolute;
  }
  
  .rightSideCol{
    float:right;
    width:270px;
    height:400px;
  }
  
  .sentinelWidget{
    width:270px;
    height:200px;
    border-left:1px dashed #ccc;
    border-bottom:1px dashed #ccc;
    border-top:1px dashed #ccc;
    padding-left:10px;
    padding-top:10px;
  }
  
  .slide{
    background-color:#fff;
    width:520px !important;
    height:400px;
    padding:15px 40px;
    overflow-y: auto;
  }
  
  .cy_left, .cy_right {
    bottom: 8px;
    cursor: pointer;
    height: 100%;
    position: absolute;
    width: 75px;
    z-index: 1102;
  }
  
  .cy_left{
    left: -30px;
  }
  .cy_right{
    right:-30px;
  }
  
  .cy_cs{
    background:none;
    text-align: center;
    line-height:22px;
    font-weight:bold;
    font-size:15px;
    text-indent:0.1em;

    width:25px;
    height:25px;

    color:#fff;

    border:2px solid #fff;
    -webkit-border-radius: 90px;
    -moz-border-radius: 90px;
    border-radius: 90px;

    background-color:#000;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */

    -webkit-box-shadow: 0px 0px 7px rgba(50, 50, 50, 1);
    box-shadow:         0px 0px 7px rgba(50, 50, 50, 1);

    cursor:pointer;
    
    position:absolute;
    top:50%;
  }
  
  .cy_left:hover, .cy_right:hover{
    text-decoration:none !important;
  }
  
  #cy_right-ico{
     line-height:27px !important;
     text-indent:0.2em !important;
     right:10px;
  }
  #cy_left-ico{
     text-indent:0 !important;
     line-height:25px !important;
     left:10px;
  }
  #cy_right-ico:before{
     /*content: "\25B6";*/
  }
  #cy_left-ico:before{
     /*content: "\25C0";*/
  }
  
</style>
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

<script type="text/javascript">
  (function($){
    $(document).ready(function(){
      $(".sliderWrap p#top").remove();
      $(".sliderWrap").cycle({
        fx: 'scrollLeft', 
        timeout: 0, 
        next:   '#next', 
        prev:   '#prev'
      })
    })
  })(jQuery);
</script> 

<div id="hero">
  <div class="inner clearfix">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p class='page-excerpt'><?php echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
  </div>
</div>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		
     <div id="sentinelSlider">
       
       <div class="sWrap">
         
         <div class="sliderWrap">
           
            <?php the_content(); ?>
                 
         </div>
       
         <a id="next" class="cy_right">
           <span class="cy_cs" id="cy_right-ico">&#9654;</span>
         </a>
         <a id="prev" class="cy_left">
           <span class="cy_cs" id="cy_left-ico">&#9664;</span>
         </a>
         
      </div>
      
       <div class="rightSideCol">
         
         <div class="sentinelSignup sentinelWidget">
           <a href="http://heritageaction.com/sentinel/influenceprofile/">
             <img src="<?php bloginfo('template_directory'); ?>/images/become-sentinel.png" width="260">
           </a>
         </div>
         
         <div class="sentelMembers sentinelWidget">
           <a href="http://heritageaction.com/sentinel/reportaction/">
             <img src="<?php bloginfo('template_directory'); ?>/images/already-sentinel.png" width="260">
           </a>
         </div>
         
       </div>
        
     	 <div style="clear:both;"></div>
     </div>
     <div style="clear:both;height:15px;"></div>
     
      <?php echo get_post_meta($post->ID,"Description",true);?>
      <br><br>
    

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>