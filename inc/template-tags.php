<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

if ( ! function_exists( 'heritageaction_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Heritage Action 1.0
 */
function heritageaction_content_nav( $nav_id ) {
  global $wp_query;

  $nav_class = 'site-navigation paging-navigation';
  if ( is_single() )
    $nav_class = 'site-navigation post-navigation';

  ?>
  <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
    <h1 class="assistive-text"><?php _e( 'Post navigation', 'heritageaction' ); ?></h1>

  <?php if ( is_single() ) : // navigation links for single posts ?>

    <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'heritageaction' ) . '</span> %title' ); ?>
    <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'heritageaction' ) . '</span>' ); ?>

  <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

    <?php if ( get_next_posts_link() ) : ?>
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'heritageaction' ) ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'heritageaction' ) ); ?></div>
    <?php endif; ?>

  <?php endif; ?>

  </nav><!-- #<?php echo $nav_id; ?> -->
  <?php
}
endif; // heritageaction_content_nav



if ( ! function_exists( 'heritageaction_content_navlist' ) ):

function heritageaction_content_navlist( $id, $scope = 2 ) {
  // custom pagination
     	global $wp, $posts_per_page, $page;
     	$mypage = $page;

  	$numPages = (int) ( wp_count_posts()->publish / $posts_per_page );
  	if( $numPages <= 1 )
  		return; // no need for pagination

  	$queryVars = $wp->query_vars;
  	$curPage = isset( $queryVars[ 'paged' ] ) ? (int) $queryVars[ 'paged' ] : 1;

  	// page bounds
  	$start = $curPage - $scope;
  	$end = $curPage + $scope;

  	// if we can't satisfy the scope (add enough pages) on one side,
  	// add pages to the other side
  	if( $start <= 1 ) {
  		$end += ( 1 - $start );
  		$start = 2;
  	}
  	else if( $end >= $numPages ) {
  		$start -= ( $end - $numPages );
  		$end = $numPages - 1;
  	}

  	// limit the start and end to their extreme values
  	$start = max( $start, 2 );
  	$end = min( $end, $numPages - 1 );

  	$pagesToLinkTo = array( 1 );
  	for( $page = $start; $page <= $end; $page++ )
  		$pagesToLinkTo[] = $page;
  	$pagesToLinkTo[] = $numPages;

  	$prevPage = $pagesToLinkTo[0];


    echo '<div id="' . $id . '" class="pagination pagination-centered blue">';
    echo '<ul>';


    // ANDRE: can you make this find the first page and the last <li> find the last page?
  	echo '<li><a href="' . get_bloginfo( 'home' ) . '/blog/page/' . $start . '">&lt;</a></li>';

  	foreach( $pagesToLinkTo as $page ) {
  		if( $page - $prevPage > 1 ) // skipped a few pages
  		echo '<li><span class="page-numbers dots">&hellip;</span></li>'; // add a spacer
      if ($curPage == $page) {
    		echo '<li class="active"><a href="' . get_bloginfo( 'home' ) . '/blog/page/' . $page . '">' . $page . '</a></li>';      
      } else {
    		echo '<li><a href="' . get_bloginfo( 'home' ) . '/blog/page/' . $page . '">' . $page . '</a></li>';
    }
  		$prevPage = $page;

  	}


  	echo '<li><a href="' . get_bloginfo( 'home' ) . '/blog/page/' . $end . '">&gt;</a></li>';

  	echo '</ul>';
    echo '</div>';
    
}
endif; // heritageaction_content_navlist








if ( ! function_exists( 'heritageaction_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'heritageaction' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'heritageaction' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'heritageaction' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'heritageaction' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'heritageaction' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'heritageaction' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for heritageaction_comment()

if ( ! function_exists( 'heritageaction_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_posted_on() {
	printf( __( '<span class="byline post-meta"><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span> | <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a></span>', 'heritageaction' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'heritageaction' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 * @since Heritage Action 1.0
 */
function heritageaction_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so heritageaction_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so heritageaction_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in heritageaction_categorized_blog
 *
 * @since Heritage Action 1.0
 */
function heritageaction_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'heritageaction_category_transient_flusher' );
add_action( 'save_post', 'heritageaction_category_transient_flusher' );