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
add_filter( 'body_class', 'my_neat_body_class_donate');
function my_neat_body_class_donate( $classes ) {
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
		<div id="primary" class="content-area form-horizontal">
  		  <h1>Your Information</h1>
  		  <div id="content" class="site-content row" role="main">
		    <div class="row">
          <div class="col1">
            <div id="billing-address">
              <h4>Billing Address</h4>
              <!-- Billing Street 1 -->
              <div class="control-group question">
                <label for="billing_street_1" class="control-label"><?php _e('Street', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[billing_street_1]" value="" id="billing_street_1">
                </div>
              </div>
              <!-- ^^^^^ Billing Street 1 ^^^^^^ -->
              
              <!-- Billing Street 2 -->
              <div class="control-group question">
                <label for="billing_street_2" class="control-label"><?php _e('Street 2', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[billing_street_2]" value="" id="billing_street_2">
                </div>
              </div>
              <!-- ^^^^^ Billing Street 2 ^^^^^^ -->
              
              <!-- Billing City -->
              <div class="control-group question">
                <label for="billing_city" class="control-label"><?php _e('City', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[billing_city]" value="" id="billing_city">
                </div>
              </div>
              <!-- ^^^^^ Billing City ^^^^^^ -->
              
              <!-- Billing State -->
              <div class="control-group question">
                <label for="billing_state" class="control-label"><?php _e('State', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[billing_state]" value="" id="billing_state">
                </div>
              </div>
              <!-- ^^^^^ Billing State ^^^^^^ -->
              
              <!-- Billing Zip Code -->
              <div class="control-group question">
                <label for="billing_zip_code" class="control-label"><?php _e('Zip Code', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[billing_zip_code]" value="" id="billing_zip_code">
                  
                </div>
              </div>
              <!-- ^^^^^ Billing Zip Code ^^^^^^ -->
              
              <!-- Billing Country -->
              <div class="control-group question">
                <label for="billing_country" class="control-label"><?php _e('Country', 'heritageaction'); ?></label>
                <div class="controls input choice">
                  <select name="ARRAY[billing_country]" id="billing_country">
                    <option value="-Choose-"><?php _e( '-Choose-', 'heritageaction'); ?></option>
                  </select>
                </div>
              </div>
              <!-- ^^^^^ Billing Country ^^^^^^ -->
              
            </div> <!-- #billing-address -->
            
            
          </div> <!-- .col1 -->

          <div class="col2">
            
            <div id="personal-info">
              <h4>Personal Info</h4>
              
              <!-- Personal Info Title -->
              <div class="control-group question">
                <label for="personal_info_title" class="control-label"><?php _e('Title', 'heritageaction'); ?></label>
                <div class="controls input choice">
                  <select name="ARRAY[personal_info_title]" id="personal_info_title">
                    <option value=""><?php _e( '-Choose-', 'heritageaction'); ?></option>
                  </select>
                </div>
              </div>
              <!-- ^^^^^ Personal Info Title ^^^^^^ -->
              
              <!-- Personal Info First Name -->
              <div class="control-group question">
                <label for="personal_info_first_name" class="control-label"><?php _e('First Name', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[personal_info_first_name]" value="" id="personal_info_first_name">
                </div>
              </div>
              <!-- ^^^^^ Personal Info First Name ^^^^^^ -->
              
              <!-- Personal Info Last Name -->
              <div class="control-group question">
                <label for="personal_info_last_name" class="control-label"><?php _e('Last Name', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[personal_info_last_name]" value="" id="personal_info_last_name">
                </div>
              </div>
              <!-- ^^^^^ Personal Info Last Name ^^^^^^ -->
              
              <!-- Personal Info Email -->
              <div class="control-group question">
                <label for="personal_info_email" class="control-label"><?php _e('Email', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[personal_info_email]" value="" id="personal_info_email">
                  
                </div>
              </div>
              <!-- ^^^^^ Personal Info Email ^^^^^^ -->
              
              <!-- Receive Updates -->
              <div class="control-group question form-inline">
                <label class="inline"><?php _e('Do you want to receive our updates?', 'heritageaction'); ?></label>
                  <label class="radio inline"><input type="radio" name="ARRAY[receive_updates]" id="receive_updates_yes" <?php // echo C66_SettingManager::get_value('receive_updates') == '1' ? 'checked="checked" ' : '' ?> value="1"><?php _e('Yes', 'heritageaction'); ?></label>
                  <label class="radio inline"><input type="radio" name="ARRAY[receive_updates]" id="receive_updates_no" <?php // echo C66_SettingManager::get_value('receive_updates') != '1' ? 'checked="checked" ' : '' ?> value=""><?php _e('No', 'heritageaction'); ?></label>    
              </div>
              <!-- ^^^^^ Receive Updates ^^^^^^ -->
            </div> <!-- #personal-info -->
                        
          </div> <!-- .col2 -->
        
        </div>
 
          <div class="row">
            <div class="col1">
              <div id="cc-info">

                 <h4>Credit Card Info</h4>

                 <!-- Credit Card Number -->
                 <div class="control-group question">
                   <label for="credit_card_number" class="control-label"><?php _e('Cart #', 'heritageaction'); ?></label>
                   <div class="controls input">
                     <input type="text" name="ARRAY[credit_card_number]" value="" id="credit_card_number">
                   </div>
                 </div>
                 <!-- ^^^^^ Credit Card Number ^^^^^^ -->

                 <!-- Credit Card CVC Code -->
                 <div class="control-group question">
                   <label for="credit_card_cvc_code" class="control-label"><?php _e('CVC Code', 'heritageaction'); ?></label>
                   <div class="controls input">
                     <input type="text" name="ARRAY[credit_card_cvc_code]" value="" id="credit_card_cvc_code">

                   </div>
                 </div>
                 <!-- ^^^^^ Credit Card CVC Code ^^^^^^ -->

                 <!-- Credit Card Exp Month and Year -->
                 <div class="control-group question form-inline">
                   <label for="credit_card_exp_month" class="control-label"><?php _e('Exp Month', 'heritageaction'); ?></label>
                   <div class="controls input">
                     <select name="ARRAY[credit_card_exp_month]" id="credit_card_exp_month">
                       <option value=""><?php _e( '-Choose-', 'heritageaction'); ?></option>
                     </select>
                   <label for="credit_card_exp_year" id="credit_card_exp_year_label"><?php _e('Exp Year', 'heritageaction'); ?></label>
                     <select name="ARRAY[credit_card_exp_year]" id="credit_card_exp_year">
                       <option value=""><?php _e( '-Choose-', 'heritageaction'); ?></option>
                     </select>
                     </div>
                 </div>
                 <!-- ^^^^^ Credit Card Exp Month and Year ^^^^^^ -->



               </div> <!-- #cc-info -->
             </div> <!-- .col1 -->
             
             <div class="col2">
                <div id="thank-you">
                  <h4>Thank You</h4>
                  <img src="<?php echo get_bloginfo('template_url'); ?>/img/cards.png" alt="Cards">
                  <p>Because Heritage Action for America lobbies directly on behalf of conservative legislation, contributions are not tax-deductible as charitable donations. All donations are processed securely.</p>
                </div>
             </div> <!-- .col2 -->
            
          </div> <!-- .row -->

          <a href="#" class='btn rounded shadow medium-blue-gradient'>Donate</a>
          
          <div id="donate-by-mail" class="row">
            <p>To donate by mail, make out your check to "Heritage Action for America" and mail to:</p>
            <address>
              Heritage Action for America<br>
              214 Massachusetts Ave NE, Suite 400<br>
              Washington DC 20002<br>
            </address>
          </div>
 
 
          
  			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->    
    </div> <!-- #main-inner -->
   
<?php get_footer(); ?>