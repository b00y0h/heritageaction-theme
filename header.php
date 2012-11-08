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
<meta name="apple-mobile-web-app-capable" content="yes" />
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
  <aside id="masthead" class="site-header" role="banner">
   <a id="more-nav">More <i class='lsf symbol'>&#xe00d;</i></a>
   <a id="less-nav"><i class='lsf symbol'>&#xe00c;</i> Less</a>
	 <nav role="navigation" class="site-navigation main-navigation">
      <a href="#panel1"><span class="nav-title">Score Card</span></a>
      <!-- <a href="#panel2"><span class="nav-title">Dashboard</span></a> -->
      <a href="#panel3"><span<span class="nav-title">The Forge Blog</span></a>
      <!-- <a href="#panel4"><span<span class="nav-title">Donate</span></a> -->
      <a href="#panel5"><span<span class="nav-title">Key Votes</span></a>
      <a href="#panel6"><span<span class="nav-title">Releases</span></a>
      <a href="#panel7"><span<span class="nav-title">About Us</span></a>
      <a href="#panel8" id="search-trigger">Search</a>
	 </nav><!-- .site-navigation .main-navigation -->
 </aside><!-- #masthead .site-header -->
 <div id="main" class="site-main hs-content-scroller">