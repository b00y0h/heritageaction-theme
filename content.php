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
            the_post_thumbnail('full', array('class' => 'featured-image'));
      } 
    ?>
    
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'heritageaction' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

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
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'heritageaction' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
