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
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html <?php language_attributes(); ?> class="no-js ie gt-ie8"> <![endif]-->
<!--[if !IE ]><!--> <html <?php language_attributes(); ?> class="no-js not-ie"> <!--<![endif]-->
<head>
  <script src="//cdn.optimizely.com/js/79804044.js"></script>
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
 global $page, $paged, $post;

 wp_title( '|', true, 'right' );

 // Add the blog name.
 //bloginfo( 'name' );

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
<link href='//fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC|Open+Sans+Condensed:700|Bree+Serif' rel='stylesheet' type='text/css'>
<meta property="twitter:account_id" content="130600206" />
<?php if(is_single() && in_array(get_post_type(), array('post','key-votes'))): ?>
	<!-- start twitter-card info -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@Heritage_Action">
	<meta name="twitter:url" content="<?php the_permalink(); ?>">
	<meta name="twitter:title" content="<?php the_title(); ?>">
	<meta name="twitter:description" content="<?php echo truncateWords( strip_tags($post->post_content), 250 ); ?>">  
<?php 
  if (is_singular('post') && get_the_post_thumbnail() !="" ) : ?>
    <meta name="twitter:image" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>"><?php 
  endif; ?>
  
<?php	if( get_the_author_meta('twitter', $post->post_author) ): ?>
	<meta name="twitter:creator" content="@<?php echo get_the_author_meta('twitter', $post->post_author); ?>"><?php 
	endif; ?>
	
	<!-- end twitter-card info -->
<?php endif; ?>

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


<?php 
if(is_page_template('page-donatestandard.php') || is_tree('150')){
  require(get_stylesheet_directory() . '/kimbia-donate-header.php');
  echo "\n";
  require(get_stylesheet_directory() . '/standard-donate-script-header.php');
}
?>



<style type="text/css" media="screen">
  /* keyvote autoselection css */
  .items{ display:none; }
  .items_<?php echo latest_keyvote_chamber(); ?>{display:block;}
  <?php if(latest_keyvote_chamber() == 'senate'): ?>
    #keyVoteTouchSlider{left:45px;}
  <?php endif; ?>
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
         		   <a href="<?php echo home_url( '/', 'http'); ?>" rel="home">
         		     <?php bloginfo( 'name' ); ?>
         		  </a>
         		 </h1>
				    </li>
						 <li id="score-card" class="gradient light-blue-gradient score-card">
								 <a href="http://heritageactionscorecard.com" target="_blank">
										 <span class="nav-title">Score Card</span>
								 </a>
								  <span class="nav-desc">&ldquo;Heritage Action is the scorecard for conservatives&rdquo;<br/><span class="author">– Washington Examiner</span></span>
						 </li>
						 <li class="gradient red-gradient dashboard <?php if(is_page_template('page-congresspages.php')){echo 'current-nav';} ?>">
  							 <a href="<?php echo home_url( '/congress/', 'http'); ?>">
  									 <span class="nav-title">Dashboard</span>
  							 </a>
  							 <span class="nav-desc nav-search">											    
  							    <?php if(CPSetting::getValue('enable_action_dashboard')): ?>
  							      <input id="headerNavDashboardSearch" type="search" name="search zip" value="" placeholder="Enter your zip" class="dashboardZipSearch"><div class="go gradient red-gradient dashboardZipGo"><div class="arrow-right"></div></div>											    
  							    <?php else: ?>  
  							      <span style="font-size:13px;"><?php echo CPSetting::getValue('dashboard_down_message'); ?></span>
  							    <?php endif; ?>
  							 </span>
  					 </li>
  					 <li class="gradient orange-gradient the-forge-blog <?php 
  					                                                        if(
  					                                                            is_home() ||
  					                                                            is_page('blog') || 
  					                                                            is_singular('post') ||
  					                                                            is_category() ||
  					                                                            is_tag() ||
  					                                                            is_author() ||
  					                                                            is_archive()
  					                                                        ){echo 'current-nav';} ?>">
  							 <a href="<?php echo home_url( '/blog/', 'http'); ?>">
  									 <span class="nav-title">The Forge Blog</span>
  							 </a>
  							 <span class="nav-desc">
  							   <?php
  							    $featured_category = get_term_by('name', 'Featured', 'category');
  							    $latest_post = new WP_Query(array('posts_per_page'=>'1', 'post_type'=>'post','orderby' => 'post_date',
                    'order' => 'DESC', 'ignore_sticky_posts' => 1, 'cat'=>$featured_category->term_id));
  							    while($latest_post->have_posts()): $latest_post->the_post();?>
  							   <a class="blog-link" href="<?php the_permalink(); ?>">
  							     <h6 class="blog-title"><?php echo the_title(); ?></h6>
  							     <span class="blog-date"><?php the_date(); ?></span>
  							   </a>
  							   <p class="blog-excerpt"><?php echo truncateWords(get_the_excerpt(),90); ?>...</p>

  							   <?php endwhile; wp_reset_postdata(); ?>
  							 </span>
  					 </li>
  					 <li id="donate" class="gradient light-red-gradient donate <?php if(is_page_template('page-donatestandard.php') || is_tree('150')){echo 'current-nav';} ?>">
  							 <a href="<?php echo home_url( '/donate/', 'http'); ?>">
  									 <span class="nav-title">Donate</span>
  							 </a>
  							 <span class="nav-desc">&ldquo;I give money to Heritage Action, you should too.&rdquo;<br/><span>– Erick Erickson</span></span>
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

 <?php
 if ( is_home() || is_category() || is_tag() || (is_singular('post')) ) :
 // keyword header stripe
 get_sidebar('blog');

 endif; ?>



 <div id="main" class="site-main">