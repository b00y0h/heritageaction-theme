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
	    <strong>Your work makes you a Sentinel.</strong> Use this form to share your action. Our team reads your report and assigns the points that qualify you to be a Sentinel.      
    </p>
    <p>
      <strong>Your intel helps us fight.</strong> When we know what your Members of Congress and their staff say in your district, our Government Relations team takes the word straight to Capitol Hill to hold them accountable. Doing this in real time impacts Congress.
    </p>
    <p>
      Coordinating with you on the ground ensures that your voice is heard on Capitol Hill through our team. What did the Member or their staff tell you that our Legislative Strategist staff should know about?      
    </p>
    <p>
      <a href="#sample-report" irel="lightbox" data-ob_share="false" data-ob="lightbox">See example reports here.</a>
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
  
  <p>We look at each report you submit and assign points individually.</p>

  <p>The more of an impact you have and the more intel you give, the more points you earn.</p>

  <p><strong>Congress</strong><br>
  Call your Member of Congress’s office, ask for the staffer on that issue, and push conservative policy priorities and submit an intel report to Heritage Action. <em>50 points</em>.</p>

  <p>Example of a solid intel report after the call:<br>
  “When I called into my Senators D.C. office, the Legislative Assistant who handles 2nd Amendment issues said that they are unsure of how the Senator will be voting on the Toomey-Schumer-Manchin gun bill.”</p>

  <p>Organize a visit to the district office visit for multiple Sentinels in your area. <em>200 points</em>.</p>

  <p><strong>Local</strong><br>
  Attend a Congressional town hall, ask a question, record video, or live tweet. <em>200 points</em>.</p>

  <p>Example of a solid intel report after the Townhall:<br>
  “Before my Representative hosted a Townhall, I looked on Heritage Actions’ scorecard about his vote on raising the debt ceiling last year. At the Townhall I asked them why he voted for raising the debt ceiling without putting us on a path to balance in 10 years. He then told me that he did not want to risk the full faith and credit of the United States and he is going to fight on the Continuing Resolution, where they can get spending cuts.”</p>

  <p>Distribute Heritage Action Scorecards at a local political meeting. <em>100 points</em>.</p>

  <p>Attend or host a Skills Clinic or neighborhood event to pull local conservatives together. <em>50-250 points</em>.<br>
  Participate in a community canvassing project to spread awareness of key policy priorities and promote accountability. <em>100-500 points</em>.</p>

  <p><strong>Media</strong><br>
  Write a Letter to the Editor on an issue Congress is debating, and submit it to your local newspaper and have it published. <em>50-150 points</em>.<br>
  Call in to a radio talk show and discuss why Congress must pass a critical policy. <em>100 points</em>.</p>

  <p><strong>Recruit</strong><br>
  Each recruit that completed the Influence Profile after you invitation earns you 25 points. You’ll also earn 10% of their points as they progress in the Sentinel Program.</p>

  <p>
    <strong>Online</strong><br>
    Create a Twitter account, build 10 followers, and Tweet to your Member of Congress. <em>50 points</em>.<br>
    Post a guest blog entry on a local conservative blog that discusses what Congress needs to be held accountable on. <em>100 points</em>.<br>
    Invite 10 activists in your Member of Congress’s district and your Representative to participate in a twitter Townhall by tweeting questions @ them and using the hashtag #Ask[Last Name]. <em>150 points per participant</em>.</p>

  <p><strong>Other</strong><br>
  Participate in Sentinel Strategy Call on Monday evenings. <em>5 points</em>.</p>
  

</div>