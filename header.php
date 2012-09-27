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
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <!--[if gte IE 9]>
    <style type="text/css">
      .gradient {
         filter: none!important;
      }
    </style>
  <![endif]-->
  
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
 /*
	 * Print the <title> tag based on what is being viewed.
	 */
 global $page, $paged;

 wp_title( '|', true, 'right' );

 // Add the blog name.
 bloginfo( 'name' );

 // Add the blog description for the home/front page.
 $site_description = get_bloginfo( 'description', 'display' );
 if ( $site_description && ( is_home() || is_front_page() ) )
	 echo " | $site_description";

 // Add a page number if necessary:
 if ( $paged >= 2 || $page >= 2 )
	 echo ' | ' . sprintf( __( 'Page %s', 'heritageaction' ), max( $paged, $page ) );

 ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<link href='http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC|Open+Sans+Condensed:700|Bree+Serif' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.29806.js"></script>


<?php wp_head(); ?>

<!-- BOBBY add this to functions -->
<script src="<?php echo get_template_directory_uri(); ?>/js/application.js"></script>


</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrap">
 <?php do_action( 'before' ); ?>
 <header id="masthead" class="site-header" role="banner">
	 <hgroup>
		 <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	 </hgroup>

	 <nav role="navigation" class="site-navigation main-navigation">
		 <h1 class="assistive-text"><?php _e( 'Menu', 'heritageaction' ); ?></h1>
		 <div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'heritageaction' ); ?>"><?php _e( 'Skip to content', 'heritageaction' ); ?></a></div>


		 <div class="menu-main-nav-container">
				 <ul id="menu-main-nav" class="menu">
						 <li class="gradient light-blue-gradient score-card">
								 <a href="/score-card/">
										 <span class="nav-title">Score Card</span>
								 </a>
								 <span class="nav-desc">&ldquo;The final source for congressional accountability.&rdquo;<span class="author">– Jeffy Smithbo</span></span>
						 </li>
									 <li class="gradient red-gradient dashboard">
											 <a href="/dashboard/">
													 <span class="nav-title">Dashboard</span>
											 </a>
											 <span class="nav-desc nav-search">
											    <input type="search" name="search zip" value="" placeholder="Enter your zip"><div class="go gradient red-gradient"><div class="arrow-right"></div></div>
											 </span>
									 </li>
									 <li class="gradient orange-gradient the-forge-blog">
											 <a href="/blog/">
													 <span class="nav-title">The Forge Blog</span>
											 </a>
											 <span class="nav-desc">
											   <h6 class="blog-title">This is a blog post title</h6>
											   <p class="blog-excerpt">This is a post excerpt. Lorem ipsum dolor sit amet...</p>
											 </span>
									 </li>
									 <li class="gradient light-red-gradient donate">
											 <a href="/donate/">
													 <span class="nav-title">Donate</span>
											 </a>
											 <span class="nav-desc">&ldquo;I give money to Heritage Action, you should too.&rdquo;<span class="author">– Erick Erickson</span></span>
									 </li>
									 <li id="search" class="gradient blue-gradient search">
											 <a href="#" id="search-trigger"></a>
										   <span id="search-form" class="nav-desc">
											    <input type="search" name="search site" value="" placeholder="Search..."><div id="seach-btn" class="go gradient blue-gradient"><div class="arrow-right"></div></div>
											 </span>
									 </li>
							 </ul>
					 </div>
	 </nav><!-- .site-navigation .main-navigation -->
 </header><!-- #masthead .site-header -->

 <div id="main" class="site-main">
