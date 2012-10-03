<?php
/**
 * The template for displaying search forms in Heritage Action
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>
	  <form id="searchform" action=";/index.php" method="get" onsubmit="location.href='/search/' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'heritageaction' ); ?></label>
		<input type="text" class="field search-input" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'heritageaction' ); ?>" />
		<div id="search-btn" class="go gradient blue-gradient"><div class="arrow-right"></div></div> 
    
	</form>
