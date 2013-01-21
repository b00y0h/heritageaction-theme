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
      $classes[] = 'contact custom';
     return $classes;
}
get_header(); ?>
		    <div id="hero">
          <div class="inner clearfix">
    		  <h1 id="about_us">Contact Us</h1>
    		  <p>We would love to hear from you! Please fill out this form and we will get in touch with you shortly.</p>
    		  <div id="content" class="site-content form-horizontal" role="main">
  		    <div class="row">
            <div class="col1">
              
              <!-- Contact Us Title -->
              <div class="control-group question">
                <label for="contact_us_title" class="control-label"><?php _e('Title', 'heritageaction'); ?></label>
                <div class="controls input choice">
                  <select name="ARRAY[contact_us_title]" id="contact_us_title">
                    <option value=""><?php _e( '-Choose-', 'heritageaction'); ?></option>
                  </select>
                </div>
              </div>
              <!-- ^^^^^ Contact Us Title ^^^^^^ -->
              
              
              <!-- Contact Us First Name -->
              <div class="control-group question">
                <label for="contact_us_first_name" class="control-label"><?php _e('First Name', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[contact_us_first_name]" value="" id="contact_us_first_name">
                </div>
              </div>
              <!-- ^^^^^ Contact Us First Name ^^^^^^ -->
              
              <!-- Contact Us Last Name -->
              <div class="control-group question">
                <label for="contact_us_last_name" class="control-label"><?php _e('Last Name', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[contact_us_last_name]" value="" id="contact_us_last_name">
                </div>
              </div>
              <!-- ^^^^^ Contact Us Last Name ^^^^^^ -->
              
              <!-- Contact Us Phone -->
              <div class="control-group question">
                <label for="contact_us_phone" class="control-label"><?php _e('Phone', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[contact_us_phone]" value="" id="contact_us_phone">
                  
                </div>
              </div>
              <!-- ^^^^^ Contact Us Phone ^^^^^^ -->
              
              <!-- Contact Us Email -->
              <div class="control-group question">
                <label for="contact_us_email" class="control-label"><?php _e('Email', 'heritageaction'); ?></label>
                <div class="controls input">
                  <input type="text" name="ARRAY[contact_us_email]" value="" id="contact_us_email">
                  
                </div>
              </div>
              <!-- ^^^^^ Contact Us Email ^^^^^^ -->
              
              <!-- Receive Updates -->
              <div class="control-group question form-inline">
                <label class="inline"><?php _e('Do you want to receive our updates?', 'heritageaction'); ?></label>
                  <label class="radio inline"><input type="radio" name="ARRAY[receive_updates]" id="receive_updates_yes" <?php // echo C66_SettingManager::get_value('receive_updates') == '1' ? 'checked="checked" ' : '' ?> value="1"><?php _e('Yes', 'heritageaction'); ?></label>
                  <label class="radio inline"><input type="radio" name="ARRAY[receive_updates]" id="receive_updates_no" <?php // echo C66_SettingManager::get_value('receive_updates') != '1' ? 'checked="checked" ' : '' ?> value=""><?php _e('No', 'heritageaction'); ?></label>    
              </div>
              <!-- ^^^^^ Receive Updates ^^^^^^ -->



            </div> <!-- .col1 -->

            <div class="col2">

              <!-- Contact Us Message -->
              <div class="control-group question">
                <div class="controls input full">
                  <textarea name="ARRAY[contact_us_message]" id="contact_us_message" placeholder="Please type your message here."></textarea>
                  
                </div>
              </div>
              <!-- ^^^^^ Contact Us Message ^^^^^^ -->
              

            </div> <!-- .col2 -->

          </div> <!-- .row -->
          
          <div class="row">
            <div id="captcha">
              <p><img src="<?php echo get_bloginfo('template_url'); ?>/img/captcha.gif" alt="Captcha" class="float-right">Please type the text from the top field into the bottom field to prove you’re a real human and not a computer.<br>Thanks!</p>
            </div> <!-- #captcha -->
          </div> <!-- .row -->
          <a href="#" class="btn rounded medium-blue-gradient">Send</a>

    			</div><!-- #content .site-content -->


          </div> <!-- .inner -->
  		  </div> <!-- #hero -->

   
<?php get_footer(); ?>