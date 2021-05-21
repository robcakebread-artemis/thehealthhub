<?php

function aws_loadlightbox_ajax_handler(){
    $putype = sanitize_text_field($_REQUEST['putype']);

    if ($putype == 1 ):
        $id = sanitize_text_field($_REQUEST['id']);
        $class = "small auto";
    elseif ($putype == 2):
        $id = sanitize_text_field($_REQUEST['id']);
    else:
        $id = sanitize_url($_REQUEST['id']);
    endif;

    $srcs = explode(',',sanitize_text_field(($_REQUEST['srcs'])));


    include(locate_template('template-parts/partials/partial-lightbox.php'));

	die; // here we exit the script and even no wp_reset_query() required!
} 
add_action('wp_ajax_loadlightbox', 'aws_loadlightbox_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadlightbox', 'aws_loadlightbox_ajax_handler'); // wp_ajax_nopriv_{action}