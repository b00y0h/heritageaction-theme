<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post();  global $post; ?>
  
  <?php
    $chamber = get_the_terms($post->ID, 'chamber');
    sort($chamber);
  ?>
<div id="hero">
  <div class="inner clearfix">
    <h1 class="entry-title chamber-title"><a href="/chamber/<?php echo $chamber[0]->slug; ?>/"><?php echo $chamber[0]->name; ?> Key Votes</a></h1>
    <p class='page-excerpt'><?php // echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
  </div>
</div>



		<div id="primary" class="content-area">
			<div id="content" class="site-content key-vote-content" role="main">

			

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        	<div class="entry-content">
        	  <h1 class="entry-title key-vote-title">
        	    <div class="key-vote-type-icon"><?php echo get_post_meta($post->ID,"key_vote_type",true); ?></div>        	    
        	    <?php the_title(); ?>
        	  </h1>
        	  <div class="keyvote-entry-date"><?php echo get_the_date('F d, Y'); ?></div>
        		<?php the_content(); ?>
        		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'heritageaction' ), 'after' => '</div>' ) ); ?>
        	</div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			        
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
<?php endwhile; // end of the loop. ?>

<?php get_sidebar('keyvote'); ?>
<?php get_footer(); ?>