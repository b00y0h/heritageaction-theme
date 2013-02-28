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
    <?php if(CPSetting::getValue('enable_action_dashboard')) : ?>
      
      <?php the_content(); ?>
    
    <?php else: ?>
      
      <div class="CPWelcome CPMaintenance">
        <div class="cpIntroTitle"><?php echo CPSetting::getValue('dashboard_down_message'); ?></div>      
      </div>
      
    <?php endif; ?>
    
    
    
  </div>
</div>
 
<?php get_footer(); ?>