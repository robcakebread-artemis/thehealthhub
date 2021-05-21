<?php
if (!defined('ABSPATH')) die('No direct access allowed');

function custom_wpseo_breadcrumb_output( $output ){

    global $wp_query;
    global $post;

    $caret = ' > ';

    if ( is_singular('casestudy') ) :
        // start of breadcrumbs always the same
        $output = '<span><a href="/">Home</a>';
        $output .= $caret;
        $output .= '<span><a href="/case-studies/">Case Studies</a>';
        $output .= $caret;
        $output .= '<span class="breadcrumb_last">'.$post->post_title.'</span>';            
        $output .= '</span>';
        $output .= '</span>';            
    endif;

    return $output;
}
add_filter( 'wpseo_breadcrumb_output', 'custom_wpseo_breadcrumb_output' );