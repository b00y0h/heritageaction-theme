<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
 
 global $post;
 $keyvote_count = 5;
?>  
    <?php if(is_single()): ?>
      <?php if(get_post_meta($post->ID, 'key_vote_bill_number', true)) : $keyvote_count = 3; ?>
        
        <div style="width:280px; float:right; margin:0 26px 10px 0;">
          <iframe src="https://www.popvox.com/widgets/minimap?&bill=<?php echo @get_post_meta($post->ID, 'key_vote_congress', true); ?>/<?php echo strtolower(get_post_meta($post->ID, 'key_vote_bill_number', true)); ?>&stats=1&title=1" scrolling="no" border="0" marginheight="0" marginwidth="0" frameborder="0" width="280" height="<?php echo @(get_post_meta($post->ID, 'key_vote_congress', true)=='112') ? '340' : '740';  ?>" style="border:1px solid #cc6a11"> </iframe>
          <br>
          <center>
            <small>
              powered by <a href="https://www.popvox.com" target="_blank">popvox.com</a>
            </small>
          </center>
        </div>
      <?php endif; ?>
    
    <?php endif; ?>
    
		<div id="secondary" class="widget-area" role="complementary">
		  <header id="subscribe" class="widget-main-header">
		    <a href="http://feeds.feedburner.com/keyvotes" target="_blank">
		      <h2><i class="icon-rss-cones"></i>Get Key Votes
		        <span class="via"><i class="icon-rss-bug"></i>via Feedburner</span>
		      </h2>
		    </a>
		  </header>
      
			  
			  <aside id="recent-house-key-votes" class="widget">
			    <h3 class='widget-title'><a href="/chamber/key-vote-house/">House Key Votes</a></h3>
			    <ul>                
              <?php 
    			      $args = array(
                    'numberposts' => $keyvote_count,
                    'offset' => 0,
                    'taxonomy' => 'chamber',
                    'term' => 'key-vote-house',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'key-votes',
                    'post_status'=>'publish'); 
                    
                $house_key_votes = wp_get_recent_posts( $args );
                foreach( $house_key_votes as $house_key_vote ): 
                   $post_id = $house_key_vote['ID'];
                   $post = get_post($post_id);
                   setup_postdata($post);
                ?>
                
              	<li class='<?php echo get_post_meta($post_id,"key_vote_type",true); ?>'><a href="<?php the_permalink(); ?>">
                  <span class='post-title'><?php the_title(); ?></span></a>
                  <span class="meta"><?php echo the_date('F jS, Y'); ?></span>
                  <span class='excerpt'><?php echo truncateWords(get_the_excerpt(),185); ?>[...]</span>                  
                </li>
                
              	<?php wp_reset_postdata(); endforeach; ?>
            
			    </ul>
			  </aside>
			  
			  <aside id="recent-senate-key-votes" class="widget">
			    <h3 class='widget-title'><a href="/chamber/key-vote-senate/">Senate Key Votes</a></h3>
			    <ul>                
              <?php 
    			      $args = array(
                    'numberposts' => $keyvote_count,
                    'offset' => 0,
                    'taxonomy' => 'chamber',
                    'term' => 'key-vote-senate',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'key-votes',
                    'post_status'=>'publish'); 
                    
                $house_key_votes = wp_get_recent_posts( $args );
                foreach( $house_key_votes as $house_key_vote ): 
                   $post_id = $house_key_vote['ID'];
                   $post = get_post($post_id);
                   setup_postdata($post);
                ?>
                
              	<li class='<?php echo get_post_meta($post_id,"key_vote_type",true); ?>'><a href="<?php the_permalink(); ?>">
                  <span class='post-title'><?php the_title(); ?></span></a>
                  <span class="meta"><?php echo the_date('F jS, Y'); ?></span>
                  <span class='excerpt'><?php echo truncateWords(get_the_excerpt(),185); ?>[...]</span>                  
                </li>
                
              	<?php wp_reset_postdata(); endforeach; ?>
            
			    </ul>
			  </aside>
			 
			  

		</div><!-- #secondary .widget-area -->
