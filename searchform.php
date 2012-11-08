<?php
/**
 * The template for displaying search forms in Heritage Action
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'heritageaction' ); ?></label>
		<input type="text" class="field search-input" name="s" value="" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'heritageaction' ); ?>" />
		<div id="search-btn" class="btn rounded gradient blue-gradient">Search</div>
	</form>
