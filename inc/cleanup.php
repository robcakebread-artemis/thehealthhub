<?php

if (!defined('ABSPATH')) die('No direct access allowed');

/*****************************************************/
/* Add dashboard clutter removal                     */
/*****************************************************/

function remove_dashboard_meta() {
//        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
//        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
//        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
//        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
//        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
//        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);
 
// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
 
// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// remove wordpress version number_format
remove_action( 'wp_head', 'wp_generator' );

// REMOVE WP EMOJI CRAP
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );