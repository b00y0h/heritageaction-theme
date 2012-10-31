<?php
/**
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>
<div id="" class="content-area">


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	  <?php heritageaction_posted_on(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'heritageaction' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

</div>