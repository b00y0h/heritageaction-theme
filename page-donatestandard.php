<?php
/**
 * Template Name: Donate Standard
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>



		    <div id="hero">
          <div class="inner clearfix">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <p class='page-excerpt'><?php echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
          </div>
        </div>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
        <div style="clear:both;"></div>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>