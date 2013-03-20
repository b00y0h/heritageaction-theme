<?php
/*
Template Name: Sentinel Slider
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>

<!-- <script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script> -->

<style type="text/css" media="screen">
  .sentinel-sidebar{
	  margin-top:-135px!important;
  }
  #homepage_bot{
    display:none;
  }
  #content-sidebar-wrap{
    min-height:0px !important;
  }
  
  #sentinelSlider{
     margin-top:-60px;
     height:605px;
     width:732px;
     background:url(<?php bloginfo('template_directory'); ?>/images/paper-stack.png) no-repeat;
  }
  
  .sliderWrap{
    float:left;
    margin:0px 0px 0 17px;
    width:630px;
    height:520px;
  }
  
  .sWrap{
    position:absolute;
    
    margin:40px 30px 0 40px;
    width:670px;
    height:520px;
  }
  
  .slide{
    width:630px !important;
    height:533px !important;
    padding:45px 40px 15px 40px;
    overflow-y: auto;
    
    background:#fff;
    border:1px solid #eee;
    
  }
  
  .slider-bg-shim{
    display:none;
    border:1px solid blue;
    position:absolute;
    z-index:4;
    
    background:#fff;
    margin-left:22px;
    width:350px;
    height:520px;
  }
  
  .rightSideCol{
    float:right;
    width:270px;
    height:400px;
  }
  
  .sentinelWidget{
    width:270px;
    height:200px;
    border-left:1px dashed #ccc;
    border-bottom:1px dashed #ccc;
    border-top:1px dashed #ccc;
    padding-left:10px;
    padding-top:10px;
  }
  
  
  
  .cy_left, .cy_right {
    bottom: 8px;
    cursor: pointer;
    height: 100%;
    position: absolute;
    width: 75px;
    z-index: 1102;
  }
  
  .cy_left{
    left: -30px;
  }
  .cy_right{
    top:;
    right:-30px;
  }
  
  .cy_cs{
    background:none;
    text-align: center;
    line-height:22px;
    font-weight:bold;
    font-size:15px;
    text-indent:0.1em;

    width:25px;
    height:25px;

    color:#fff;

    border:2px solid #fff;
    -webkit-border-radius: 90px;
    -moz-border-radius: 90px;
    border-radius: 90px;

    background-color:#000;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */

    -webkit-box-shadow: 0px 0px 7px rgba(50, 50, 50, 1);
    box-shadow:         0px 0px 7px rgba(50, 50, 50, 1);

    cursor:pointer;
    
    position:absolute;
    top:50%;
  }
  
  .cy_left:hover, .cy_right:hover{
    text-decoration:none !important;
  }
  
  #cy_right-ico{
     line-height:23px !important;
     text-indent:0.2em !important;
     right:10px;
  }
  #cy_left-ico{
     text-indent:0 !important;
     line-height:23px !important;
     left:10px;
  }
  #cy_right-ico:before{
     /*content: "\25B6";*/
  }
  #cy_left-ico:before{
     /*content: "\25C0";*/
  }
  
  .slide{
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.06) ;
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.06) ; 
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.06) ;
    display:none;
  }
  
  .slide a{
    text-decoration:underline;
  }
  .slide h2{
    margin-bottom:15px;
  }
  a.btn{
    text-decoration:none;
  }
  
</style>

<script type="text/javascript">
  (function($){
    $(document).ready(function(){
      
      
      $(".sliderWrap").cycle({
        fx: 'shuffle', 
        timeout: 0, 
        next:   '#next', 
        prev:   '#prev',
        // onPrevNextEvent: function(index, slideElement){
        //           var startZ = $('.sliderWrap .slide:eq('+slideElement+')').css('z-index');
        //           $('.slider-bg-shim').css('z-index', parseFloat(startZ));
        //           console.log('start slide: '+slideElement+' z:'+ startZ);
        //           console.log('make the shim a ' + parseFloat(startZ+1) )
        //           
        //           
        //         },
        //         after: function(currSlideElement){
        //           var endZ = $(currSlideElement).css('z-index');
        //           $('.slider-bg-shim').css('z-index', parseFloat(endZ-1));
        //           console.log('end current: ' + ($(currSlideElement).index()+1) + ' z:'+ endZ );
        //         }
      })
    })
  })(jQuery);
</script> 

<div id="hero">
  <div class="inner clearfix">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p class='page-excerpt'><?php echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
  </div>
</div>

<div id="primary" class="content-area">
  <?php get_sidebar('sentinel'); ?>
	<div id="content" class="site-content" role="main">
	  
     <div id="sentinelSlider">
       
       <div class="sWrap">
         
         <div class="slider-bg-shim"></div>
         
          <div class="sliderWrap">
          
          <?php if( isset($_COOKIE['_sentinel_email']) && !empty($_COOKIE['_sentinel_email'])) : ?>
          <div class="slide" style="display:block;">          	
	      	
	      	<h2>Welcome Back</h2>
	      		<p>
	      			You will earn Sentinel status by reporting your work, similar to how Members of Congress earn Sentinel status by making the right votes.
	      		</p>
	      		<p>
	      			As you know, we assign points for activities under the categories Local, Media, Congress, Online, and Other. Our team will review each action report you send, assigning points based on the impact of your work. Remember to post different action items separately.
	      		</p>
	      		
	      		<br><br>
	      		<div align="center">
	      			<div class="sentinel-nav-button">
		      			<a href="/sentinel/reportaction/" class="btn rounded red-gradient shadow">Submit Action</a>
		      		</div>
	      		</div>
		  </div>
		  <?php endif; ?>
         
            <div class="slide" style="display:block;">
              <h2>Are you ready to become a Sentinel?</h2>
	
              <p>Heritage Action Sentinels are a group committed conservatives doing the hard work of Congressional accountability.</p>

              Sentinels receive:
              
              <ul>
              <li>Personal support from the Heritage Action team.</li>
              <li>The Sentinel Kit, with a variety of materials to amplify your efforts.</li>
              <li>Invitations to regular strategy calls with our team and other exclusive events.</li>
              </ul>
              
              
              <p>We're proud to offer a lot to Sentinels and those on the path to becoming Sentinels, but the whole program is designed to be a movement of conservatives holding Congress accountable 24/7. The real reward is seeing Congress start making right decisions.</p>
                          
              <div align="center">
                <br><br><br>
                <a href="/sentinel/influenceprofile/" class="btn rounded blue-gradient shadow">Sign Up Now</a>
              </div>
            
            </div>

            <div class="slide">
              <h2>What is a Sentinel?</h2>
              <p>Sentinels are people that watch or stand guard, challenging all comers and preventing surprise attacks.</p>

              <p>The Sentinel Program is open to all conservatives willing to do the hard work of congressional accountability.</p>
              
              <p>When you become a Sentinel, we work with you individually, building your knowledge, growing your influence, and preparing you to take meaningful action. Sentinels commit to partnering with us to stand guard for freedom by leading their circles of influence and communicating with elected officials.</p>
              
              <div align="center">
                <br><br><br>
                <a href="/sentinel/influenceprofile/" class="btn rounded blue-gradient shadow">Sign Up Now</a>
              </div>
              
            </div>
            
            <div class="slide">
              <h2>Do you have what it takes?</h2>
              <p>Sentinels commit to working hard and bringing conservative accountability to Congress.</p>
              
              <ul>
              	<li>Communicate with elected officials and with your fellow citizens about key policy priorities and legislative strategy;</li>
				<li>Create a personal e-mail list that is appropriate for grassroots activism;</li>
				<li>Locate and attend town halls and ask questions;</li>
				<li>Attend or host skills clinics or neighborhood events to pull local conservatives together;</li>
				<li>Participate in canvass projects designed to spread awareness of key policy priorities and promote accountability;</li>
				<li>Attend local events, conventions, or fairs to distribute information; </li>
				<li>Create activist-based Facebook and twitter accounts to get our conservative message on a daily basis.</li>
              </ul>
              
              <div align="center">
                <br>
                <a href="/sentinel/influenceprofile/" class="btn rounded blue-gradient shadow">Sign Up Now</a>
              </div>
              
            </div>
         
          </div>
       
         <a id="next" class="cy_right">
           <span class="cy_cs" id="cy_right-ico">&#9654;</span>
         </a>
         <a id="prev" class="cy_left">
           <span class="cy_cs" id="cy_left-ico">&#9664;</span>
         </a>
         
      </div>
     
     </div>
     <div style="clear:both;height:15px;"></div>
     

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>