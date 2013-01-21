<?php
/*
Template Name: Congress Pages
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>
<style type="text/css" media="screen">
  p#top{display:none;}
  #congresspages-wrapper{
    min-height:500px;
  }
  .CPMaintenance .cpIntroTitle{
    padding:20px;
    width:800px;
    margin:0 auto;
    line-height:28px;
  }
</style>
<div class="col1">
  <div id="hero">
    <div class="inner">
	  <h1 id="action_dashboard">Action Dashboard</h1>
	  </div>
	</div>
  <div id="congresspages-wrapper">
    <?php //the_content(); ?>
    
    <div class="CPWelcome CPMaintenance">
      <div class="cpIntroTitle">The dashboard is temporarily down as we update it for the 113th Congress.</div>      
    </div>
  </div>
</div>
 
<?php get_footer(); ?>