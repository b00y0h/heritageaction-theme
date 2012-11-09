<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>

<div id="hero">
  <div class="inner clearfix">
    <header class="page-header">
			<h1 class="page-title">
			  <?php if ( have_posts() ) : ?>
				<?php
				  global $post;					
						the_post();
						printf( __( 'Author: %s', 'heritageaction' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
				?>
			</h1>
			<div class="authorMeta">
         <div class="authorImageWrapper">
            <?php 
            $bio_image_url = get_the_author_meta('biophoto'); 
            if(!empty($bio_image_url)) : ?>

              <img src="<?php echo $bio_image_url; ?>">

            <?php else : ?>


            <?php endif; ?>
         </div>
         <div class="authorBio">
            <?php echo nl2br(get_the_author_meta('description')); ?>
         </div>
         <div style="clear:both;"></div>
      </div>
		</header><!-- .page-header -->
		<?php endif; ?>

  </div>
</div>
<div id="main-wrapper">
<div class="row">
		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>


				<?php // heritageaction_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php heritageaction_content_navlist( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->
<?php if(is_tax('chamber')): ?>
  <?php get_sidebar('keyvote'); ?>
<?php else: ?>
  <?php get_sidebar(); ?>
<?php endif; ?>
</div>
</div> <!-- #main-wrapper -->
<?php get_footer(); ?>