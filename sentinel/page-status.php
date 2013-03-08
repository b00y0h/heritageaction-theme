<style type="text/css">
  #sentinel-status-checker{
    font-family:Georgia;
    color:#000;

  }
	label.error {
		color: #ff0000;
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
	#response a {text-decoration:underline;}
	#response {
		background: #EBF1F3;
		border: 1px solid #2256A2;
		color: #2256A2;
		display: none;
		font-weight: 500;
		padding: 10px;
	}
	
	#status {
		display: none;
	}
	#status-checker-email{
	  width:400px;
	}
	/* jQuery UI */
	.ui-corner-all {
		border-radius: 4px;
		-moz-border-radius: 4px;
		-o-border-radius: 4px;
		-webkit-border-radius: 4px;
	}
	
	.ui-widget-content {
		background: #eee;
		border: 1px solid #ddd;
	}
	
	.ui-widget-header {
		background: #62B1FA;
		border: 1px solid #62B1FA;
	}
	.ui-progressbar {
		height: 2em;
		overflow: hidden;
		text-align: left;
		width: 50%;
	}
	
	.ui-progressbar .ui-progressbar-value {
		height: 100%;
		margin: -1px;
	}
	
	#check-status-button{
	 font-size:16px; 
	}
	.checker-intro{
	  font-family:Georgia;
    font-size:16px;
    line-height:1.1em;
	}
	.border-top-bottom{
    border-top:1px #c2c2c2 dashed;
    border-bottom:1px #c2c2c2 dashed;
    padding:60px 0;
	}
</style>

<form action="#" id="sentinel-status-checker" method="post" name="sentinel-status-checker">
	
	
	<div class="checker-intro">
  <p>    
    If you have completed your Sentinel Influence Profile, then you are on your way to becoming a Sentinel and in our system. That means you can use this form to check to see how much progress you have made towards becoming a Sentinel.
    
    <br/><br/>
    
    Remember, you need to earn 1000 points in three of the six categories to become a Sentinel.<br/>
    
  </p>

  </div>
  
  <div class="border-top-bottom">

	  <div style="float:right;margin-top:-5px">
		  <a id="check-status-button" href="#" class="btn rounded blue-gradient shadow">Check Status</a>
		</div>
		<input class="email required" id="status-checker-email" name="email" placeholder="Enter your email to check your Sentinel status." type="text" />
	
	
	<div id="response">Success</div>
	<div id="error">Error</div>
	
	</div>
	
	<div id="status">
		<!-- Are you a sentinel? -->
		<div id="sentinel-status"></div>
		You have earned: 
		<span id="actual-points">0</span> of <span id="total-points">n/a</span> points.<br /><br />
		
		Local
		<div id="local-status"></div>
		<span id="local-value"></span><br />
		<span>Go to local meeting. Distribute HA info at local meeting. Host skills clinic.</span><br /><br />
		
		Media
		<div id="media-status"></div>
		<span id="media-value"></span><br />
		<span>Radio show call in. Letter to editor.</span><br /><br />
		
		Influence Congress
		<div id="influence-status"></div>
		<span id="influence-value"></span><br />
		<span>Email MC. Call MC. Meet with local office. Meet with DC office.</span><br /><br />
		
		Recruit
		<div id="recruit-status"></div>
		<span id="recruit-value"></span><br />
		<span>Bring new people to Heritage Action.</span><br /><br />
		
		Online
		<div id="online-status"></div>
		<span id="online-value"></span><br />
		<span>Subscribe. Forward. Build email list. Facebook. Twitter.</span><br /><br />
		
		Other
		<div id="other-status"></div>
		<span id="other-value"></span><br />
		<span>How can you advance conservative accountability? We'll assign points for your work!</span>
	</div>
</form>

<!-- Load jQuery validation & jQuery UI -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
	var urlParams = {};
	(function () {
		var e,
			a = /\+/g,  // Regex for replacing addition symbol with a space
			r = /([^&=]+)=?([^&]*)/g,
			d = function(s){ return decodeURIComponent(s.replace(a, " ")); },
			q = window.location.search.substring(1);

		while (e = r.exec(q)){
		   urlParams[d(e[1])] = d(e[2]);
		}
	})();
</script>
<!-- Custom scripts for this page -->
<script type="text/javascript">
	var customMessage = 'Completed!';
	jQuery('document').ready(function(){
		// Translation
		var categorys = {
			'local':'#local-',
			'Influence_Congress':'#influence-',
			'Online':'#online-',
			'Media':'#media-',
			'Recruit':'#recruit-',
			'Other':'#other-'
		}
		// Add jQuery validation
		jQuery('#sentinel-status-checker').validate();
		jQuery("#check-status-button").click(function(){
		  jQuery('#sentinel-status-checker').submit();
		  return false;
		})
		// Handle form submission via AJAX
		jQuery('#sentinel-status-checker').submit(function(e) {
			var form = jQuery(this);
			if (form.valid()) {
				jQuery.post('/proxy.php?action=sentinel_status_checker',
					jQuery('#sentinel-status-checker').serialize(),
					function(data){
						if(data.error){
							jQuery('#error').text(data.error);
							jQuery('#error').css('display', 'block');
						} else{
							jQuery('#error').css('display', 'none');
						}
						if(data.response){
							if(data.response == 200){
								jQuery('#response').text(customMessage);
							} else{
								jQuery('#response').text(data.response);
							}
							jQuery('#response').css('display', 'block');
						} else{
							jQuery('#response').css('display', 'none');
						}
						if(data.points){
							console.log("points: ");
							var sum = 0;
							jQuery.each(data.points, function(key, val){
								sum = sum + parseInt(val);
								var percent = (val/10);
								jQuery(categorys[key] + 'status').progressbar({value: percent});
								jQuery(categorys[key] + 'value').html((percent>100? 100:percent) + '%');
							});
							sentPercent = (sum / 3000)*100;
							//jQuery('#sentinel-status').progressbar({value: sentPercent});
							jQuery('#sentinel-status').html(data.sentinel);
							jQuery('#actual-points').html(sum);
							jQuery('#total-points').html('3000');
							jQuery('#status').css('display', 'block');
						}
					}, 
					'json'
				);
			}
			e.stopPropagation();
			e.preventDefault();
			return false;
		});
		if(urlParams["email"]){
			$('#status-checker-email').val(urlParams["email"]);
			$('#sentinel-status-checker').submit();
		}
	});
</script>

<br/>
<div class="checker-intro">
<p style="font-style:italic">We look at all action reports that you send us, and Sentinel points are awarded on a case by case basis--strong work earns more points. As we work to encourage accountability for Washington, these points are a way to acknowledge the conservatives that are doing the hard work of accountability every day. So if you have questions about earning more points, please give us a <a href="/sentinel/contact/" title="Sentinel: Ask Us Your Questions">call or send us an email</a>.</p>
</div>