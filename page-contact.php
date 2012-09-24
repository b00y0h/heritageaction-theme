<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

 /*
 Template Name: Donate
 */
add_filter( 'body_class', 'my_neat_body_class_donate');
function my_neat_body_class_donate( $classes ) {
      $classes[] = 'contact custom';
     return $classes;
}
get_header(); ?>
		    <div id="hero">
          <div class="inner clearfix">
    		  <h1 id="about_us">Contact Us</h1>
    		  <p>We would love to hear from you! Please fill out this form and we will get in touch with you shortly.</p>
    		  <div id="content" class="site-content form-horizontal" role="main">
  		    <div class="row">
            <div class="col1">
              

            </div> <!-- .col1 -->

            <div class="col2">


            </div> <!-- .col2 -->

          </div>

    			</div><!-- #content .site-content -->


          </div> <!-- .inner -->
  		  </div> <!-- #hero -->

   
<?php get_footer(); ?>