<style type="text/css"><!--
	.container {
width: 500px;
}
.canned-content {
border: 1px dashed navy;
padding: 0px 9px;
background-color: LightSteelBlue;
width: 500px;
}
.container input[type='text'] {
width: 520px;
}
.container input[type='submit'] {
float: none;
display: block;
margin: 10px auto;
}
.container textarea {
width: 520px;
height: 100px;
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
--></style>
<div id="response">Success</div>
<div id="error">Error</div>
<div class="container">

Recruiting your friends is easy, and you earn a 10% commission on the Sentinel points
they earn. Help us spread the word about conservative accountability for Congress!

Using the form below, enter your friend’s name and email address, a personal invitation
from you, and your name and email. Our system will send them a customized invitation
to fill out the Sentinel Influence Profile.

<form id="sentinel-recruit" action="#" method="post" name="sentinel-recruit"><label></label>

<input class="required" type="text" id="recruiter_name" name="recruiter_name" placeholder="Your Name*" value="" />

<label></label>

<input class="email required" type="text" id="recruiter_email" name="recruiter_email" placeholder="Your Email*" value="" />

<label>Your message to your friend:</label>

<textarea name="recruiter_msg"></textarea>
<h4>This message appears in all invitation emails, below your custom message:</h4>
<div class="canned-content">

Becoming a Sentinel means that you agree to do the hard work of conservative
accountability for Congress. We commit to helping you make a difference for our shared
conservative values. Complete the Sentinel Influence Profile now to get started.

Your friend will earn credit for recruiting you, so get started now.

</div>
<label></label>

<input class="required clear-after" type="text" name="recruit_name" placeholder="Friend's Name" value="" />

<label></label>

<input class="email required clear-after" type="text"  name="recruit_email" placeholder="Friend's Email" value="" />

<p align="center">
  <a href="#" id="invite" class="btn rounded blue-gradient shadow">Send Your Recruiting Invitation</a>
</p>


</form></div>
<!-- Load jQuery validation & jQuery UI -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script><script type="text/javascript">// <![CDATA[
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
// ]]></script>
<!-- Custom scripts for this page -->
<script type="text/javascript">// <![CDATA[
	var customMessage = 'Your invitation was sent.';
	jQuery('document').ready(function(){
		// Add jQuery validation
		jQuery('#sentinel-recruit').validate();

		
		if(getCookie('_sentinel_email') != null){
			jQuery('#recruiter_email').val(getCookie('_sentinel_email'));
		}
		if(getCookie('_sentinel_name') != null){
			jQuery('#recruiter_name').val(getCookie('_sentinel_name'));
		}
		
		jQuery("#invite").click(function(e){
			jQuery('#sentinel-recruit').submit();
			e.preventDefault();
      	})
		
// Handle form submission via AJAX
jQuery('#sentinel-recruit').submit(function(e) {
var form = jQuery(this);
if (form.valid()) {
jQuery("#invite").html("Loading...").attr("disabled", "disabled");
jQuery.post('/proxy.php?action=sentinel_recruit',
jQuery('#sentinel-recruit').serialize(),
function(data){
jQuery("#invite").html("Send Your Recruiting Invitation").removeAttr("disabled");
if(data.error){
jQuery('#error').text(data.error);
jQuery('#error').css('display', 'block');
} else{
jQuery('#error').css('display', 'none');
}
if(data.response){
jQuery(".clear-after").val("");
if(data.response == 200){
	jQuery('#response').text(customMessage);
	setCookie('_sentinel_name',jQuery('#recruiter_name').val(), 365*20);
	setCookie('_sentinel_email',jQuery('#recruiter_email').val(), 365*20);
} else{
jQuery('#response').text(data.response);
}
jQuery('#response').css('display', 'block');
} else{
jQuery('#response').css('display', 'none');
}
					}, 
					'json'
				);
			}
			e.stopPropagation();
			e.preventDefault();
			return false;
		});
	});
// ]]></script>

