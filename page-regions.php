<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

get_header(); ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stately/assets/css/stately.css?v=1.0">
  
		    <div id="hero">
          <div class="inner clearfix">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <p class='page-excerpt'><?php echo get_post_meta($post->ID, 'page_excerpt', true); ?></p>
          </div>
        </div>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>
					
					<style type="text/css" media="screen">
					  #meta-data li.circle{
					    z-index:4;
					    cursor:pointer;
					  }
					  #meta-data li.circle:hover{
					    z-index:10;
					    background-color: rgba(138, 210, 230, .8);
					  }
					  
					  #meta-data li.circle.coming-soon, #meta-data li.circle.coming-soon:hover{
					    background-color: rgba(255,255,255, .4);
					    cursor:default;
					  }
					  li.circle .note{
					    display:none;
              position:relative;
              width:120px;
              top:50px;
              left:5px;
              z-index:12;
              color:#000;
              font-weight:bold;
              text-transform:uppercase;
					  }
					  #meta-data li.circle:hover .note{
					    display:block;
					  }
					</style>
					<script type="text/javascript">
					 (function($){
					   $(document).ready(function(){
					     
					     $("#meta-data li.circle.coming-soon").click(function(e){
 					       e.preventDefault(); 					       
 					     })
					     
					     $("#meta-data li.circle:not(.coming-soon)").click(function(){
					        window.location.href = ($("a",$(this)).attr('href'));                  
					     })
					     
					     
					     
					   })
					 })(jQuery);
					</script>  
					
					<div id="map-contain">
        	  <ul class="stately" id="ha-map">
          		<li data-state="al" class="al">A</li>
          		<!-- <li data-state="ak" class="ak">B</li> -->
          		<li data-state="ar" class="ar">C</li>
          		<li data-state="az" class="az">D</li>
          		<li data-state="ca" class="ca">E</li>
          		<li data-state="co" class="co">F</li>
          		<li data-state="ct" class="ct">G</li>
          		<li data-state="de" class="de">H</li>
          		<li data-state="dc" class="dc">I</li>
          		<li data-state="fl" class="fl">J</li>
          		<li data-state="ga" class="ga">K</li>
          		<!-- <li data-state="hi" class="hi">L</li> -->
          		<li data-state="id" class="id">M</li>
          		<li data-state="il" class="il">N</li>
          		<li data-state="in" class="in">O</li>
          		<li data-state="ia" class="ia">P</li>
          		<li data-state="ks" class="ks">Q</li>
          		<li data-state="ky" class="ky">R</li>
          		<li data-state="la" class="la">S</li>
          		<li data-state="me" class="me">T</li>
          		<li data-state="md" class="md">U</li>
          		<li data-state="ma" class="ma">V</li>
          		<li data-state="mi" class="mi">W</li>
          		<li data-state="mn" class="mn">X</li>
          		<li data-state="ms" class="ms">Y</li>
          		<li data-state="mo" class="mo">Z</li>
          		<li data-state="mt" class="mt">a</li>
          		<li data-state="ne" class="ne">b</li>
          		<li data-state="nv" class="nv">c</li>
          		<li data-state="nh" class="nh">d</li>
          		<li data-state="nj" class="nj">e</li>
          		<li data-state="nm" class="nm">f</li>
          		<li data-state="ny" class="ny">g</li>
          		<li data-state="nc" class="nc">h</li>
          		<li data-state="nd" class="nd">i</li>
          		<li data-state="oh" class="oh">j</li>
          		<li data-state="ok" class="ok">k</li>
          		<li data-state="or" class="or">l</li>
          		<li data-state="pa" class="pa">m</li>
          		<li data-state="ri" class="ri">n</li>
          		<li data-state="sc" class="sc">o</li>
          		<li data-state="sd" class="sd">p</li>
          		<li data-state="tn" class="tn">q</li>
          		<li data-state="tx" class="tx">r</li>
          		<li data-state="ut" class="ut">s</li>
          		<li data-state="va" class="va">t</li>
          		<li data-state="vt" class="vt">u</li>
          		<li data-state="wa" class="wa">v</li>
          		<li data-state="wv" class="wv">w</li>
          		<li data-state="wi" class="wi">x</li>
          		<li data-state="wy" class="wy">y</li>
          	</ul>
            <ul id="meta-data">
              <li class="circle Philadelphia"><a href="/philadelphia">Philadelphia</a><i></i></li>
              <li class="circle Pittsburgh"><a href="/pittsburgh">Pittsburgh</a><i></i></li>
              <li class="circle Chicago"><a href="/chicago">Chicago</a><i></i></li>
              <li class="circle Cincinnati"><a href="/cincinnati">Cincinnati</a><i></i></li>
              <li class="circle Richmond"><a href="/richmond">Richmond</a><i></i></li>
              <li class="circle Louis"><a href="/stlouis">St. Louis</a><i></i></li>
              <li class="circle Birmingham"><a href="/birmingham">Birmingham</a><i></i></li>
              <li class="circle Dallas"><a href="/dallas">Dallas</a><i></i></li>
              <li class="circle Phoenix coming-soon"><a href="/phoenix">Phoenix</a><i></i><div class="note">Coming Soon</div></li>
              <li class="circle Tampa"><a href="/tampa">Tampa</a><i></i></li>
            </ul>
          </div>
          
          <p style="font-size:1.2em;">
            No Regional Coordinator in your area? <a href="/sentinel/contact" style="text-decoration:underline;">Contact Sentinel Coordinator Hugh Fike</a> today to learn about taking action with the Sentinel Program.
          </p>

					<?php if ('open' == $post->comment_status) { comments_template( '', true ); } ?>

				<?php endwhile; // end of the loop. ?>
				
				
				
        <div style="clear:both;"></div>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>