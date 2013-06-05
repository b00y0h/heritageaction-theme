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

<?php if( isset($_COOKIE['_sentinel_email']) && !empty($_COOKIE['_sentinel_email'])) : ?>
 
 <h2>You have already completed the Influence Profile</h2>
 <p>
   <a href="/sentinel/reportaction">Report your latest work to hold Congress accountable.</a>
 </p>
<?php endif; ?>
<?php
	global $post;
	echo $post->post_content;
?>