<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>

<div id="main-inner" class="hs-content-wrapper">
		    
		    
		    <!-- ============== -->
		    <!-- = Score Card = -->
		    <!-- ============== -->
		    
         <div id="panel1" class="hs-content widgets">
 		      <div class="widgets-inner">
           <header class="gradient light-blue-gradient">
             <h2 class="title">Score Card</h2>
           </header>
           <div id="scorecard-map">
             <img src="<?php echo get_bloginfo('template_url'); ?>/img/scorecard-map.gif" alt="Scorecard Map" class="size-full">
           </div>
           <a href="http://heritageactionscorecard.com" class="btn rounded gradient medium-blue-gradient">Get the scores</a>
           </div>
         </div>
         
         
         <!-- =================== -->
         <!-- = Action Dashboard = -->
         <!-- =================== -->
         
         <div id="panel2" class="hs-content widgets" style="display:none;">
           <div class="widgets-inner">
           <header class="gradient red-gradient">
             <h2 class="title">Action Dashboard</h2>
           </header>
           <p class="post-title">Holding your Members of Congress accountable starts here.</p>
           <!-- enter your zip -->
           <div class="control-group question">
             <div class="controls input">
               <input type="search" class="dashboardZipSearch" name="enter_your_zip" id="enter_your_zip" placeholder="Enter your zip or district code">
             </div>
           </div>
           <!-- ^^^^^ enter your zip ^^^^^^ -->
           
           <a href="#" class="btn rounded gradient red-gradient dashboardZipGo">Find your district</a>
           </div>
         </div>
         
       
       <!-- ================== -->
       <!-- = The Forge Blog = -->
       <!-- ================== -->

       <?php get_sidebar('home'); ?>
       
       <!-- ========== -->
       <!-- = Donate = -->
       <!-- ========== -->
        <div id="panel4" class="hs-content widgets">
           <div class="widgets-inner">
           <header class="gradient red-gradient">
             <h2 class="title">Support Heritage Action</h2>
           </header>
           <p>
             <em>“Heritage Action is the political muscle that turns conservative policy ideas into conservative realities on Capitol Hill.”</em><br>
                &nbsp;&nbsp;&nbsp;–Sean Hannity
           </p>
           <p>
             <em>“I support Heritage Action for America. I write about them, I give them money, I sign up for their emails. You should too.”</em><br>
             &nbsp;&nbsp;&nbsp;–Erick Erickson, RedState.com
           </p>
           <a href="/donate" class="btn rounded gradient red-gradient">Donate</a>
           </div>
        </div> 

       <!-- ============= -->
       <!-- = Key Votes = -->
       <!-- ============= -->
       
 			<div id="panel5" class="hs-content widgets">
 			  <div class="widgets-inner">
         <header class="gradient blue-gradient">
           <h2 class="title">Key Votes</h2>
         </header>

         <fieldset class="switch">
         	<legend></legend>

         	<input id="house" name="view" type="radio" value="house"  class="keyVoteSelector" checked>
         	<label for="house">House</label>

         	<input id="senate" name="view" type="radio" value="senate" class="keyVoteSelector">	
         	<label for="senate">Senate</label>

         	<span class="switch-button"></span>
         </fieldset>
           <!-- ^^^^^ house-senate switcher ^^^^^^ -->
         
         <ul class="items items_house">
           <?php 
			      $args = array(
               'numberposts' => 2,
               'offset' => 0,
               'taxonomy' => 'chamber',
               'term' => 'key-vote-house',
               'orderby' => 'post_date',
               'order' => 'DESC',
               'post_status' => 'publish',
               'post_type' => 'key-votes'); 
               
           $house_key_votes = wp_get_recent_posts( $args );
           foreach( $house_key_votes as $house_key_vote ): 
              $post_id = $house_key_vote['ID'];
              $post = get_post($post_id);
              setup_postdata($post);
           ?>
           
         	<li class='<?php echo get_post_meta($post_id,"key_vote_type",true); ?>'><a href="<?php the_permalink(); ?>">
             <span class='post-title'><?php the_title(); ?></span></a>
             <span class='excerpt'><?php echo mb_strimwidth(get_the_excerpt(),0,80,'[...]'); ?></span>                  
           </li>
           
         	<?php wp_reset_postdata(); endforeach; ?>
           
         </ul>

         <ul class="items items_senate">
           <?php
                    
			      $args = array(
               'numberposts' => 2,
               'offset' => 0,
               'taxonomy' => 'chamber',
               'term' => 'key-vote-senate',
               'orderby' => 'post_date',
               'order' => 'DESC',
               'post_status' => 'publish',
               'post_type' => 'key-votes'); 
               
           $house_key_votes = wp_get_recent_posts( $args );
           foreach( $house_key_votes as $house_key_vote ): 
              $post_id = $house_key_vote['ID'];
              $post = get_post($post_id);
              setup_postdata($post);
           ?>

           	<li class='<?php echo get_post_meta($post_id,"key_vote_type",true); ?>'><a href="<?php the_permalink(); ?>">
               <span class='post-title'><?php the_title(); ?></span></a>
               <span class='excerpt'><?php echo mb_strimwidth(get_the_excerpt(),0,80,'[...]'); ?></span>                  
             </li>

           	<?php wp_reset_postdata(); endforeach; ?>

           </ul>
         
         <a id="more-key-votes-link" href="/chamber/key-vote-house/" class="btn rounded gradient blue-gradient">More Key Votes</a>
         
         </div>
 			</div> <!-- #key-votes -->

       <!-- ================== -->
       <!-- = Press Releases = -->
       <!-- ================== -->

       <div id="panel6" class="hs-content widgets">
         <div class="widgets-inner">
         <header class="gradient orange-gradient">
           <h2 class="title">Press Releases &amp; Statements</h2>
         </header>
         <div id="press-release-slider" >

           <div class="viewport">
             <ul class="overview">
                   <?php

         		      $args = array(
                       'numberposts' => 2,
                       'offset' => 0,
                       'orderby' => 'post_date',
                       'order' => 'DESC',
                       'post_status' => 'publish',
                       'post_type' => 'press-releases'); 

                   $house_key_votes = wp_get_recent_posts( $args );
                   foreach( $house_key_votes as $house_key_vote ): 
                      $post_id = $house_key_vote['ID'];
                      $post = get_post($post_id);
                      setup_postdata($post);
                   ?>

                 <li class="press-release-slide">
                   <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                   <span class="post-meta"><?php heritageaction_posted_on(); ?></span>
                   <p><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_excerpt(),0,100); ?></a></p>
                 </li>

                 <?php wp_reset_postdata(); endforeach; ?>
              </ul>
           </div>



         <a href='/press-releases/' class='btn rounded gradient orange-gradient'>Read More</a>

         </div>
         </div>
       </div> <!-- #recent-press-releases -->

       <!-- ============ -->
       <!-- = About Us = -->
       <!-- ============ -->
       
       <div id="panel7" class="hs-content widgets">
         <div class="widgets-inner">
         <header class="gradient medium-blue-gradient">
           <h2 class="title">About Us</h2>
         </header>
         <div id="about-us-video" class="video">
           <a href="http://www.youtube.com/watch?v=xwLCw1oKQcg" rel="lightbox" data-ob_share="false">
             <img class="size-full" src="<?php echo get_bloginfo('template_url'); ?>/import-image/video-slug.jpg" alt="About Us">
           </a>
           <div class="overlay"></div>
         </div>
         
         <?php /* ?>
         <div class="social">
           <div id="fb-widget-like" class="fb-like" data-href="https://www.facebook.com/heritageforamerica" data-send="true" data-layout="button_count" data-width="175" data-show-faces="false"></div>

           <div class="twitter-widget-share">  
             <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://heritageaction.com" data-text="Conservatives holding Congress accountable: " data-via="Heritage_Action" data-hashtags="haction" data-dnt="true">Tweet</a>
             <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
           </div> 

           <div style="clear:both;"></div>
         </div>  
          */ ?>
         <a href="/about" class='btn rounded gradient medium-blue-gradient'>More</a>
         </div>
       </div> <!-- #about-us -->
       
       <!-- ========== -->
       <!-- = Search = -->
       <!-- ========== -->
       
       <div id="panel8" class="hs-content widgets">
         <div class="widgets-inner">
           <header class="gradient blue-gradient">
             <h2 class="title">Search</h2>
           </header>
           <?php get_search_form(); ?>
		      </div>
       </div>

 
 </div> <!-- #main-inner -->
 


	</div><!-- #main .site-main -->

</div><!-- #hs-container .hs-container -->

<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5004756-2']);
  _gaq.push(['_setDomainName', 'ha.andrefredette.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php wp_footer(); ?>
</body>
</html>