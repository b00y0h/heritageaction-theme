<?php
/**
 * Heritage Action functions and definitions
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */


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
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

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
	add_filter('comment_form_defaults','comments_form_defaults');
}
endif; // heritageaction_setup
add_action( 'after_setup_theme', 'heritageaction_setup' );


// remove html tags
function comments_form_defaults($default) {
	unset($default['comment_notes_after']);
	return $default;
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
 * de/Enqueue scripts and styles
 */
function heritageaction_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'jquery.jscrollpane', get_template_directory_uri() . '/css/jquery.jscrollpane.custom.css' );

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
  // get rid of unused scripts for this theme
  wp_deregister_style( 'royalslider-frontend-css');		
  wp_deregister_style( 'royalslider-skin-minimal');		
	wp_deregister_script( 'royalslider-js');
	wp_deregister_script( 'jquery-easing-js');

	wp_enqueue_script( 'application', get_template_directory_uri() . '/js/application.js', array( 'jquery' ), '', true );	
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'jquery-effects-custom', get_template_directory_uri() . '/js/jquery-ui-1.8.24.custom.min.js', array( 'jquery' ), '20121002', true );
	wp_enqueue_script( 'touch-punch', get_template_directory_uri() . '/js/jquery.ui.touch-punch.min.js', array( 'jquery'), '20121127', true );
	
	wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/js/backstretch.js', array( 'jquery'), '20121127', true );
	
  // wp_enqueue_script( 'mwheelIntent', get_template_directory_uri() . '/js/mwheelIntent.js', array( 'jquery' ), '', false ); 
  // wp_enqueue_script( 'history', get_template_directory_uri() . '/js/jquery.history.js', array( 'jquery' ), '', false );  
  // wp_enqueue_script( 'stringLib', get_template_directory_uri() . '/js/core.string.js', array( 'jquery' ), '', false ); 
  // wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '', false );  
  // wp_enqueue_script( 'smartresize', get_template_directory_uri() . '/js/jquery.smartresize.js', array( 'jquery' ), '', false );  
  // wp_enqueue_script( 'application', get_template_directory_uri() . '/js/application.js', array( 'jquery' ), '', false ); 
  // wp_enqueue_script( 'page', get_template_directory_uri() . '/js/jquery.page.js', array( 'jquery' ), '', false );  
	
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
/*	Load Theme Specific Components
/*-----------------------------------------------------------------------------------*/

require_once($incdir .'custom-posttypes.php');
