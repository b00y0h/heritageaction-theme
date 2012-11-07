<?php
/**
 * Heritage Action Theme Options
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

/**
 * Register the form setting for our heritageaction_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, heritageaction_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_theme_options_init() {
	register_setting(
		'heritageaction_options', // Options group, see settings_fields() call in heritageaction_theme_options_render_page()
		'heritageaction_theme_options', // Database option, see heritageaction_get_theme_options()
		'heritageaction_theme_options_validate' // The sanitization callback, see heritageaction_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see heritageaction_theme_options_add_page()
	);

	// Register our individual settings fields
	add_settings_field(
		'enable_video_checkbox', // Unique identifier for the field for this section
		__( 'Video Enable', 'heritageaction' ), // Setting field label
		'heritageaction_settings_field_enable_video_checkbox_checkbox', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see heritageaction_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);

    // add_settings_field( 'sample_text_input', __( 'Sample Text Input', 'heritageaction' ), 'heritageaction_settings_field_sample_text_input', 'theme_options', 'general' );
    add_settings_field( 'video_url', __( 'Video Url', 'heritageaction' ), 'heritageaction_settings_field_video_url_input', 'theme_options', 'general' );
    add_settings_field( 'video_title', __( 'Video Title', 'heritageaction' ), 'heritageaction_settings_field_video_title_input', 'theme_options', 'general' );
	// add_settings_field( 'sample_select_options', __( 'Sample Select Options', 'heritageaction' ), 'heritageaction_settings_field_sample_select_options', 'theme_options', 'general' );
	// add_settings_field( 'sample_radio_buttons', __( 'Sample Radio Buttons', 'heritageaction' ), 'heritageaction_settings_field_sample_radio_buttons', 'theme_options', 'general' );
	add_settings_field( 'video_description', __( 'Description of video', 'heritageaction' ), 'heritageaction_settings_field_video_description', 'theme_options', 'general' );
    add_settings_field( 'video_link_to', __( 'Link to?', 'heritageaction' ), 'heritageaction_settings_field_video_link_to', 'theme_options', 'general' );
}
add_action( 'admin_init', 'heritageaction_theme_options_init' );

/**
 * Change the capability required to save the 'heritageaction_options' options group.
 *
 * @see heritageaction_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see heritageaction_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function heritageaction_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_heritageaction_options', 'heritageaction_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'heritageaction' ),   // Name of page
		__( 'Theme Options', 'heritageaction' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'heritageaction_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'heritageaction_theme_options_add_page' );

/**
 * Returns an array of sample select options registered for Heritage Action.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_sample_select_options() {
	$sample_select_options = array(
		'0' => array(
			'value' =>	'0',
			'label' => __( 'Zero', 'heritageaction' )
		),
		'1' => array(
			'value' =>	'1',
			'label' => __( 'One', 'heritageaction' )
		),
		'2' => array(
			'value' => '2',
			'label' => __( 'Two', 'heritageaction' )
		),
		'3' => array(
			'value' => '3',
			'label' => __( 'Three', 'heritageaction' )
		),
		'4' => array(
			'value' => '4',
			'label' => __( 'Four', 'heritageaction' )
		),
		'5' => array(
			'value' => '5',
			'label' => __( 'Five', 'heritageaction' )
		)
	);

	return apply_filters( 'heritageaction_sample_select_options', $sample_select_options );
}

/**
 * Returns an array of sample radio options registered for Heritage Action.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_sample_radio_buttons() {
	$sample_radio_buttons = array(
		'yes' => array(
			'value' => 'yes',
			'label' => __( 'Yes', 'heritageaction' )
		),
		'no' => array(
			'value' => 'no',
			'label' => __( 'No', 'heritageaction' )
		),
		'maybe' => array(
			'value' => 'maybe',
			'label' => __( 'Maybe', 'heritageaction' )
		)
	);

	return apply_filters( 'heritageaction_sample_radio_buttons', $sample_radio_buttons );
}

/**
 * Returns the options array for Heritage Action.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_get_theme_options() {
	$saved = (array) get_option( 'heritageaction_theme_options' );
	$defaults = array(
        'enable_video_checkbox' => '',
		'video_url'       => '',
		'video_title'     => '',
		'video_link_to' => '',
		'video_description'  => '',
	);

	$defaults = apply_filters( 'heritageaction_default_theme_options', $defaults );

	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );

	return $options;
}

/**
 * Renders the sample checkbox setting field.
 */
function heritageaction_settings_field_enable_video_checkbox_checkbox() {
	$options = heritageaction_get_theme_options();
	?>
	<label for="sample-checkbox">
		<input type="checkbox" name="heritageaction_theme_options[enable_video_checkbox]" id="enable-video-checkbox" <?php checked( 'on', $options['enable_video_checkbox'] ); ?> />
		<?php _e( 'Click to enable video overlay', 'heritageaction' ); ?>
	</label>
	<?php
}

/**
 * Renders the video url text input setting field.
 */
function heritageaction_settings_field_video_url_input() {
	$options = heritageaction_get_theme_options();
	?>
	<input type="text" name="heritageaction_theme_options[video_url]" id="video-url" value="<?php echo esc_attr( $options['video_url'] ); ?>" />
	<label class="description" for="video-url"><?php _e( '(youtuve, vimeo, etc)', 'heritageaction' ); ?></label>
	<?php
}

/**
 * Renders the video title text input setting field.
 */
function heritageaction_settings_field_video_title_input() {
    $options = heritageaction_get_theme_options();
    ?>
    <input type="text" name="heritageaction_theme_options[video_title]" id="video-title" value="<?php echo esc_attr( $options['video_title'] ); ?>" />
    <?php
}

/**
 * Renders the video title link to input setting field.
 */
function heritageaction_settings_field_video_link_to() {
    $options = heritageaction_get_theme_options();
    ?>
    <input type="text" name="heritageaction_theme_options[video_link_to]" id="video-link-to" value="<?php echo esc_attr( $options['video_link_to'] ); ?>" />
    <label class="description" for="video-link-to"><?php _e( 'Where do you want this page to link to?', 'heritageaction' ); ?></label>
    <?php
}



/**
 * Renders the sample select options setting field.
 */
function heritageaction_settings_field_sample_select_options() {
	$options = heritageaction_get_theme_options();
	?>
	<select name="heritageaction_theme_options[sample_select_options]" id="sample-select-options">
		<?php
			$selected = $options['sample_select_options'];
			$p = '';
			$r = '';

			foreach ( heritageaction_sample_select_options() as $option ) {
				$label = $option['label'];
				if ( $selected == $option['value'] ) // Make default first in list
					$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
				else
					$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
			}
			echo $p . $r;
		?>
	</select>
	<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', 'heritageaction' ); ?></label>
	<?php
}

/**
 * Renders the radio options setting field.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_settings_field_sample_radio_buttons() {
	$options = heritageaction_get_theme_options();

	foreach ( heritageaction_sample_radio_buttons() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="heritageaction_theme_options[sample_radio_buttons]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['sample_radio_buttons'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	}
}

/**
 * Renders the sample textarea setting field.
 */
function heritageaction_settings_field_video_description() {
	$options = heritageaction_get_theme_options();
	?>
	<textarea class="large-text" type="text" name="heritageaction_theme_options[video_description]" id="video-description" cols="50" rows="5" /><?php echo esc_textarea( $options['video_description'] ); ?></textarea>
	<?php
}

/**
 * Renders the Theme Options administration screen.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'heritageaction' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'heritageaction_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see heritageaction_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_theme_options_validate( $input ) {
	$output = array();

	// Checkboxes will only be present if checked.
	if ( isset( $input['enable_video_checkbox'] ) )
		$output['enable_video_checkbox'] = 'on';

	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['video_url'] ) && ! empty( $input['video_url'] ) )
		$output['video_url'] = wp_filter_nohtml_kses( $input['video_url'] );

    if ( isset( $input['video_title'] ) && ! empty( $input['video_title'] ) )
        $output['video_title'] = wp_filter_nohtml_kses( $input['video_title'] );

    if ( isset( $input['video_link_to'] ) && ! empty( $input['video_link_to'] ) )
        $output['video_link_to'] = wp_filter_nohtml_kses( $input['video_link_to'] );

	// The sample select option must actually be in the array of select options
	if ( isset( $input['sample_select_options'] ) && array_key_exists( $input['sample_select_options'], heritageaction_sample_select_options() ) )
		$output['sample_select_options'] = $input['sample_select_options'];

	// The sample radio button value must be in our array of radio button values
	if ( isset( $input['sample_radio_buttons'] ) && array_key_exists( $input['sample_radio_buttons'], heritageaction_sample_radio_buttons() ) )
		$output['sample_radio_buttons'] = $input['sample_radio_buttons'];

	// The sample textarea must be safe text with the allowed tags for posts
	if ( isset( $input['video_description'] ) && ! empty( $input['video_description'] ) )
		$output['video_description'] = wp_filter_post_kses( $input['video_description'] );

	return apply_filters( 'heritageaction_theme_options_validate', $output, $input );
}
