<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

 /*
 Template Name: About Us
 */

get_header(); ?>
		    <div id="hero">
		      <div class="inner">
    		  <h1 id="about_us">About Us</h1>
		      <div class="col1">
		        <a href="http://www.youtube.com/watch?v=xwLCw1oKQcg" rel="lightbox" data-ob_share="false">
  		        <img src="<?php echo get_bloginfo('template_url'); ?>/img/video-image-large.png" alt="Slide1" class="size-full">
  		      </a>
  		      
  		      <?php the_content(); ?>
            
            <p align="center"><a href="/donate" class="btn rounded centered gradient red-gradient">DONATE TO HERITAGE ACTION</a></p>
          </div>
          
          </div> <!-- .inner -->
  		  </div> <!-- #hero -->
   <div id="main-inner">
		<div id="primary" class="content-area">
  		  <h1>Meet The Team</h1>
  		  <div id="content" class="site-content row" role="main">
  		    
  		   	<?php
  					global $query_string; // required
  					global $post;
  					$posts = query_posts('post_type=page&post_parent=' . $post->ID . '&sort_column=menu_order&order=ASC&posts_per_page=-1'); 
  				?>


  						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  						  
  						  
  						  <!-- #<?php echo $post->post_name; ?> -->
                <section id="<?php echo $post->post_name; ?>" class='team-info'>
                  <?php if(file_exists(get_stylesheet_directory().'/img/about-'.$post->post_name.'.jpg')) : ?>
                  <div class="partner-image shadow shadow-curl-left shadow-curl-right float-left">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/img/about-<?php echo $post->post_name; ?>.jpg" alt="<?php the_title(); ?> Photo">
                  </div>
                  <?php endif; ?>
                  <div class="info-detail">
                    <?php the_content(); ?>
                  </div> <!-- .info-detail -->            
                </section>
                <!-- ^^^ end #<?php echo $post->post_name; ?> ^^^ -->
                  						
  							
  						<?php endwhile; // end of the loop. ?>


  				<?php wp_reset_query(); // reset the query ?>
  		    
        
          
          <br><br><br>
          
  			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->    
    </div> <!-- #main-inner -->
    <div id="signup-scroll-target"></div>
    
    
   
<?php get_footer(); ?>