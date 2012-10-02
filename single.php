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
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p class='page-excerpt'><?php // echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
  </div>
</div>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php // heritageaction_content_nav( 'nav-above' ); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php // heritageaction_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>