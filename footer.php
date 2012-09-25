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
		<div class="site-info">
  		<nav class="site-navigation footer-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</nav>
			<address>
			  214 Massachusetts Avenue NE, Suite 400, Washington, DC 20002 <br>
        &copy; <?php echo date('Y'); ?> Heritage Action for America. All Rights Reserved.
			</address>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->


<?php wp_footer(); ?>

</body>
</html>