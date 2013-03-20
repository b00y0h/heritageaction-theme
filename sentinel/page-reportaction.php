<style type="text/css">
	label.error {
		color: #ff0000;
		display: block !important;
	}
	#sent-form-container{
	  font-size:18px;
	  font-family:Georgia;
	}
	#sent-form-container a{
	  text-decoration:underline;
	}
	#error {
		background: #ffeeee;
		border: 1px solid #cc0000;
		color: #cc0000;
		display: none;
		font-weight: 500;
		padding: 10px;
	}
	#response a {text-decoration:underline;}
	#response {
		background: #EBF1F3;
		border: 1px solid #2256A2;
		color: #2256A2;
		display: none;
		font-weight: 500;
		padding: 10px;
	}
	
	.report-fields input{
	  margin-right:25px;
	}
	#ar-form-name{
	  width:200px;
	}
	#ar-form-email{
	  width:240px;
	}
	.btn{
	  text-decoration:none !important;
	}

</style>
<script type="text/javascript" charset="utf-8">
  oB.settings.autoplay = false;
  oB.settings.addThis = false;
  oB.settings.contentMaxSize = [0.9, .75];
</script>
<form action="#" id="sentinel-ar-form" method="post" name="sentinel-ar-form">
	
	<div id="sent-form-container">
	  <p>
	    Use this form to report your activities to us. Our team will read what you write and give you points towards becoming a Sentinel. We'll send you an email that lets you know the points you've earned.
    </p>
    <p>
      If you are not on the path to becoming a Sentinel, this form will not work. Get started on the path to becoming a Sentinel now by <a href="/sentinel/influenceprofile/" title="Sign Up for Sentinel: Complete Your Influence Profile">completing your Sentinel Influence Profile</a>.
    </p>
    <p>
      <a href="#sample-report" irel="lightbox" data-ob_share="false" data-ob="lightbox">See an example report here!</a>
    </p>
	  
	  <div id="response">Success</div>
  	<div id="error">Error</div><br>
	<p class="report-fields">
		<input class="required" id="ar-form-name" name="name" placeholder="Full Name*" type="text" />
	
		<input class="email required" id="ar-form-email" name="email" placeholder="Email*" type="text" />
		
		<select class="required" id="category" name="category">
			<option value="">Select a category</option>
			<option value="Local">Local</option>
			<option value="Influence_Congress">Influence Congress</option>
			<option value="Online">Online</option>
			<option value="Media">Media</option>
			<option value="Recruit">Recruit</option>
			<option value="Other">Other</option>
		</select>
	</p>
	
	<p>

		<label >Please only enter one activity at a time to get full credit.</label>
		<textarea class="required" cols="60" id="description" name="description" rows="10" placeholder="Describe the activity." style="height:75px;font-size:14px" maxlength="310"></textarea>
	</p>
	
	  <a id="report-action-button" href="#" class="btn rounded blue-gradient shadow">Send Report</a>
	</div>
</form>


<!-- Custom scripts for this page -->
<script type="text/javascript">
	var customMessage = 'Thanks for your hard work on behalf of conservative values! Your action report was added to your record in system successfully. We will review your submission, assign appropriate credit, and send you a notification email soon.';
	jQuery.fn.reset = function(){
		jQuery(this).each(function(){
			this.reset();
		});
	}
	
	
	
	jQuery('document').ready(function(){
	    
	    if(getCookie('_sentinel_email') != null){
			jQuery('#ar-form-email').val(getCookie('_sentinel_email'));
		}
		if(getCookie('_sentinel_name') != null){
			jQuery('#ar-form-name').val(getCookie('_sentinel_name'));
		}
	
	    jQuery("#report-action-button").click(function(){
		  jQuery('#sentinel-ar-form').submit();
		  return false;
		})
		
		jQuery("a[disable='disabled']").click(function(e){
		  e.preventDefault();
		})
	  
		jQuery('#sentinel-ar-form').unbind();
		jQuery('#sentinel-ar-form').each(function(){
			jQuery(this).unbind();
		});
		jQuery('#sentinel-ar-form').submit(function(e){
			var form = jQuery(this);
		  jQuery('#report-action-button').attr('disabled', 'disabled').html('Loading...');
			jQuery.post("/proxy.php?action=action_report_form",
				jQuery("#sentinel-ar-form").serialize(),
				function(data){
					if(data.location){
						window.location.href = data.location;
					} else if(data.error){
						jQuery('#error').html(data.error);
						jQuery('#error').css('display', 'block');
						jQuery('#report-action-button').removeAttr('disabled').html('Send Report');
					} else{
						jQuery('#error').css('display', 'none');
						//jQuery("#sentinel-ar-form").reset();
					}
					if(data.response){
						if(data.response == 200){
							jQuery('#response').text(customMessage);
							setCookie('_sentinel_name',jQuery('#ar-form-name').val(), 365*20);
							setCookie('_sentinel_email',jQuery('#ar-form-email').val(), 365*20);
						} else{
							jQuery('#response').text(data.response);
						}
						jQuery('#response').css('display', 'block');
						jQuery('#description').val('');
						jQuery('#category').val('');
						jQuery('#report-action-button').removeAttr('disabled').html('Send Report');
						//jQuery('#sent-form-container').css('display', 'none');
						//jQuery('#sent-instructions').css('display', 'none');
					} else{
						jQuery('#response').css('display', 'none');
					}
					// custom updates
				}, 
				'json'
			);
			e.preventDefault();
			return false;
		});
	});
</script>
<br/>

<div id="sample-report" style="display:none;">
  <h1>Sample Report</h1>
  Here are some examples of action items in each category, as well as sample points assigned. Remember, we look at each unique report you submit and assign you points individually. The more of an impact you have, the more points you will earn.

<br/><br/><strong>Local</strong>
<ul>50-75: Attend skills clinics or other neighborhood events that unify and train local conservatives.<br/>150-250: Attend a Congressional town hall and ask questions, record answers, or live blog/tweet.<br/>100-500: Participate in community canvass project designed to spread awareness of key policy priorities promote accountability.<br/>200: Distribute Heritage Action Scorecards and explain them to people at a Tea Party, 9/12, or GOP meeting.</ul>

<strong>Media</strong>
<ul>50: Write a Letter to the Editor on an issue Congress is debating, and submit it to your local newspaper.<br/>100: Have your Letter to the Editor published.<br/>150: Call in to a radio talk show and discuss why conservatives need to push for a Heritage Action priority.</ul>

<strong>Congress</strong>
<ul>10: Send your Members of Congress an email using Heritage Action’s action alerts.<br/>50: Call a Member of Congress and submit a call report to Heritage Action.<br/>250: Schedule a meeting with your Members of Congress’ local office to discuss important policy.<br/>200-400 points: Organize a district office visit for multiple Sentinels in your area.</ul>

<strong>Recruit</strong>
<ul>Introduce someone you know to the Sentinel program, have them complete the Influence Profile, and then earn a commission bonus of 10% of the points they earn. Use the recruiting page to invite them to become Sentinels. (Page coming soon.)</ul>

<strong>Online</strong>
<ul>10: Tweet on a hashtag recommended by Heritage Action.<br/>10: Create and use your Watch List on our Legislative Scorecard.<br/>50: Create a Twitter account, build 10 followers, and Tweet to your Member of Congress.<br/>100: Post a guest blog entry on a local conservative blog that discusses how local Members of Congress need to be held accountable.<br/>50-250: Create a personal email list that is appropriate for grassroots activism and forward Heritage Action email alerts.</ul>

<strong>Other</strong>
<ul>We award Sentinel points for any and all activities that promote conservative accountability for Congress.</ul>
</div>