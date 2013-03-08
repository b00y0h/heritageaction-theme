<?php
/**
 * Template Name: Sentinel Pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
get_header(); ?>
<style type="text/css" media="screen">
  .sentinel-content{
    width:700px; 
    min-height:475px;
    float:left;
    color:#000;
    font-family:Georgia;
    font-size:16px;
  }
</style>

		    <div id="hero">
          <div class="inner clearfix">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <p class='page-excerpt'><?php echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
          </div>
        </div>
		<div id="primary" class="content-area">
		  <?php get_sidebar('sentinel'); ?>
			<div id="content" class="site-content sentinel-content" role="main">

        <?php get_template_part('sentinel/page',$post->post_name); ?>
				
        <br><br>
			</div><!-- #content .site-content -->
			<div style="clear:both;"></div>
			
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>