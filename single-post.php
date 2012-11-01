<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>

<div class="single-post-spacer"></div>  

<div id="main-inner">

		<div id="primary" class="content-area">
			<div id="content" class="site-content single-post-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php // heritageaction_content_nav( 'nav-above' ); ?>
				<?php
          if (is_singular('post') && get_the_post_thumbnail() !="" ) { // check if the post has a Post Thumbnail assigned to it.  
            echo '<div class="single-post-featured-image">';
                the_post_thumbnail(array(571,319), array('class' => 'featured-image', 'width' => '587'));
            echo "</div>";
          } 
        ?>
				
				
				<h1 class="entry-title single-post-title"><?php the_title(); ?></h1>
			  
			  <div class="single-post-meta">
			    <?php
			      $post_category = get_the_category();
        
			      if ($post_category) {
			        echo "<span class='single-post-meta-section'>Category:</span> ";
              foreach($post_category as $category) {
                $categories[] = "<a href=\"" . get_category_link($category->term_id) . "\">" . ucwords($category->name) . "</a>";
              }
              echo implode($categories, ', ');
            }
			    ?>
			    &nbsp;&nbsp;&nbsp;
			    <?php
			      $post_tags = get_the_tags();
			      if ($post_tags) {
			        echo "<span class='single-post-meta-section'>Keywords:</span> ";
              foreach($post_tags as $tag) {
                $tags[] = "<a href=\"/tag/$tag->slug/\">" . ucwords($tag->name) . "</a>";
              }
              echo implode($tags, ', ');
            }
			    ?>
			  </div>
			  
			  <div class="single-post-social">
          <div id="shareTw"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="heritage_action" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
          <div id="shareFb"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" layout="button_count" width="300"></fb:like></div>
          <div id="shareGp">
          <!-- Place this tag where you want the +1 button to render -->
          <g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone>

          <!-- Place this render call where appropriate -->
          <script type="text/javascript">
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/plusone.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
          </script>
          </div>
			  </div>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php // heritageaction_content_nav( 'nav-below' ); ?>
				
				<?php if(!in_array(get_the_author_meta('user_nicename'), array('admin'))): ?>
				<div class="single-post-author">
				  <?php if(file_exists(get_stylesheet_directory().'/img/about-'.strtolower(str_replace(' ','-',get_the_author_meta('display_name'))).'.jpg')) : ?>
				  <div class="author-image">
            <a href="/author/<?php echo the_author_meta('user_nicename'); ?>">
				      <img src="<?php echo get_bloginfo('template_url'); ?>/img/about-<?php echo strtolower(str_replace(' ','-',get_the_author_meta('display_name'))); ?>.jpg" alt="<?php the_author_meta('display_name'); ?> Photo" height="100">
            </a>
				  </div>
				  <?php endif; ?>
				  
				  <div class="author-name">
				    <a href="/author/<?php the_author_meta('user_nicename'); ?>">
				      <?php the_author_meta('display_name'); ?>
				    </a>
				  </div>
				  <div class="author-meta">
				    <h3 class="title"><?php echo the_author_meta('title'); ?></h3>
				    <?php if(get_the_author_meta('twitter')): ?>
				    <a href="https://twitter.com/<?php the_author_meta('twitter'); ?>" target="_blank">
				      <img src="<?php echo get_bloginfo('template_url'); ?>/img/tiny-twitter-logo.png" valign="middle" width="25">
				      @<?php the_author_meta('twitter'); ?>
				    </a>
				    <?php endif; ?>
				  </div>
				  
				  <div style="clear:both;"></div>
				</div>
				<?php endif; ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ){
					  ?>
					  <div class="single-post-comment-title">Please Share Your Thoughts</div>
					  <?php
					  comments_template( '', true );
					}
						
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->      
		</div><!-- #primary .content-area -->

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>