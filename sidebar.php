<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>
		<div id="secondary" class="widget-area shadow-curl-right" role="complementary">
		  <header id="the-forge" class="widget-main-header"><h2>The Forge</h2></header>
		  
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			  
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
			  
			  <aside id="recent-posts">
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
          <a href='#' class='btn rounded gradient orange-gradient' id="read-the-forge">Read The Forge</a>
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

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
		
		<?php if((date('N') <= 5) && (date('G', strtotime(current_time('mysql'))) >= 9 && date('G', strtotime(current_time('mysql'))) <= 12) ) : ?>
		<div class="listenLiveWidget widget-area">
      <a id="listen-live" href="http://www.istook.com/f/live" target="_blank">Listen to Istook Live!</a>
		</div>
    <?php endif; ?>