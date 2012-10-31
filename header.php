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
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>


<?php wp_head(); ?>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style type="text/css" media="screen">
  .footer-inner-wrap{
    width:960px;
    margin:0 auto;
  }
  .site-info{
    width:560px;
  }
  .heritage-sister-site{
    float:right;
    margin-right:30px;
    padding-bottom:10px;
  }
  .heritage-sister-site a:hover{
    text-decoration:none;
    
  }
</style>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrap">
 <?php do_action( 'before' ); ?>
 <header id="masthead" class="site-header" role="banner">
   <div class="inner">
	 <nav role="navigation" class="site-navigation main-navigation">
		 <h2 class="assistive-text"><?php _e( 'Menu', 'heritageaction' ); ?></h2>
		 <div class="assistive-text skip-link">		   
		   <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'heritageaction' ); ?>"><?php _e( 'Skip to content', 'heritageaction' ); ?></a>
		 </div>
		 <div class="menu-main-nav-container">
				 <ul id="menu-main-nav" class="menu">
				    <li id="home-link">
				      <h1 class="site-title">		   
         		   <a href="<?php echo home_url( '/' ); ?>" rel="home">
         		     <?php bloginfo( 'name' ); ?>
         		  </a>
         		 </h1>
				    </li>
						 <li id="score-card" class="gradient light-blue-gradient score-card">
								 <a href="http://heritageactionscorecard.com" target="_blank">
										 <span class="nav-title">Score Card</span>
								 </a>
								 <span class="nav-desc">&ldquo;The final source for congressional accountability.&rdquo;<span class="author">– Jeffy Smithbo</span></span>
						 </li>
									 <li class="gradient red-gradient dashboard">
											 <a href="/congress/">
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
											   <?php
											    $latest_post = new WP_Query(array('posts_per_page'=>'1', 'post_type'=>'post','orderby' => 'post_date',
                          'order' => 'DESC', 'ignore_sticky_posts' => 1));
											    while($latest_post->have_posts()): $latest_post->the_post();?>
											   <h6 class="blog-title"><?php echo the_title(); ?></h6>
											   <p class="blog-excerpt"><?php echo truncateWords(get_the_excerpt(),50); ?>[...]</p>
											   <?php endwhile; wp_reset_postdata(); ?>
											 </span>
									 </li>
									 <li id="donate" class="gradient light-red-gradient donate">
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
    </div> <!-- .inner -->
 </header><!-- #masthead .site-header -->

 <?php if ( is_home() || is_category() || is_tag() ) :
 
 get_sidebar('blog');
  
 endif; ?>



 <div id="main" class="site-main">