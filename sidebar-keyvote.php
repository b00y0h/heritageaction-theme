<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
		  <header id="subscribe" class="widget-main-header">
		    <a href="http://feeds.feedburner.com/keyvotes" target="_blank">
		      <h2><i class="icon-rss-cones"></i>Get Key Votes
		        <span class="via"><i class="icon-rss-bug"></i>via Feedburner</span>
		      </h2>
		    </a>
		  </header>
      
			  
			  <aside id="recent-key-votes" class="widget">
			    <h3 class='widget-title'>Recent Key Votes</h3>
			    <ul>                
              <?php 
    			      $args = array(
                    'numberposts' => 5,
                    'offset' => 0,
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
                  <span class='excerpt'><?php echo truncateWords(get_the_excerpt(),185); ?>[...]</span>                  
                </li>
                
              	<?php wp_reset_postdata(); endforeach; ?>
            
			    </ul>
			  </aside>
			 
			  

		</div><!-- #secondary .widget-area -->
		
		<?php if((date('N') <= 5) && (date('G', strtotime(current_time('mysql'))) >= 9 && date('G', strtotime(current_time('mysql'))) <= 11) ) : ?>
		<div class="listenLiveWidget widget-area only-desktop">
      <a id="listen-live" href="http://www.istook.com/f/live" target="_blank">Listen to Istook Live!</a>
		</div>
		<div style="clear:both;"></div>
    <?php endif; ?>