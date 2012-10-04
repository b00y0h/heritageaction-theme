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
		      <?php get_search_form(); ?>
		    </aside>
		    
		    <aside id="widget-about-us" class="widget">
		      <h3>About Us</h3>
		      <div class="video shadow">
		        <a href="http://www.youtube.com/watch?v=xwLCw1oKQcg" rel="lightbox" data-ob_share="false">
            <img class="size-full" src="<?php echo get_bloginfo('template_url'); ?>/import-image/video-slug.jpg" alt="About Us">
            </a>
            <div class="overlay"></div>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="social">
            <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-recommend.gif" alt="Fb Recommend"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-send.gif" alt="Fb Send"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/twitter.gif" alt="Twitter">
          </div>
          
		    </aside>
		    
		    <aside id="disqus-comments" class="widget">
			    <img style="width:100%" src="<?php echo get_bloginfo('template_url'); ?>/img/disqus-plugin-widget.gif" alt="Disqus Plugin Widget">
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