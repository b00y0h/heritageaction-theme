<?php
/**
 * Template Name: Data
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Heritage Action
 * @since Heritage Action 1.0
 */

$keyvotes = get_posts('post_type=key-votes&numberposts=-1');

echo 'found: ' . count($keyvotes) . " keyvotes<br>\n";

foreach($keyvotes as $keyvote){
  echo get_permalink($keyvote->ID) ."<br>\n";
}