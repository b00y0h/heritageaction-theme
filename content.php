<?php
/**
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	  <?php
      if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. 
        ?><a href="<?php the_permalink(); ?>"><?php
            the_post_thumbnail('full', array('class' => 'featured-image'));
        ?></a><?php
      } 
    ?>
    
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'heritageaction' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

    
	    
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
		  
	  <?php if ( 'post' == get_post_type()) : ?>
		<div class="entry-meta">
			<?php heritageaction_posted_on($no_author=true); ?>
		</div><!-- .entry-meta -->
		<?php elseif('key-votes' == get_post_type()): ?>		  
	    <div class="keyvote-entry-date"><?php echo get_the_date('F d, Y'); ?></div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( '', 'heritageaction' ) ); ?>
		
		<?php if ( 'post' == get_post_type()) : ?>
		  <div class="readmore-disqus-count">
		    <a href="<?php the_permalink(); ?>#disqus_thread"></a>
		  </div>
		  <div class="read-more-post">
    		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'heritageaction' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="btn rounded gradient medium-blue-gradient">
    		  Read More
    		</a>    		
  		</div>
  	<?php endif; ?>	
  	
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'heritageaction' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
