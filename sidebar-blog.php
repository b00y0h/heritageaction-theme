<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package heritageaction
 * @since heritageaction 1.0
 */
?>
<div id="blog-sidebar-header" class="">
  <div id="the-forge-header" class="dark-gray-gradient shadow">
    <a href="/blog"><span>The Forge Blog</span></a>
  </div>
  			<?php do_action( 'before_sidebar' ); ?>
  			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : 

            $args = array(
            	'show_option_all'    => '',
            	'orderby'            => 'name',
            	'order'              => 'ASC',
            	'style'              => 'list',
            	'show_count'         => 0,
            	'hide_empty'         => 1,
            	'use_desc_for_title' => 1,
            	'child_of'           => 0,
            	'feed'               => '',
            	'feed_type'          => '',
            	'feed_image'         => '',
            	'exclude'            => '',
            	'exclude_tree'       => '',
            	'include'            => '13, 7, 19, 32',
            	'hierarchical'       => true,
            	'title_li'           => __( 'Post Categories' ),
            	'show_option_none'   => __('No categories'),
            	'number'             => null,
            	'echo'               => 1,
            	'depth'              => 0,
            	'current_category'   => 0,
            	'pad_counts'         => 0,
            	'taxonomy'           => 'category',
            	'walker'             => null
            ); ?>



          <div id="blog-cat-keys" class="light-gray-gradient shadow">
            <ul>
            <?php wp_list_categories($args); ?> 
            </ul>
          </div>

  			<?php endif; // end sidebar widget area ?>

  </div>
