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
  #content .entry-content a{text-decoration:underline;}
  #content .entry-content .post-meta a{text-decoration:none;}

  .post-suggested-tweet p{
    margin:5px 0 0 0;
  }
  .single-post-author{
    padding-bottom:25px;
    border-bottom: 5px solid #ddd;
  }
  .post-suggested-tweets-wrapper{
    margin:0px 0 20px 0;
    border-bottom: 5px solid #ddd;
    padding:0px 0 25px 0px;
  }  
  .post-suggested-tweet{
    background-color:#eee;
  }
  a.click-to-tweet{
    font-size:12px; 
  }
  
  
  .paramount_signup_form input[type=text]{
    width:100%;
  }
  .paramount_signup_title{
    font-size:1.2em;
    font-weight:bold;
    padding-bottom:5px;
  }
  .paramount_align_left{
    float:left;
    margin-right:20px;
    margin-bottom:20px;
  }
  .paramount_align_right{
    float:right;
    margin-left:20px;
    margin-bottom:20px;
  }
  .paramount_align_center{
    margin:0 auto 20px auto;
    text-align:center;
  }
  .paramount_align_full{
    clear:both;
    margin-bottom:20px;
  }
  .paramount_signup_form_result, .paramount_signup_thankyou{
    display:none;
  }
  
  .single-post-featured-image, .featured-image {
    width: 100%;
    height: auto;
    max-height:none;
  }
  
  #keyVoteSwitchWrap{
    margin-bottom:5px;
  }
  #keyVoteSwitchWrap.switch legend::after{
    width:98%;
  }
  .houseChamberLabel{
    margin-left:-10px;
  }
  .senateChamberLabel{
    margin-left:10px;
  }
  .keyVoteLabel.activeChamber{
    font-weight:bold;
  }
  #keyVoteTouchSlider{
    z-index:5000;
  }
  .keyvoteLabelWrap{
    height:30px;
    margin-bottom:35px;
  }
  .ie-keyvote-switch{
    display:none;
  }
  html.ie .nonie-keyvote-switch{
    display:none;
  }
  html.ie .ie-keyvote-switch{
    display:block;
  }
  
  .no-touch nav[role="navigation"] li.the-forge-blog:hover, .no-touch nav[role="navigation"] li.the-forge-blog:hover a{
    height: auto;
    padding-bottom:3px;
  }
  .signup-form-submit-button{
	text-decoration:none !important;
  }
  .welcomeWrapper{
    min-height:465px;
  }
  
  .author-name-link{
    color:#000!important;
  }
  .author-name-link:hover{
 
  }
</style>

<?php 
if(is_page_template('page-donatestandard.php') || is_tree('150')){
  require(get_stylesheet_directory() . '/kimbia-donate-header.php');
}
?>

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
									 <li class="gradient red-gradient dashboard">
											 <a href="<?php echo home_url( '/congress/', 'http'); ?>">
													 <span class="nav-title">Dashboard</span>
											 </a>
											 <span class="nav-desc nav-search">
											    <span style="font-size:13px;">The dashboard is temporarily down as we update it for the 113th Congress.</span>
											    <? /*?>
											    <input id="headerNavDashboardSearch" type="search" name="search zip" value="" placeholder="Enter your zip" class="dashboardZipSearch"><div class="go gradient red-gradient dashboardZipGo"><div class="arrow-right"></div></div>
											    */?>
											 </span>
									 </li>
									 <li class="gradient orange-gradient the-forge-blog">
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
									 <li id="donate" class="gradient light-red-gradient donate">
											 <a href="<?php echo home_url( '/donate/', 'http'); ?>">
													 <span class="nav-title">Donate</span>
											 </a>
											 <span class="nav-desc">&ldquo;I give money to Heritage Action, you should too.&rdquo;<br/><span class="author">– Erick Erickson</span></span>
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