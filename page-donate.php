<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

 /*
 Template Name: Donate
 */
add_filter( 'body_class', 'my_neat_body_class');
function my_neat_body_class( $classes ) {
      $classes[] = 'donate custom';
     return $classes;
}
get_header(); ?>
		    <div id="hero">
		      <div class="inner clearfix">
    		  <h1 id="about_us">Donate</h1>
		      <div class="col1 column6">
  		      <p>Heritage Action for America is building a grassroots army around the nation to pressure lawmakers to implement conservative reforms. We are holding Congressmen accountable to their conservative campaign promises with our tough Conservative Scorecard. And we are fighting in the trenches in Washington to make sure Representatives and Senators always vote on principle.</p>
            <p>As a grassroots organization, we depend on the financial support of thousands of conservatives like you from across the nation. Your gift to Heritage Action for America today will allow us to continue holding lawmakers' feet to the fire as we enter this critical election year.</p>
          </div>
          <div class="col2 column6">
            <div id="select-your-donation" class="shadow shadow-curl-right">
              <p class="ribbon">
                  <strong class="ribbon-content">Select Your Donation</strong>
              </p>
              
              <div class="col1">
              
                <!-- standard donation amounts -->
                <div class="control-group question">
                  <div class="controls input choice">
                    <label class="radio"><input type="radio" name="ARRAY[donation_amounts]" value="25"><?php _e('$25', 'heritageaction'); ?></label>
                    <label class="radio"><input type="radio" name="ARRAY[donation_amounts]" value="50"><?php _e('$50', 'heritageaction'); ?></label>
                    <label class="radio"><input type="radio" name="ARRAY[donation_amounts]" value="100"><?php _e('$100', 'heritageaction'); ?></label>
                    <label class="radio"><input type="radio" name="ARRAY[donation_amounts]" value="250"><?php _e('$250', 'heritageaction'); ?></label>
                    <label class="radio"><input type="radio" name="ARRAY[donation_amounts]" value="500"><?php _e('$500', 'heritageaction'); ?></label>
                    <label class="radio"><input type="radio" name="ARRAY[donation_amounts]" value="1000"><?php _e('$1000', 'heritageaction'); ?></label>
                  </div>
                </div>
                <!-- ^^^^^ standard donation amounts ^^^^^^ -->
              
              </div>
              
              <div class="col2">

                <!-- other donation amount -->
                <div class="control-group question">
                  <div class="controls input choice">
                    <label class="radio inline"><input type="radio" name="ARRAY[donation_amounts]" value="other-donation-amount"><?php _e('Other: ', 'heritageaction'); ?></label>
                    <input type="text" name="ARRAY[visitor_input_amount]" value="$1,000,000" id="visitor_input_amount">
                    <p class="help-block"><?php _e( '($5 minimum per payment)', 'heritageaction'); ?></p>
                  </div>
                </div>
                <!-- ^^^^^ other donation amount ^^^^^^ -->
                
                <!-- Payment Plan -->
                <div class="control-group question">
                  <div class="controls input choice">
                    <label class="radio inline"><input type="radio" name="ARRAY[payment_plan]" value="active"><?php _e('Payment Plan: ', 'heritageaction'); ?>
                    </label>
                    <select name="ARRAY[payment_plan_select]" id="payment_plan_select">
                      <option value="select"><?php _e( 'Select...', 'heritageaction'); ?></option>
                    </select>  
                  </div>
                </div>
                <!-- ^^^^^ Payment Plan ^^^^^^ -->

                <!-- Recurring Donation -->
                <div class="control-group question">
                  <div class="controls input choice">
                    <label class="radio inline"><input type="radio" name="ARRAY[recurring_donation]" value="active"><?php _e('Recurring Donation: ', 'heritageaction'); ?>
                    </label>
                    <select name="ARRAY[recurring_donation_select]" id="recurring_donation_select">
                      <option value="select"><?php _e( 'Select...', 'heritageaction'); ?></option>
                    </select>
                  </div>
                </div>
                <!-- ^^^^^ Payment Plan ^^^^^^ -->


              </div> <!-- .col2 -->
              
              <a href="#" class="btn rounded red-gradient shadow">Support Heritage</a>
              
              <div class="clearfix">&nbsp;</div> <!-- TODO: fix clearfix. ugh -->
              
            </div> <!-- #select-your-donation -->
		      </div> <!-- .col2.column6 -->
          </div> <!-- .inner -->
  		  </div> <!-- #hero -->
   <div id="main-inner">
		<div id="primary" class="content-area">
  		  <h1>Your Information</h1>
  		  <div id="content" class="site-content row" role="main">
          

  			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->    
    </div> <!-- #main-inner -->
   
<?php get_footer(); ?>