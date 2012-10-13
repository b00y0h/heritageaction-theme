<?php
/*
Template Name: Congress Pages
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>

<div class="col1">
  <div id="hero">
    <div class="inner">
	  <h1 id="action_dashboard">Action Dashboard</h1>
	  </div>
	</div>
  <div id="congresspages-wrapper">
    <?php the_content(); ?>
  </div>
</div>
 
<?php get_footer(); ?>