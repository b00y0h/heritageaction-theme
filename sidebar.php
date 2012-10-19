<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>
		<div id="secondary" class="widget-area shadow-curl-right" role="complementary">
		  <header id="subscribe" class="widget-main-header">
		    <a href="#">
		      <h2>Subscribe
		        <span class="via">via Feedburner</span>
		      </h2>
		      </a>
		    </header>
		    
		    <aside id="widget-search" class="widget">		      
		      <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <input type="hidden" name="search_post_type" value="post" />
        		<label for="s" class="assistive-text"><?php _e( 'Search', 'heritageaction' ); ?></label>
        		<input type="text" class="field search-input" name="s" value="" id="s" placeholder="<?php esc_attr_e( 'Search the Forge &hellip;', 'heritageaction' ); ?>" />
        		<div id="search-btn" class="go gradient blue-gradient"><div class="arrow-right"></div></div> 

        	</form>
		    </aside>
		    
		    <aside id="widget-about-us" class="widget">
		      <h3>About Us</h3>
		      <div class="video shadow">
		        <a href="http://www.youtube.com/watch?v=xwLCw1oKQcg" rel="lightbox" data-ob_share="false">
            <img class="size-full" src="<?php echo get_bloginfo('template_url'); ?>/import-image/video-slug.jpg" alt="About Us">
            </a>
            <div class="overlay"></div>
          </div>
          <p>For too long, big-government special interests have dominated Washington. Heritage Action's DC-based staff and local activists break through the establishment in Washington, ensuring Members of Congress get the right message.</p>
          <div class="social">
            
            <div id="fb-widget-like" class="fb-like" data-href="https://www.facebook.com/heritageforamerica" data-send="true" data-layout="button_count" data-width="175" data-show-faces="false"></div>
          
            <div class="twitter-widget-share">  
              <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://heritageaction.com" data-text="Conservatives holding Congress accountable: " data-via="Heritage_Action" data-hashtags="haction" data-dnt="true">Tweet</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            
            <div style="clear:both;"></div>
          </div>
          
		    </aside>
		    
		    
		    <aside id="hot_threads" class="widget">
  			    <h3 class='widget-title'>Popular Threads</h3>
			    <?php
			      
			        $hot_threads = heritageaction_hot_disqus_threads();
			        if($hot_threads) {
			          foreach($hot_threads as $thread) : ?>
			          
			            <div class="hot_disqus_thread">
			              <a href="<?php echo $thread->link; ?>"><?php echo $thread->title; ?></a><br>
			              <span class="small">Comments <?php echo $thread->posts; ?></span> &nbsp;
			              <span class="small">Likes <?php echo $thread->likes; ?></span> &nbsp;
			              <span class="small">Dislikes <?php echo $thread->dislikes; ?></span> &nbsp;
			              <span class="small">Reactions <?php echo $thread->reactions; ?></span>
			            </div>
			            <hr/>
			          
			          <?php   
			          endforeach;
			        }
			          

			    ?>
			    
			  </aside>
			  
			  
			  <aside id="featured-posts" class="widget">
			    <h3 class='widget-title'>Featured Posts</h3>
			    <ul>
			      <?php
			      $cat_id = get_cat_ID('featured');
			      $args = array(
                'numberposts' => 2,
                'offset' => 0,
                'category' => $cat_id,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'draft, publish, future, pending, private',
                'suppress_filters' => true ); 
                
                $recent_posts = wp_get_recent_posts( $args );
                
                
                
                
                foreach( $recent_posts as $recent ){
                  $user_info = get_userdata($recent["post_author"]);
                  $first = $user_info->first_name;
                  $last = $user_info->last_name;
                  $full_name = $first . ' ' . $last;
                  
              		echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" ><span class="post-title">' .   $recent["post_title"].'</span> <span class="meta">' . $full_name . ' | ' . mysql2date('F jS Y', $recent["post_date"]) . '</span><p class="excerpt">' . $recent["post_excerpt"] . '</p></a> </li> ';
              	}
                ?>
            
			    </ul>
			  </aside>
			  
			  <aside id="recent-posts" class="widget">
			    <h3 class='widget-title'>Recent Posts</h3>
			    <ul>
			      <?php
			      $cat_id = get_cat_ID('featured');
			          $args = array(
                'numberposts' => 3,
                'offset' => 0,
                'category' => '',
                'orderby' => 'post_date',
                'order' => 'DESC',
                'category__not_in' => array($cat_id),
                'post_type' => 'post',
                'post_status' => 'draft, publish, future, pending, private',
                'suppress_filters' => true ); 
                
                $recent_posts = wp_get_recent_posts( $args );
                
                foreach( $recent_posts as $recent ){
                  $user_info = get_userdata($recent["post_author"]);
                  $first = $user_info->first_name;
                  $last = $user_info->last_name;
                  $full_name = $first . ' ' . $last;
                  
              		echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" ><span class="post-title">' .   $recent["post_title"].'</span> <span class="meta">' . $full_name . ' | ' . mysql2date('F jS Y', $recent["post_date"]) . '</span><p class="excerpt">' . $recent["post_excerpt"] . '</p></a> </li> ';
              	}
                ?>
          </ul>
			  </aside>
			  
			  <aside id="facebook-page-wall" class="widget">
			    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fheritageforamerica&amp;width=263&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true&amp;appId=230985136998283" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:263px; height:590px;" allowTransparency="true"></iframe>			    
			  </aside>
			  
			  <aside id='latest-tweets'>
			    <h3 class='widget-title'>Latest Tweets</h3>
			    <ul>
           <?php echo twitter_feed($user='heritage_action', $count='5'); ?>
			    </ul>
          <a href="https://twitter.com/Heritage_Action" id="follow-twitter" target="_blank">Follow @Heritage_Action</a>
			  </aside>

		</div><!-- #secondary .widget-area -->
		
		<?php if((date('N') <= 5) && (date('G', strtotime(current_time('mysql'))) >= 9 && date('G', strtotime(current_time('mysql'))) <= 11) ) : ?>
		<div class="listenLiveWidget widget-area">
      <a id="listen-live" href="http://www.istook.com/f/live" target="_blank">Listen to Istook Live!</a>
		</div>
		<div style="clear:both;"></div>
    <?php endif; ?>