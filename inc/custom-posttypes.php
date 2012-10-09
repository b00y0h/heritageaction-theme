<?php

/*-----------------------------------------------------------------------------------
/*	Add Portfolio Post Type
/*---------------------------------------------------------------------------------*/


function post_type_press_releases() 
{
  $args = array(
    'labels' => reversetype_post_type_labels( __('Press Release', 'heritageaction') ),
    'public' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    // Uncomment the folowing line to change the slug
    //'rewrite' => array( 'slug' => 'press_releases-slug' ), 
    'supports' => array('title','editor','excerpt','custom-fields','revisions','thumbnail','page-attributes')
  );
  
  register_post_type( 'press-releases', $args );
}
add_action( 'init', 'post_type_press_releases', 1 );

function post_type_key_votes() 
{
  $args = array(
    'labels' => reversetype_post_type_labels( __('Key Vote', 'heritageaction') ),
    'public' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 6,
    'taxonomies' => array('chamber'),
    // Uncomment the folowing line to change the slug
    //'rewrite' => array( 'slug' => 'chamber' ), 
    'supports' => array('title','editor','excerpt','custom-fields','revisions','thumbnail','page-attributes')
  );
  
  register_post_type( 'key-votes', $args );
  
  
	// Chamber Category	
		
	$labels = array(
		'add_new_item' => __( 'Add New Chamber' ),
		'all_items' => __( 'All Chambers' ),
		'edit_item' => __( 'Edit Chamber' ), 
		'name' => __( 'Chamber Categories', 'taxonomy general name' ),
		'new_item_name' => __( 'New Chamber Category' ),
		'menu_name' => __( 'Chambers' ),
		'parent_item' => __( 'Parent Chamber' ),
		'parent_item_colon' => __( 'Parent Chamber:' ),
		'singular_name' => __( 'Chamber Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Chambers' ),
		'update_item' => __( 'Update Chamber' ),
	);
	register_taxonomy( 'chamber', 'key-votes', array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
    'rewrite' => array( 'slug' => 'chamber' ),
		'show_ui' => true,
	));
	
  
	
}
add_action( 'init', 'post_type_key_votes', 1 );

// =================================
// = Flush rewrite on theme switch =
// =================================
function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );


  // add_filter('post_link', 'rating_permalink', 10, 3);
  //   add_filter('post_type_link', 'rating_permalink', 10, 3);
  // 
  //   function rating_permalink($permalink, $post_id, $leavename) {
  //    if (strpos($permalink, '%chamber%') === FALSE) return $permalink;
  // 
  //           // Get post
  //           $post = get_post($post_id);
  //           if (!$post) return $permalink;
  // 
  //           // Get taxonomy terms
  //           $terms = wp_get_object_terms($post->ID, 'chamber');  
  //           if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
  //           else $taxonomy_slug = 'not-rated';
  // 
  //    return str_replace('%chamber%', $taxonomy_slug, $permalink);
  //   }
