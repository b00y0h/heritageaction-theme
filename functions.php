<?php
/**
 * Heritage Action functions and definitions
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

/**
* Bootstrap the Theme Options Framework
*/
// if( file_exists(get_template_directory().'/options/options.php') )
//   include_once(get_template_directory().'/options/options.php');

/**
* Set up General Options
*/
// if( file_exists(get_template_directory().'/theme-options.php') )
//   include_once(get_template_directory().'/theme-options.php');

// require_once ( get_template_directory() . '/theme-options.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Heritage Action 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'heritageaction_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Heritage Action 1.0
 */
function heritageaction_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Heritage Action, use a find and replace
	 * to change 'heritageaction' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'heritageaction', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'heritageaction' ),
		'footer' => __( 'Footer Menu', 'heritageaction' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );

	// remove html tags
	add_filter('comment_form_defaults','comments_form_defaults');
}
endif; // heritageaction_setup
add_action( 'after_setup_theme', 'heritageaction_setup' );


// remove html tags
function comments_form_defaults($default) {
	unset($default['comment_notes_after']);
	return $default;
}


//add_filter( 'body_class', 'my_neat_body_class');
function my_neat_body_class( $classes ) {
      $classes[] = 'responsive-help';
     return $classes;
}


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Heritage Action 1.0
 */
function heritageaction_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Blog Sidebar/Header', 'heritageaction' ),
    'id' => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'heritageaction_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function heritageaction_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'orangebox', get_template_directory_uri() ."/orangebox.css" );
	//wp_enqueue_style( 'bxstyles', get_template_directory_uri() ."/bx_styles.css" );

	wp_enqueue_script( 'application', get_template_directory_uri() . '/js/application-ck.js', array( 'jquery' ), '20120928', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'jquery-effects-custom', get_template_directory_uri() . '/js/jquery-ui-1.8.24.custom.min.js', array( 'jquery' ), '20121002', true );
	wp_enqueue_script( 'orangebox', get_template_directory_uri() . '/js/orangebox.min.js', array( 'jquery' ), '20121004');
	wp_enqueue_script( 'tinycarousel', get_template_directory_uri() . '/js/jquery.tinycarousel.js', array( 'jquery' ), '20121004', true );


}
add_action( 'wp_enqueue_scripts', 'heritageaction_scripts' );



// [amount] shortcode
// Returns numerical contents of variable "amt" from a querystring
// e.g. returns "75" when url contains ?amt=75
function amount_shortcode( $atts ){
  if (isset($_GET['amt']) && trim($_GET['amt']) != '') { // Variable exists
  	$amt = str_replace($RemoveText,'',trim($_GET['amt']));
  	if (!is_numeric($amt)) { // If not numeric, just set to 0.
  		$amt = 0;
  	}
		else {
  		$amt = number_format($amt,2,'.','');
  	}
  }
	else {
  	$amt = 0;
  }

  return $amt;
}
add_shortcode( 'amount', 'amount_shortcode' );

function gf_count( $attrs ){
  $output = '';
  if(class_exists('RGFormsModel')){
    $summary = RGFormsModel::get_form_counts($attrs['formid']);
    if($summary){
      $output = number_format($summary['total']+2);
    }
  }
  return $output;
}
add_shortcode( 'gf_count', 'gf_count');

function post_key_vote_meta_box( $post ) {
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'key_vote_nonce' );
    $key_vote_type = get_post_meta($post->ID,'key_vote_type',true);
    ?>

  <select id="key_vote_type" name="key_vote_type">
    <option  value="">Co Sponsorship</option>
    <option <?php echo ($key_vote_type == 'yes') ? 'selected="selected"' : '';  ?> value="yes">Yes</option>
    <option <?php echo ($key_vote_type == 'no') ? 'selected="selected"' : '';  ?> value="no">No</option>
  </select>
<?php ?>
<?php
}
add_action('add_meta_boxes','add_key_vote_metabox');
function add_key_vote_metabox() {
    add_meta_box('key_vote_type_meta', __('Key Vote Recommendation'), 'post_key_vote_meta_box', 'key-votes', 'side', 'high');
}
add_action( 'save_post', 'ha_save_key_vote_type' );
function ha_save_key_vote_type( $post_id ) {
  $post = get_post($post_id);

  if($post->post_type == 'key-votes'){
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if (isset($_POST['key_vote_nonce']) && !wp_verify_nonce( $_POST['key_vote_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // Check permissions
    if ( 'page' == $_POST['post_type'] )
    {
      if ( !current_user_can( 'edit_page', $post_id ) )
          return;
    }
    else
    {
      if ( !current_user_can( 'edit_post', $post_id ) )
          return;
    }

    update_post_meta($post_id, 'key_vote_type', $_POST['key_vote_type']);
  }

}

// ==========================================================================
// = Rewrite rule for pretty permalinks for search http://d.com/search/term =
// ==========================================================================


function search_url_rewrite_rule() {
    if (is_search() && !empty($_GET['s'])) {
        if(isset($_GET['search_post_type']) && $_GET['search_post_type'] == 'post'){
          wp_redirect(home_url("/search-blog/") . urlencode(get_query_var('s')) );
        }
        else{
          wp_redirect(home_url("/search/") . urlencode(get_query_var('s')) );
        }

        exit();
    }
}
add_action('template_redirect', 'search_url_rewrite_rule');

add_action( 'init', 'search_rule' );
function search_rule(){
      add_rewrite_rule('^search-blog/([^/]*)?', 'index.php?s=$matches[1]&post_type=post', 'top');
      add_rewrite_rule('^search/([^/]*)?', 'index.php?s=$matches[1]', 'top');

}

/**
* Simple WordPress Twitter feed
*
*
* @param string $user user of twitter feed to retrieve.
* @param string $count number of tweets to retrive.
*
* Inspiration for code:
* Chip Bennet's oenology theme https://github.com/chipbennett/oenology
* catswhocode http://www.catswhocode.com/blog/snippets/grab-tweets-from-twitter-feed
* http://clark-technet.com/2012/04/simple-wordpress-twitter-feed-code-snippet
* @return string of formatted API data
*/

function twitter_feed($user = 'twitter', $count = '3'){
    $i = 1;
    //cache request
    $transient_key = $user . "_twitter";

    // If cached (transient) data are used, output an HTML
    // comment indicating such
    $cached = get_transient( $transient_key );

    if ( false !== $cached ) {
    return $cached .= "\n" . '<!--Returned from transient cache.-->';
    }

    // Build Twitter api url
    $apiurl = "http://api.twitter.com/1/statuses/user_timeline/{$user}.json?count={$count}&exclude_replies=true";

    // Request the API data, using the constructed URL
    $remote = wp_remote_get( esc_url( $apiurl ) );

    // If the API data request results in an error, return
    // an appropriate comment
    if ( is_wp_error( $remote ) ) {
        return '<p>Twitter feed unaviable</p>';
    }

    // If the API returns a server error in response, output
    // an error message indicating the server response.
    if ( '200' != $remote['response']['code'] ) {
        return '<p>Twitter feed responded with an HTTP status code of ' . esc_html( $remote['response']['code'] ) . '.</p>';
    }

    // If the API returns a valid response, the data will be
    // json-encoded; so decode it.
    $data = json_decode( $remote['body'] );

    $output = '';

    while ($i <= $count){
        //Assign feed to $feed
        if(isset($data[$i-1])){
                $feed = $data[($i-1)]->text;
                //Find location of @ in feed
                $feed = str_pad($feed, 3, ' ', STR_PAD_LEFT); //pad feed
                $startat = stripos($feed, '@');
                $numat = substr_count($feed, '@');
                $numhash = substr_count($feed, '#');
                $numhttp = substr_count($feed, 'http');
                $feed = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $feed);
                $feed = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $feed);
                $feed = preg_replace("/@(\w+)/", "<b><a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a></b>", $feed);
                $feed = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $feed);
                $output[$data[($i-1)]->created_at] = ''.
                  "<li>" .
                    "<span class='meta'>" .
                      human_time_diff( strtotime($data[($i-1)]->created_at), current_time('timestamp', 1) ) .
                    "</span>" .
                    '<span class="excerpt">' . $feed . '</span>' .
                  "</li>";
        }
        $i++;
    }

    krsort($output);
    $output = implode("\n", $output);

    set_transient( $transient_key, $output, 600 );

    return $output;
}

function truncateWords($string, $your_desired_width) {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);

  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > $your_desired_width) { break; }
  }

  return implode(array_slice($parts, 0, $last_part));
}


/**
 * Generate the labels for custom post types
 *
 * @param string $singular The singular post type name
 * @param string $plural The plural post type name
 * @return array Array of labels
 */
function reversetype_post_type_labels( $singular, $plural = '' )
{
    if( $plural == '') $plural = $singular .'s';

    return array(
        'name' => _x( $plural, 'post type general name', 'heritageaction' ),
        'singular_name' => _x( $singular, 'post type singular name', 'heritageaction' ),
        'add_new' => __( 'Add New', 'heritageaction' ),
        'add_new_item' => sprintf( __( 'Add New %s', 'heritageaction' ), $singular),
        'edit_item' => sprintf( __( 'Edit %s', 'heritageaction' ), $singular),
        'new_item' => sprintf( __( 'New %s', 'heritageaction' ), $singular),
        'view_item' => sprintf( __( 'View %s', 'heritageaction' ), $singular),
        'search_items' => sprintf( __( 'Search %s', 'heritageaction' ), $plural),
        'not_found' =>  sprintf( __( 'No %s found', 'heritageaction' ), $plural),
        'not_found_in_trash' => sprintf( __( 'No %s found in Trash', 'heritageaction' ), $plural),
        'parent_item_colon' => ''
    );
}


$incdir = get_template_directory() . '/inc/';

/*-----------------------------------------------------------------------------------*/
/*  Open up url in lightbox
/*-----------------------------------------------------------------------------------*/

function youtubeLightbox() {

    $settings = get_option('heritageaction_theme_options');

    $takeover = $settings;

    if($takeover && isset($takeover['video_url']) && !empty($takeover['video_url'])) {

        $takeover_url = $takeover['video_url'];
        $takeover_title = (!empty($takeover['video_title'])) ? $takeover['video_title'] : '';
        $takeover_description = (!empty($takeover['video_description'])) ? $takeover['video_description'] : '';
        $enable_video = isset($takeover['enable_video_checkbox']) ? $takeover['enable_video_checkbox'] : false;
        
        if(!empty($takeover['video_link_to'])) {
            $takeover_link_text = (!empty($takeover['video_link_text'])) ? $takeover['video_link_text'] : 'Take Action';
            $takeover_description .= urlencode("<div align='center'><a href=\"{$takeover['video_link_to']}\" class=\"btn rounded gradient medium-blue-gradient\" style=\"font-size:1.5em;padding:1em;\">$takeover_link_text</a></div>");
        }
    }

    $params = array(
        'enable_video' => @$enable_video,
        'takeover_url' => @$takeover_url,
        'takeover_title' => @$takeover_title,
        'takeover_description' => @$takeover_description
    );

    wp_enqueue_script( 'home', get_template_directory_uri() . '/js/home.js', array( 'jquery' ), '20121108', true );
    wp_localize_script( 'home', 'Video', $params );
}



/*-----------------------------------------------------------------------------------*/
/*	Load Theme Specific Components
/*-----------------------------------------------------------------------------------*/

require_once($incdir .'custom-posttypes.php');

add_action( 'show_user_profile', 'heritageaction_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'heritageaction_show_extra_profile_fields' );

function heritageaction_show_extra_profile_fields( $user ) { ?>

	<h3>Heritage Action profile information</h3>

	<table class="form-table">

	  <tr>
			<th><label for="twitter">Title</label></th>

			<td>
				<input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'title', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your job title.</span>
			</td>
		</tr>


		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username (without the @ symbol).</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'heritageaction_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'heritageaction_save_extra_profile_fields' );

function heritageaction_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'title', $_POST['title'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
}