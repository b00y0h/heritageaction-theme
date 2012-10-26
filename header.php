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
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
<title>Heritage Action</title>
<link href='http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC|Open+Sans+Condensed:700|Bree+Serif' rel='stylesheet' type='text/css'>

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
  <div id="hs-container" class="hs-container">
    <header id="masthead" class="site-header" role="banner">
   <a href="#more-nav" id="more-nav">More</a>
   <a href="#less-nav" id="less-nav">Less</a>
	 <nav role="navigation" class="site-navigation main-navigation">
		 <div class="menu-main-nav-container">
				 <ul id="menu-main-nav" class="menu">
						 <li id="score-card" class="gradient light-blue-gradient score-card">
								 <a href="#score-card">
										 <span class="nav-title">Score Card</span>
								 </a>
						 </li>
									 <li class="gradient red-gradient dashboard">
											 <a href="#action-dashboard">
													 <span class="nav-title">Dashboard</span>
											 </a>
									 </li>
									 <li class="gradient orange-gradient the-forge-blog">
											 <a href="#secondary">
													 <span class="nav-title">The Forge Blog</span>
											 </a>
									 </li>
									 <li id="donate" class="gradient light-red-gradient donate">
											 <a href="#">
													 <span class="nav-title">Donate</span>
											 </a>
									 </li>
                   <li id="key-votes-nav" class="gradient">
                       <a href="#key-votes">
                           <span class="nav-title">Key Votes</span>
                       </a>
                   </li>
                   <li id="press-releases-nav" class="gradient">
                       <a href="#recent-press-releases">
                           <span class="nav-title">Press Releases</span>
                       </a>
                   </li>
                   <li id="about-us-nav" class="gradient">
                       <a href="#about-us">
                           <span class="nav-title">About Us</span>
                       </a>
                   </li>
									 <li id="search" class="gradient blue-gradient search">
											 <a href="#search-widget" id="search-trigger">Search</a>
									 </li>
									 
							 </ul>
					 </div>
	 </nav><!-- .site-navigation .main-navigation -->
 </header><!-- #masthead .site-header -->
    <div id="main" class="site-main hs-content-scroller">