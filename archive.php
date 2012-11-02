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
					if ( is_category() ) {
						printf( __( 'Category: %s', 'heritageaction' ), '<span>' . single_cat_title( '', false ) . '</span>' );

					} elseif ( is_tag() ) {
						printf( __( 'Keyword: %s', 'heritageaction' ), '<span>' . single_tag_title( '', false ) . '</span>' );

					} elseif ( is_author() ) {
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						printf( __( 'Author: %s', 'heritageaction' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					} elseif ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'heritageaction' ), '<span>' . get_the_date() . '</span>' );

					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'heritageaction' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'heritageaction' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
          } elseif ( is_post_type_archive('press-releases') ){            
            _e( 'Press Releases', 'heritageaction' );  
          } elseif ( is_post_type_archive('key-votes') ){            
            _e( 'Key Votes', 'heritageaction' );   
          } elseif ( is_tax('chamber') ){ 
            _e( single_tag_title( '', false ) . ' Key Votes' , 'heritageaction' );                     
					} else {
						_e( 'Archives', 'heritageaction' );

					}
				?>
			</h1>
			<?php
				if ( is_category() ) {
					// show an optional category description
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

				} elseif ( is_tag() ) {
					// show an optional tag description
					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}
			?>
		</header><!-- .page-header -->
		<?php endif; ?>
		
  </div>
</div>
<div id="main-inner">

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
</div> <!-- #main-inner -->
<?php get_footer(); ?>