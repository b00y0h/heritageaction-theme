<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

 /*
 Template Name: Home
 */

get_header(); ?>

<?php set_transient('ha_takeover', serialize(array(
	'url' => urlencode('http://www.youtube.com/watch?v=39sKHeK3l0Y'), 
	'title' => '', 
	'description' => '',
	'link' => '',
	'link_text' => '' )));  ?>



<script type="text/javascript" charset="utf-8">		
		(function($){
			$(document).ready(function(){
				
				<?php  
				$takeover = (get_transient('ha_takeover'));
				$takeover = @unserialize($takeover);
				if($takeover && isset($takeover['url']) && !empty($takeover['url'])) : 
					$takeover_url = $takeover['url'];
					$takeover_title = (!empty($takeover['title'])) ? $takeover['title'] : '';
					$takeover_description = (!empty($takeover['description'])) ? $takeover['description'] : '';
					if(!empty($takeover['link'])) {
					  $takeover_link_text = (!empty($takeover['link_text'])) ? $takeover['link_text'] : 'Take Action';
					  $takeover_description .= urlencode("<div align='center'><a href=\"{$takeover['link']}\" class=\"btn rounded gradient medium-blue-gradient\">$takeover_link_text</a></div>");
					}
				?>
				if(getCookie('seen_takeover') != '<?php echo $takeover_url; ?>'){
					$(document).orangeBox('createCustom', {
						href : decodeURIComponent(('<?php echo $takeover_url; ?>' + '').replace(/\+/g, '%20')), 
						title: decodeURIComponent(('<?php echo $takeover_title; ?>' + '').replace(/\+/g, '%20')), 
						caption: decodeURIComponent(('<?php echo $takeover_description; ?>' + '').replace(/\+/g, '%20'))});
					  setCookie('seen_takeover', '<?php echo $takeover_url; ?>', '1776');
				}
				
				
				<?php endif; ?>
				
			})
		})(jQuery);
</script>

<div id="main-outer">
   <div id="main-inner">
		<div id="primary" class="content-area">
		    <div id="hero">
		      <?php echo do_shortcode('[royalslider id="1"]'); ?>
  		    <div class="diag-stripes"></div>
  		  </div>
  		  
  		  <div id="content" class="site-content" role="main">
          <div class="col1">
      			<div id="key-votes" class="widgets shadow-curl-left">
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
                    'numberposts' => 4,
                    'offset' => 0,
                    'taxonomy' => 'chamber',
                    'term' => 'key-vote-house',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'key-votes'); 
                    
                $house_key_votes = wp_get_recent_posts( $args );
                foreach( $house_key_votes as $house_key_vote ): 
                   $post_id = $house_key_vote['ID'];
                   $post = get_post($post_id);
                   setup_postdata($post);
                ?>
                
              	<li class='<?php echo get_post_meta($post_id,"key_vote_type",true); ?>'><a href="<?php the_permalink(); ?>">
                  <span class='post-title'><?php the_title(); ?></span></a>
                  <span class='excerpt'><?php echo truncateWords(get_the_excerpt(),95); ?>[...]</span>                  
                </li>
                
              	<?php wp_reset_postdata(); endforeach; ?>
                
              </ul>

              <ul class="items items_senate">
                <?php
                         
    			      $args = array(
                    'numberposts' => 4,
                    'offset' => 0,
                    'taxonomy' => 'chamber',
                    'term' => 'key-vote-senate',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'key-votes'); 
                    
                $house_key_votes = wp_get_recent_posts( $args );
                foreach( $house_key_votes as $house_key_vote ): 
                   $post_id = $house_key_vote['ID'];
                   $post = get_post($post_id);
                   setup_postdata($post);
                ?>

                	<li class='<?php echo get_post_meta($post_id,"key_vote_type",true); ?>'><a href="<?php the_permalink(); ?>">
                    <span class='post-title'><?php the_title(); ?></span></a>
                    <span class='excerpt'><?php echo truncateWords(get_the_excerpt(),95); ?>[...]</span>                  
                  </li>

                	<?php wp_reset_postdata(); endforeach; ?>

                </ul>
              
              <a id="more-key-votes-link" href="/chamber/key-vote-house/" class="btn rounded gradient blue-gradient">More Key Votes</a>
              
              
      			</div> <!-- #key-votes -->
          </div> <!-- .col1 -->
          
          <div class="col2">
            <div id="score-card" class="widgets">
              <header class="gradient light-blue-gradient">
                <h2 class="title">Score Card</h2>
              </header>
              <div id="scorecard-map">
                <img src="<?php echo get_bloginfo('template_url'); ?>/img/scorecard-map.gif" alt="Scorecard Map" class="size-full">
              </div>
              <a href="http://heritageactionscorecard.com" class="btn rounded gradient medium-blue-gradient">Get the scores</a>
            </div>
            
            <div id="action-dashboard" class="widgets">
              <header class="gradient red-gradient">
                <h2 class="title">Action Dashboard</h2>
              </header>
              <p class="post-title">Holding your Members of Congress accountable starts here.</p>
              <p>Find your dashboard: enter your zip code or your district code (Maine's first district would be ME01):</p>
              <!-- enter your zip -->
              <div class="control-group question">
                <div class="controls input">
                  <input type="search" class="dashboardZipSearch" name="enter_your_zip" id="enter_your_zip" placeholder="Enter your zip">
                </div>
              </div>
              <!-- ^^^^^ enter your zip ^^^^^^ -->
              
              <a href="#" class="btn rounded gradient red-gradient dashboardZipGo">Find your district</a>
            </div>
            
          </div> <!-- .col2 -->

  			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->
    <?php get_sidebar('home'); ?>
    
    </div> <!-- #main-inner -->
    
    </div> <!-- #main-outer -->

    <div id="black-bg"></div>
    
    <?php heritageaction_signup_section(); ?>
    
    <section id='under-cover'>
      <div class="inner">
        <div class="col1">
        <div id="recent-press-releases" class="widgets shadow-curl-left">
          <header class="gradient orange-gradient">
            <h2 class="title">Press Releases &amp; Statements</h2>
          </header>
          <div id="press-release-slider" >
            
            <div class="viewport">
              <div class="overview">
                    <?php
                   
          		      $args = array(
                        'numberposts' => 4,
                        'offset' => 0,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'press-releases'); 
              
                    $house_key_votes = wp_get_recent_posts( $args );
                    foreach( $house_key_votes as $house_key_vote ): 
                       $post_id = $house_key_vote['ID'];
                       $post = get_post($post_id);
                       setup_postdata($post);
                    ?>

                  <div class="press-release-slide">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <span class="post-meta"><?php echo date('F d, Y', strtotime($post->post_date)); ?></span>
                    <p><?php echo truncateWords(get_the_excerpt(),350); ?></p>
                    <a href="<?php the_permalink(); ?>">READ FULL PRESS RELEASE</a>
                  </div>

                  <?php wp_reset_postdata(); endforeach; ?>
               </div>
            </div>
         
          
            
          <div class="pagination pagination-centered orange">
            <ul class="pager">
              <li><a class="prev" href="#">&lt;</a></li>
              <li><a rel="0" class="pagenum" href="#">1</a></li>
              <li><a rel="1" class="pagenum" href="#">2</a></li>
              <li><a rel="2" class="pagenum" href="#">3</a></li>
              <li><a rel="3" class="pagenum" href="#">4</a></li>
              <li><a class="next" href="#">&gt;</a></li>
           </ul>
          </div>
          
          </div>
          
        </div> <!-- #recent-press-releases -->
        </div>
        <div class="col2">
        <div id="about-us" class="widgets shadow-curl-right">
          <header class="gradient medium-blue-gradient">
            <h2 class="title">About Us</h2>
          </header>
          <div id="about-us-video" class="video">
            <a href="http://www.youtube.com/watch?v=xwLCw1oKQcg" rel="lightbox" data-ob_share="false">
              <img class="size-full" src="<?php echo get_bloginfo('template_url'); ?>/import-image/video-slug.jpg" alt="About Us">
            </a>
            <div class="overlay"></div>
          </div>
          
          <div class="social">
            <div class="twitter-widget-share">  
              <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://heritageaction.com" data-text="Conservatives holding Congress accountable: " data-via="Heritage_Action" data-hashtags="haction" data-dnt="true">Tweet</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            
            <div id="fb-widget-like" class="fb-like" data-href="https://www.facebook.com/heritageforamerica" data-send="true" data-layout="button_count" data-width="175" data-show-faces="false"></div>
          
            <div style="clear:both;"></div>
          </div>  
          <a href="/about" class='btn rounded gradient medium-blue-gradient'>More</a>
        </div> <!-- #about-us -->

        </div> <!-- .col2 -->


      </div> <!-- .inner -->
    </section>
    
<?php get_footer(); ?>