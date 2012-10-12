<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<div id="hero">
  <div class="inner clearfix">
		<header class="page-header">
			<h1 class="page-title"><?php 
			$title_pre = (get_query_var('post_type') == 'post') ? "Forge " : '';
			printf( __( $title_pre . 'Search Results for: %s', 'heritageaction' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->
  </div>
</div>
<?php endif; ?>

<div id="main-inner">

		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php heritageaction_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php heritageaction_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->
  <?php get_sidebar(); ?>
</div> <!-- #main-inner -->
<?php get_footer(); ?>