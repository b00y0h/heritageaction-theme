<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<div class="entry-content">
  		<?php the_content(); ?>
  		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'heritageaction' ), 'after' => '</div>' ) ); ?>
  		<?php edit_post_link( __( 'Edit', 'heritageaction' ), '<span class="edit-link">', '</span>' ); ?>
  	</div><!-- .entry-content -->
  </article><!-- #post-<?php the_ID(); ?> -->
