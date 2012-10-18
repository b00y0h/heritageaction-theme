<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php global $page, $paged;
 wp_title( '|', true, 'right' );
 bloginfo( 'name' );
 $site_description = get_bloginfo( 'description', 'display' );
 if ( $site_description && ( is_home() || is_front_page() ) )
	 echo " | $site_description";
 if ( $paged >= 2 || $page >= 2 )
	 echo ' | ' . sprintf( __( 'Page %s', 'heritageaction' ), max( $paged, $page ) );
 ?></title>
<link href='http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC|Open+Sans+Condensed:700|Bree+Serif' rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.29806.js"></script>
<?php wp_head(); ?>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrap">
 <?php do_action( 'before' ); ?>
 <header id="masthead" class="site-header" role="banner">
	 <nav role="navigation" class="site-navigation main-navigation">
		 <div class="menu-main-nav-container">
				 <ul id="menu-main-nav" class="menu">
						 <li id="score-card" class="gradient light-blue-gradient score-card">
								 <a href="http://heritageactionscorecard.com" target="_blank">
										 <span class="nav-title">Score Card</span>
								 </a>
						 </li>
									 <li class="gradient red-gradient dashboard">
											 <a href="/congress/">
													 <span class="nav-title">Dashboard</span>
											 </a>
									 </li>
									 <li class="gradient orange-gradient the-forge-blog">
											 <a href="/blog/">
													 <span class="nav-title">The Forge Blog</span>
											 </a>
									 </li>
									 <li id="donate" class="gradient light-red-gradient donate">
											 <a href="/donate/">
													 <span class="nav-title">Donate</span>
											 </a>
									 </li>
									 <li id="search" class="gradient blue-gradient search">
											 <a href="#" id="search-trigger"></a>
										   <span id="search-form" class="nav-desc">
                         <?php get_search_form(); ?>
											 </span>
									 </li>
							 </ul>
					 </div>
	 </nav><!-- .site-navigation .main-navigation -->
 </header><!-- #masthead .site-header -->
 <div id="main" class="site-main">