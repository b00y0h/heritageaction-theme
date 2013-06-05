<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>

<div id="hero">
  <div class="inner clearfix">
    <h1 class="entry-title">Press Release</h1>
    <p class='page-excerpt'><?php // echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
  </div>
</div>
<div id="main-wrapper">
    <div class="row">
		<div id="primary" class="content-area">
			<div id="content" class="site-content single-post-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php // heritageaction_content_nav( 'nav-above' ); ?>

				<div id="" class="content-area">


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          
          <h1 class="entry-title single-post-title"><?php the_title(); ?></h1>

        	<div class="entry-content">
        	  <?php printf( __( '<span class="byline post-meta"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a></span>', 'heritageaction' ),
          		esc_url( get_permalink() ),
          		esc_attr( get_the_time() ),
          		esc_attr( get_the_date( 'c' ) ),
          		esc_html( get_the_date() ),
          		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
          		esc_attr( sprintf( __( 'View all posts by %s', 'heritageaction' ), get_the_author() ) ),
          		esc_html( get_the_author() )
          	);
          	?>
        		<?php the_content(); ?>
        		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'heritageaction' ), 'after' => '</div>' ) ); ?>
        		
        		
        		<br><br>
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
      			 <div style="clear:both;"><br></div>
        	</div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

        </div>

				<?php // heritageaction_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

    <?php
      get_sidebar();      
    ?>
</div>
</div>

<?php get_footer(); ?>