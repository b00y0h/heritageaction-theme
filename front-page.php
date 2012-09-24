<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

 /*
 Template Name: Home
 */

get_header(); ?>
   <div id="main-inner">
		<div id="primary" class="content-area">
		    <div id="hero">
  		    <img src="<?php echo get_bloginfo('template_url'); ?>/import-image/slide1.jpg" alt="Slide1" class="size-full">
  		    <div class="diag-stripes"></div>
  		  </div>
  		  
  		  <div id="content" class="site-content" role="main">
          <div class="col1">
      			<div id="key-votes" class="widgets shadow-curl-left">
              <header class="gradient blue-gradient">
                <h2 class="title">Key Votes</h2>
              </header>
              
              <div class="switcher">
                <!-- house-senate switcher -->
                <div class="control-group question">
                  <label class="control-label"><?php _e('House', 'heritageaction'); ?></label>
                  <div class="controls input choice">
                    <label class="radio inline"><input type="radio" name="ARRAY[house-senate_switcher]" id="house-senate_switcher_yes" value="1"><?php _e('Yes', 'heritageaction'); ?></label>
                    <label class="radio inline"><input type="radio" name="ARRAY[house-senate_switcher]" id="house-senate_switcher_no" value=""><?php _e('No', 'heritageaction'); ?></label>    
                  </div>
                </div>
                <!-- ^^^^^ house-senate switcher ^^^^^^ -->

              </div> <!-- .switcher -->
              
              <ul class="items">
                <li><a href="#">
                  <span class='post-title'>CO-SPONSORSHIP of the GSE Bailout Elimination and Taxpayer Protection Act.</span></a>
                  <span class='excerpt'>This is a post excerpt that explains the key vote in brief.. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>                  
                </li>
                <li><a href="#">
                  <span class='post-title'>CO-SPONSORSHIP of the Defending America’s Affordable Energy Act.</span></a>
                  <span class='excerpt'>This is a post excerpt that explains the key vote in brief.. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>                  
                </li>
                <li class='yes'><a href="#">
                  <span class='post-title'>&ldquo;YES&rdquo; on the Ryan Budget.</span></a>
                  <span class='excerpt'>This is a post excerpt that explains the key vote in brief.. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>                  
                </li>
                <li class='no'><a href="#">
                  <span class='post-title'>&ldquo;NO&rdquo; on something for sure.</span></a>
                  <span class='excerpt'>This is a post excerpt that explains the key vote in brief.. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>                  
                </li>
              </ul>
              
              
              <div class="pagination pagination-centered blue">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li><a href="#">&gt;</a></li>
               </ul>
              </div>
              
              
      			</div> <!-- #key-votes -->
          </div> <!-- .col1 -->
          
          <div class="col2">
            <div id="score-card" class="widgets">
              <header class="gradient light-blue-gradient">
                <h2 class="title">Score Card</h2>
              </header>
              <div id="scorecard-map">
                <img src="<?php echo get_bloginfo('template_url'); ?>/img/scorecard-map.gif" alt="Scorecard Map" class="size-full">
              </div>
              <a href="#" class="btn rounded gradient medium-blue-gradient">Get the scores</a>
            </div>
            
            <div id="action-dashboard" class="widgets">
              <header class="gradient red-gradient">
                <h2 class="title">Action Dashboard</h2>
              </header>
              <p class="post-title">Holding your Members of Congress accountable starts here.</p>
              <p>Find your dashboard: enter your zip code or your district code (Maine's first district would be ME01):</p>
              <!-- enter your zip -->
              <div class="control-group question">
                <div class="controls input">
                  <input type="search" name="ARRAY[enter_your_zip]" id="enter_your_zip" placeholder="Enter your zip">
                </div>
              </div>
              <!-- ^^^^^ enter your zip ^^^^^^ -->
              
              <a href="#" class="btn rounded gradient red-gradient">Find your district</a>
            </div>
            
          </div> <!-- .col2 -->

  			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->
    <?php get_sidebar(); ?>
    
    </div> <!-- #main-inner -->
    
    <div id="black-bg"></div>
    
    <section id="sign-up">
      <div id="sign-up-tab" class="gradient medium-blue-gradient">Sign Up</div>
      <div class="centered max-width">
        <form action="front-page_submit" method="get" accept-charset="utf-8">
          <input type="text" name="ARRAY[first_name]" id="first_name" placeholder="First Name">
          <input type="text" name="ARRAY[email_address]" id="email_address" placeholder="Email Address">
          <input type="text" name="ARRAY[zip_code]" id="zip_code" placeholder="Zip Code">
          <a href="#" class="btn rounded gradient medium-blue-gradient">Sign Up</a>
          <div id="interest">
              <div class="control-group question">
                <label class="control-label"><?php _e("I'm interested in:", 'heritageaction'); ?></label>
                <div class="controls input choice">
                  <label class="checkbox inline"><input type="checkbox" checked="checked" name="ARRAY[email_interest]" value=""><?php _e('Action Alerts', 'heritageaction'); ?></label>
                  <label class="checkbox inline"><input type="checkbox" name="ARRAY[email_interest]" value=""><?php _e('Why We Fight', 'heritageaction'); ?></label>
                  <label class="checkbox inline"><input type="checkbox" name="ARRAY[email_interest]" value=""><?php _e('Insider', 'heritageaction'); ?></label>
                </div>
              </div>
              <!-- ^^^^^ press updates ^^^^^^ -->
          </div>
        </form>
      </div>
    </section>
    
    <section id='under-cover'>
      <div class="inner">
        <div class="col1">
        <div id="recent-press-releases" class="widgets shadow-curl-left">
          <header class="gradient orange-gradient">
            <h2 class="title">Recent Press Releases</h2>
          </header>
          <article>
            <h4>Heritage Action Releases Legislative Scorecard.</h4>
            <span class="post-meta">heritageaction    |   August 25, 2011</span>
            <p>Conservative Scorecard Doesn’t Grade on a Curve Washington – On Thursday, Heritage Action for America unveiled its legislative scorecard, a comprehensive and revealing barometer of a lawmaker’s willingness to fight for conservative policies in Congress. “With each vote cast in Congress, freedom either advances or recedes,” Heritage Action’s CEO Michael A. Needham said.  “Heritage Action’s [...]</p>
            <a href="#">READ FULL PRESS RELEASE</a>
          </article>
          
          
          <div class="pagination pagination-centered orange">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">&gt;</a></li>
           </ul>
          </div>
          
          
        </div> <!-- #recent-press-releases -->
        </div>
        <div class="col2">
        <div id="about-us" class="widgets shadow-curl-right">
          <header class="gradient medium-blue-gradient">
            <h2 class="title">About Us</h2>
          </header>
          <div id="about-us-video" class="video">
            <img class="size-full" src="<?php echo get_bloginfo('template_url'); ?>/import-image/video-slug.jpg" alt="Video Slug">
            <div class="overlay"></div>
          </div>
          <div class="social">
            <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-recommend.gif" alt="Fb Recommend"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-send.gif" alt="Fb Send"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/twitter.gif" alt="Twitter">
          </div>
          <a href="#" class='btn rounded gradient medium-blue-gradient'>More</a>
        </div> <!-- #about-us -->

          </div>


      </div> <!-- .inner -->
    </section>
    
<?php get_footer(); ?>