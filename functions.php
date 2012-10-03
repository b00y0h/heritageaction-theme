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
}
endif; // heritageaction_setup
add_action( 'after_setup_theme', 'heritageaction_setup' );

add_filter( 'body_class', 'my_neat_body_class');
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

	wp_enqueue_script( 'application', get_template_directory_uri() . '/js/application.js', array( 'jquery' ), '20120928', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'jquery-effects-custom', get_template_directory_uri() . '/js/jquery-ui-1.8.24.custom.min.js', array( 'jquery' ), '20121002', true );
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
  wp_nonce_field( plugin_basename( __FILE__ ), 'key_vote_noncename' );  
    $key_vote_type = get_post_meta($post->ID,'key_vote_type',true);
    ?>
    
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
          $("#taxonomy-category .selectit input[type=checkbox]").change(function(){
            
            if($("#taxonomy-category .selectit:contains('Key Vote') input[type=checkbox]:checked").size() > 1 ||
              ($("#taxonomy-category .selectit:contains('Key Vote') input[type=checkbox]:checked").size() == 1 && 
               $(this).attr('checked') =='checked') 
            ){
              $("#key_vote_type_meta").show();
            }
            else{
              $("#key_vote_type_meta").hide();
            }
            
          })
        })
      })(jQuery);
    </script> 
  
    <style type="text/css" media="screen">
      #key_vote_type_meta{
        <?php if ( in_category(array('key-vote', 'key-vote-recap', 'house-key-votes', 'senate-key-votes')) ) : ?>
        display:block;
        <?php else: ?>
        display:none;
        <?php endif; ?>
      }
    </style>
    
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
    add_meta_box('key_vote_type_meta', __('Key Vote Recommendation'), 'post_key_vote_meta_box', 'post', 'side', 'high');
}
add_action( 'save_post', 'ha_save_key_vote_type' );
function ha_save_key_vote_type( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  if ( !wp_verify_nonce( $_POST['key_vote_noncename'], plugin_basename( __FILE__ ) ) )
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

// ==========================================================================
// = Rewrite rule for pretty permalinks for search http://d.com/search/term =
// ==========================================================================


function search_url_rewrite_rule() {
    if ( is_search() && !empty($_GET['s'])) {
        wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
        exit();
    }   
}
add_action('template_redirect', 'search_url_rewrite_rule');

add_action( 'init', 'search_rule' );
function search_rule(){
    add_rewrite_rule('^search/([^/]*)?', 'index.php?s=$matches[1]', 'top');
}
