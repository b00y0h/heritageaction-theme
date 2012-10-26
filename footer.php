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

</div><!-- #hs-container .hs-container -->

<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5004756-2']);
  _gaq.push(['_setDomainName', 'ha.andrefredette.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php wp_footer(); ?>
</body>
</html>