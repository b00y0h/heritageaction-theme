<style type="text/css">
  label{
    display:inline;
  }
  #activities label{
	  display:block;
	}
	label.error, #activities label.error {
		color: #ff0000;
		display: none;
	}
	input + label.error {
		padding-left: 5px;
	}
	#error {
		background: #ffeeee;
		border: 1px solid #cc0000;
		color: #cc0000;
		display: none;
		font-weight: 500;
		padding: 10px;
	}
	#response {
		background: #EBF1F3;
		border: 1px solid #2256A2;
		color: #2256A2;
		display: none;
		font-weight: 500;
		padding: 10px;
	}
  #response a {text-decoration:underline;}
	#sentinel-survey-form fieldset {
		display: none;
		border: none;
		margin: 0;
		padding: 0;
		width: 700px;
		font-size:14px;
		font-family:Georgia;
	}
	#sentinel-survey-form fieldset#fs-one {
		display: block;
	}
	#content h1.ss-form-title,
	#content h2.ss-page-title,
	#content h2.ss-section-title {
		color: #000;
		font-family: Arial, sans-serif;
		font-size: 1.28em;
		font-style: normal;
	}
	#content h1.ss-form-title {
		padding: 0 0 1em;
	}
	#content h2.ss-page-title {
		margin: 0;
		padding: 0;
	}
	#content h2.ss-section-title {
		background:	#eee;
		margin: 2em -0.4em 0;
		padding: 0.4em;
	}
	input[type=submit] {
		font: 12.8px Arial, sans-serif;
	}
	
	span.gray {
		color: #666;
		display: block;
		margin: 0.1em 0 0.25em;
	}
	
	
	.section-instructions{
	  font-size:14px;
	}
	
	.sentinel-contact-col-left{
    float:left;
    width:250px;
    border-right:1px solid #c2c2c2;
    margin-right:10px;
  }
  .sentinel-contact-col-left input{
   width:90%;
  }

  .sentinel-contact-col-right{
    float:left;
    width:250px;

  }
  .sentinel-contact-col-right input{
    width:90%;
  }
  .sentinel-required-notice{
   color:#666;
   padding:5px;
  }
  #districts_long{
    height:50px;
  }
  
  #content h1.ss-form-title{
    font-family:Georgia;
    font-size:24px;
    margin:0;
    padding:0;
    line-height:28px;
  }
  
  #content h2.ss-page-title{
    font-family:Georgia;
    font-size:14px;
    text-transform:uppercase;
    font-weight:normal;
    margin:0 0 5px 0;
    padding:0;
    line-height:16px !important; 
  }
</style>


<form action="#" id="sentinel-survey-form" method="post" name="sentinel-survey-form">
	<div id="response">Success</div>
	<div id="error">Error</div>
	<fieldset id="fs-one" align="center">
	  
	  <div class="sentinel-intro-text" align="left">

      <img src="<?php bloginfo('template_directory'); ?>/images/intro-text.png" alt="You are about to embark on the path to becoming a Heritage Action Sentinel.">
      <p>
      The first step is to complete your Sentinel Influence Profile. This short survey helps us understand the political activities you are already doing and the activities you are interested in starting up. After you complete the profile, we will connect you to the conservative policy fight on Capitol Hill.
      </p>
      <p>
      The Sentinel Influence Profile has three pages. Press "Continue" at the end of each page. On page three you'll press "Submit" to complete the survey.
      </p>
      <p>
      After you complete the survey, be sure to push the submit button once. It takes a second to submit and then you'll see a confirmation notice. We’ll be in touch to help you get started on the path to becoming a Sentinel!
      </p>

    </div>
		
		<a href="#" class="continue btn rounded blue-gradient shadow" >Get Started</a>
	</fieldset>
	<fieldset id="fs-two">
	  <h1 class="ss-form-title">Sentinel Influence Profile</h1>
		<h2 class="ss-page-title">Page <em>1 of 3</em>: Activism Details</h2>
		<div id="activities">
			<strong>What activities are you interested in? <span class="required">*</span></strong><br />
			<span class="gray">You can select things you already do or plan to do in the future.</span>
			<label for="activity-call">
				<input id="activity-call" name="act_1" type="checkbox" value="1" />
				Call or email your Members of Congress
			</label><br />
			<label for="activity-visit">
				<input id="activity-visit" name="act_2" type="checkbox" value="1" />
				Visit your Members of Congress (in DC or local office)
			</label><br />
			<label for="activity-meeting">
				<input id="activity-meeting" name="act_3" type="checkbox" value="1" />
				Attend a local tea party, political party, or other political meeting
			</label><br />
			<label for="activity-event">
				<input id="activity-event" name="act_4" type="checkbox" value="1" />
				Attend a town hall style political event
			</label><br />
			<label for="activity-media">
				<input id="activity-media" name="act_5" type="checkbox" value="1" />
				Use new media, like Facebook or Twitter, to share information
			</label><br />
			<label for="activity-volunteer">
				<input id="activity-volunteer" name="act_6" type="checkbox" value="1" />
				Volunteer for a political campaign
			</label><br />
			<label for="activity-write">
				<input id="activity-write" name="act_7" type="checkbox" value="1" />
				Write letters to the editor, other Op-Ed pieces, or political blog entries
			</label>
			<label class="error" for="activities"><br />Please check at least one</label><br /><br />
		</div><!-- /#activities -->
		<a href="#" class="back btn rounded medium-blue-gradient shadow" >Back</a>
		<a href="#" class="continue btn rounded blue-gradient shadow">Continue</a>
	</fieldset>
	<fieldset id="fs-three">
	  <h1 class="ss-form-title">Sentinel Influence Profile</h1>
		<h2 class="ss-page-title">Page <em>2 of 3</em>: Political Influence</h2>
		
		<div class="section-instructions">
			Describing the political influence you already have will help us engage you in the efforts that fit you. We keep all answers private.
		</div>
		
		<!-- Indirect Influence -->
		<h2 class="ss-section-title">Indirect Influence</h2><br />
		
		<label for="email-list"><strong>Do you have an email or address list you forward messages to? <span class="required">*</span></strong></label><br />
		<label for="email-list-yes">
			<input id="email-list-yes" name="list" type="radio" value="yes" />	Yes
		</label>
		&nbsp; &nbsp;
		<label for="email-list-no">
			<input id="email-list-no" name="list" type="radio" value="no" />	No
		</label>
		
		<label class="error" for="email_list"><br />Please select one</label><br /><br />
		
		<strong>Do you host regular meetings for a community or non-profit group?</strong><br />
		<label for="regular-meetings-yes">
			<input id="regular-meetings-yes" name="meetings" type="radio" value="yes" />
			Yes
		</label>
		&nbsp; &nbsp;
		<label for="regular-meetings-no">
			<input id="regular-meetings-no" name="meetings" type="radio" value="no" />
			No
		</label><br /><br />
		<strong>Are you willing to use these or other circles of influence to spread our message?</strong><br />
		<span class="gray">Let us know what you can do and we'll do our best to help.</span>
		<textarea cols="75" name="spread" rows="8"></textarea>
		<!-- Direct Influence -->
		<h2 class="ss-section-title">Direct Influence</h2>
		<div>
			
		</div><br />
		<strong>What political campaigns have you donated to in the last five years?</strong><br />
		<span class="gray">
			Telling us about your donations will help us understand your activism.
			This information will remain fully confidential and will not be disclosed to anyone.
		</span>
		<textarea cols="75" name="donated" rows="8"></textarea><br /><br />
		<strong>Do you know any of your Members of Congress personally?</strong><br />
		<span class="gray">
			Knowing how you communicate with lawmakers can help us lobby more effectively
			to advance conservative principles. Tell us what kind of communication you have
			with him or her and their office.
		</span>
		<textarea cols="75" name="members_congress" rows="8"></textarea><br /><br />
		<a href="#" class="back btn rounded medium-blue-gradient shadow" >Back</a>
		<a href="#" class="continue btn rounded blue-gradient shadow">Continue</a>
		<br /><br />
	</fieldset>
	<fieldset id="fs-four">
	  <h1 class="ss-form-title">Sentinel Influence Profile</h1>
		<h2 class="ss-page-title">Page <em>3 of 3</em>: Submit Your Sentinel Influence Profile</h2>
		<div class="section-instructions">
			Thanks for answering the questions on your Sentinel Influence Profile. We will contact you directly to get you started on the path to being a Sentinel. Be sure to push submit on this page to send us your Influence Profile.
		</div><br />
		<label for="heritage-member">
		<strong>Are you a member of The Heritage Foundation?</strong> &nbsp; &nbsp; <input id="heritage-member" name="heritage_member_c" type="checkbox" value="1" /> &nbsp;&nbsp;Yes
		</label><br />
    
    <div class="sentinel-contact-col-left">
  		<input class="required" name="name" type="text" placeholder="Full Name *" />

  		<input name="address" type="text" placeholder="Address" />

  		<input name="address_city" type="text" placeholder="City" />

  		<input name="address_state" type="text" placeholder="State" />
		</div>
		
		<div class="sentinel-contact-col-right">
		  
		  <input class="email required" name="email" type="text" placeholder="Email *" />
    
  		<input class="required" name="phone" type="text" placeholder="Phone *" />

  		<input class="required" name="zip" type="text" placeholder="ZIP *" />
  		
  		<div class="sentinel-required-notice">*Required</div>
  		
    </div>
		<div style="clear:both;height:10px;"></div>
		
		<label><strong>State &amp; Congressional District</strong></label>
		<span class="gray">Also note any districts you may not live in but have connections to (optional).</span>
		<textarea name="districts_long" id="districts_long"></textarea><br /><br />

                <input id="activist-recruiter" type="hidden" name="recruiter" value=""/>
                <input type="hidden" name="influence_profile" value="1"/>

	  <a href="#" class="back btn rounded medium-blue-gradient shadow" >Back</a>
    <a href="#" id="submit" class="back btn rounded blue-gradient shadow">Submit</a>

	</fieldset>
</form>
<!-- Load jQuery validation & jQuery UI -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
	function gup(name){
		name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
		var regexS = "[\\?&]"+name+"=([^&#]*)";
		var regex = new RegExp( regexS );
		var results = regex.exec( window.location.href );
		if( results == null ){
			return "";
		} else{
			return results[1];
		}
	}

</script>
<!-- Custom scripts for this page -->
<script type="text/javascript">
	var customMessage = 'Thanks for submitting your Sentinel Influence Profile. Our system logged your response and a staffer was assigned to setup a call with you. Look for an email from us soon.<br/><br/>Now that you are in our system, you can submit action reports for credit towards becoming an official  Sentinel. Ready to start submitting your work? <a href="http://heritageaction.staging.wpengine.com/sentinel/reportaction/">Click here to get started</a>.<br/><br/><a href="http://heritageaction.staging.wpengine.com/sentinel/faq/">Sentinel Frequently Asked Questions</a>.';
	jQuery.fn.reset = function(){
		jQuery(this).each(function(){
			this.reset();
		});
	}
	jQuery(function(jQuery) {
		// Fade the section changes
		jQuery('.continue').click(function(e) {
			var next = jQuery(this).parent().next('fieldset');
			jQuery(this).parent().hide(0, function() {
				window.scrollTo(0, 0);
				next.show(0);
				
			});
			e.preventDefault();
		});
		jQuery('.back').click(function(e) {
			var prev = jQuery(this).parent().prev('fieldset');
			jQuery(this).parent().hide(0, function() {
				window.scrollTo(0, 0);
				prev.show(0);
				
			});
			e.preventDefault();
		});
		// Setup jQuery validation
		jQuery('#sentinel-survey-form').validate({
			rules: {
				activities: 'required',
				list: 'required'
			},
			ignore: '\\[\\]'
		});
		
		// Handle form submission via AJAX
		jQuery("#submit").click(function(e){
		  jQuery("#sentinel-survey-form").submit();
		  e.preventDefault();
		})
		jQuery('#sentinel-survey-form').submit(function(e) {
			var form = jQuery(this);

			if (form.valid()) {
                                form.find('input#submit').attr('disabled', 'disabled').val('Loading...');

				jQuery.post('/proxy.php?action=action_influence_profile',
					jQuery('#sentinel-survey-form').serialize(),
					function(data){
                                                form.find('input#submit').val('Submit').removeAttr('disabled');

						if(data.location){
							window.location.href = data.location;
						} else 
						if(data.error){

							jQuery('#error').text(data.error);
							jQuery('#error').css('display', 'block');
						} else{
							jQuery('#error').css('display', 'none');
						}
						if(data.response){
							if(data.response == 200){
								jQuery('#response').html(customMessage);
							} else{
								jQuery('#response').text(data.response);
							}
							jQuery('#response').css('display', 'block');
							jQuery('#fs-one').css('display', 'none');
							jQuery(form).reset();
							var next = jQuery(form).find('fieldset').eq(0);
							jQuery(form).find('fieldset').eq(3).fadeOut('fast', function() {
								next.fadeIn('fast');
								window.scrollTo(0, 0);
							});
							
						} else{
							jQuery('#response').css('display', 'none');
						}
						
					}, 
					'json'
				);
			
			} else {

				// Find the first element with an error in the form
				var firstError = jQuery('input.error').first();
				// Fade in previous fieldset if first error is on it
				if (!firstError.parent().is('fieldset')) {
					form.find('fieldset:visible').fadeOut('fast', function() {
						firstError.parentsUntil('fieldset').parent().fadeIn('fast');
					});
				}
			}
			e.preventDefault();
			return false;
		});
		if(gup('r')){
			$('#activist-recruiter').val(gup('r'));
		}
	});
</script>