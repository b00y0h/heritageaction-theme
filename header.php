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


<style type="text/css" media="screen">
  .switch input:last-of-type:checked ~ .switch-button {
        left: 55%; } /* fix for the switcher button not quite going all the way to the right, from line 2082 of style.css, line 922 of sass */
  #facebook-page-wall{
    background:#fff;
  }
  #under-cover h4 {
    line-height:24px;
  }
  
  #press-release-slider { height: 240px; overflow:hidden;  width:600px}
  #press-release-slider .viewport { float: left; width:600px; height: 200px; overflow: hidden; position: relative; }
  #press-release-slider .buttons { display: block; margin: 30px 10px 0 0; float: left; }
  #press-release-slider .next { }
  #press-release-slider .disable { }
  #press-release-slider .overview { list-style: none; padding: 0; margin: 0;  position: absolute; left: 0; top: 0; }
  #press-release-slider .overview li{ float: left; margin: 0 20px 0 0; padding: 1px; height: 121px; border: 1px solid #dcdcdc; width: 236px;}

  #press-release-slider .pager { overflow:hidden; list-style: none; clear: both; margin: 0 0 0 45px; }
  #press-release-slider .pager li { float: left; }
  #press-release-slider .pagenum {  }
  #press-release-slider .active { 
    background-color: #fa8f4c;    
    color: white;
    background-image: -ms-linear-gradient(top, #fa8f4c, #f54a18);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fa8f4c), to(#f54a18));
    background-image: -webkit-linear-gradient(top, #fa8f4c, #f54a18);
    background-image: -o-linear-gradient(top, #fa8f4c,#f54a18);
    background-image: -moz-linear-gradient(top, #fa8f4c, #f54a18);
    background-image: linear-gradient(top, #fa8f4c,#f54a18);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fa8f4c', endColorstr='#f54a18', GradientType=0);
  }
  .press-release-slide{
    float:left;
    width:600px;
    height:200px;
  }
</style>

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
											    <input id="headerNavDashboardSearch" type="search" name="search zip" value="" placeholder="Enter your zip" class="dashboardZipSearch"><div class="go gradient red-gradient dashboardZipGo"><div class="arrow-right"></div></div>
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
                         <?php get_search_form(); ?>
											 </span>
									 </li>
							 </ul>
					 </div>
	 </nav><!-- .site-navigation .main-navigation -->
 </header><!-- #masthead .site-header -->

 <?php if ( is_home() || is_category() || is_tag() ) :
 
 get_sidebar('blog');
  
 endif; ?>



 <div id="main" class="site-main">