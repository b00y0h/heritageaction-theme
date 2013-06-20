<?php 
/* Template Name: latest-post-info */

 header('Access-Control-Allow-Origin: *');  

  $featured_category = get_term_by('name', 'Featured', 'category');
  $latest_post = new WP_Query(array('posts_per_page'=>'1', 'post_type'=>'post','orderby' => 'post_date',
  'order' => 'DESC', 'ignore_sticky_posts' => 1, 'cat'=>$featured_category->term_id));
  while($latest_post->have_posts()): $latest_post->the_post();?>
 <a class="blog-link" href="<?php the_permalink(); ?>">
   <h6 class="blog-title"><?php echo the_title(); ?></h6>
   <span class="blog-date"><?php the_date(); ?></span>
 </a>
 <?php endwhile; wp_reset_postdata(); ?>