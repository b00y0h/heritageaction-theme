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
		        <a href="http://www.youtube.com/watch?v=xwLCw1oKQcg" rel="prettyPhoto">
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
			    <img style="width:100%" src="<?php echo get_bloginfo('template_url'); ?>/img/facebook-plugin-widget.gif" alt="Facebook Plugin Widget">
			  </aside>
			  
			  <aside id='latest-tweets'>
			    <h3 class='widget-title'>Latest Tweets</h3>
			    <ul>
           <li>
             <span class="meta">30 MINUTES</span>
             <span class="excerpt"><b>@Heritage_Action</b> More fallout from #solyndra http://heritageaction.com/2012/07/can-president-obama-name-one-clean-energy-success/ … via @heritage_action</span>
           </li>
           <li>
             <span class="meta">1 Hour</span>
             <span class="excerpt"><b>@Heritage_Action</b> Heritage Action Daily is out! http://bit.ly/qzLtTL </span>
           </li>
           <li>
             <span class="meta">2 Hour</span>
             <span class="excerpt"><b>@Heritage_Action</b> More fallout from #solyndra http://heritageaction.com/2012/07/can-president-obama-name-one-clean-energy-success/ … via @heritage_action</span>
           </li>
			    </ul>
          <a href="#" id="follow-twitter">Follow @Heritage_Action</a>
			  </aside>

		</div><!-- #secondary .widget-area -->
		
		<?php if((date('N') <= 5) && (date('G', strtotime(current_time('mysql'))) >= 9 && date('G', strtotime(current_time('mysql'))) <= 11) ) : ?>
		<div class="listenLiveWidget widget-area">
      <a id="listen-live" href="http://www.istook.com/f/live" target="_blank">Listen to Istook Live!</a>
		</div>
		<div style="clear:both;"></div>
    <?php endif; ?>