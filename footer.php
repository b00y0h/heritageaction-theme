<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	  
	  <div class="inner">
	    
	  <?php if(is_tree('150')) : ?>
	    <div class="verisign" style="float:left;">
  	    <table width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
        <tr>
        <td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.verisign.com/getseal?host_name=heritageaction.com&amp;size=M&amp;use_flash=YES&amp;use_transparent=YES&amp;lang=en"></script><br />
        </td>
        </tr>
        </table>
      </div>
	  <?php endif; ?>
	  
		<div class="heritage-sister-site">
	  	  <a href="http://www.heritage.org" target="_blank">
	  	    Visit our sister site:<br>
	  	    <img src="<?php echo get_bloginfo('template_url'); ?>/img/hfa.png" width="150">
	  	  </a>
	  	</div>
    
	  
		<div class="site-info">
  		<nav class="site-navigation footer-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</nav>
			
			
			<address>
			  214 Massachusetts Avenue NE, Suite 400, Washington, DC 20002 <br>
        &copy; <?php echo date('Y'); ?> Heritage Action for America. All Rights Reserved.
			</address>
			
		</div><!-- .site-info -->
		
		</div>
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16902633-1']);
  _gaq.push(['_setDomainName', 'heritageaction.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1022609756;
var google_conversion_label = "dxY8CNqh9AMQ3JLP5wM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;

<?php if(is_page('donate') || is_tree('150')) : ?>
function gaTriggerIndex(object) {
  _gaq.push(['_trackPageview','memberSubmission.html']);
  var confirmationCode = object.confirmationCode;
  var initialCharge = object.initialCharge.replace(/\,/g, '');
  _gaq.push(['_addTrans', confirmationCode, '', initialCharge.substr(1), '', '', '', '', '']);
  _gaq.push(['_trackTrans']);
}
<?php endif; ?>
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1022609756/?value=0&amp;label=dxY8CNqh9AMQ3JLP5wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<div id="fb-root"></div>
<?php wp_footer(); ?>

</body>
</html>