<?php

 function sentinel_nav_classes($slug=''){
	 global $post;
	 $current_post_name = $post->post_name;
	 $output = 'sentinel-nav-'.$current_post_name;
	 if($slug == $current_post_name){
		 $output .= ' current-sentinel-nav';
	 }
	 return $output;
 }
?>
<style type="text/css" media="screen">
    .sentinel-sidebar{
      float:right;
      margin-top:-195px;
      margin-right:-15px;
      text-align:center;
    }
    .sentinel-nav-button{
      margin-top:15px;
      margin-bottom:15px;
     
    }
    .sentinel-nav-button a{
      font-size:14px!important;
      width:205px;
    }
    .current-sentinel-nav a{
	    border:3px solid #999;
	    color:#ddd !important;
    }
</style>
<div class="sentinel-sidebar">
     <a href="/sentinel/">
       <img class="sentinel-logo" src="<?php bloginfo('template_directory'); ?>/images/sentinel-logo.png">
     </a>
     
     <div class="sentinel-nav-button <?php echo sentinel_nav_classes('influenceprofile'); ?>">
       <a href="/sentinel/influenceprofile/" class="btn rounded blue-gradient shadow">Sign Up Now</a>
     </div>
     
     <div class="sentinel-nav-button <?php echo sentinel_nav_classes('status'); ?>">
       <a href="/sentinel/status/" class="btn rounded medium-blue-gradient shadow">Check Your Status</a>
     </div>
    
     <div class="sentinel-nav-button <?php echo sentinel_nav_classes('reportaction'); ?>">
      <a href="/sentinel/reportaction/" class="btn rounded red-gradient shadow">Submit Action</a>
     </div>
    	
     <div class="sentinel-nav-button <?php echo sentinel_nav_classes('recruit'); ?>">
      <a href="/sentinel/recruit/" class="btn rounded medium-blue-gradient shadow">Recruit Friends</a>
     </div>
     
    <div class="sentinel-nav-button <?php echo sentinel_nav_classes('faq'); ?>">
      <a href="/sentinel/faq/" class="btn rounded orange-gradient shadow">FAQ &amp; More Info</a>
    </div> 
       
</div>