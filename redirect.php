<?php

/*
Template Name: Page Redirect

 * @author		Dave Stewart
 * @email		dave@davestewart.co.uk
 * @web			www.davestewart.co.uk
 
 * @name		Page Redirect
 * @type		PHP page
 * @desc		Wordpress template that redirects the current page based on the content of the database entry it loads

 * @requires	Wordpress
 * @install		Copy this file to the directory of the theme you wish to use
 * usage		
			   1. Create a new Page in your Wordpress control panel
			   2. Enter the URL (or local path, relative to your Wordpress directory) you want to redirect to as the only page content
			   3. Set the Page Template to "Page Redirect"
			   4. Publish
 */

if(have_posts()) {
  while(have_posts()) {
    the_post(); 
    $contents = get_the_content();
    
    // correctly build the link
    
			// grab the 'naked' link
				$link	= strip_tags($contents);
				$link	= preg_replace('/\s/', '', $link);
				
			// work out
				if(!preg_match('%^http://%', $link) && !preg_match('%^https://%', $link)){
					$host	= $_SERVER['HTTP_HOST'];
					$dir	= dirname($_SERVER['PHP_SELF']);
					$link	= "http://$host$dir$link";
				}
				
			// do the link
				header("Location: $link");
				die('');
				
  } 
}
?>
