<?php
if (!defined('ABSPATH')) die('No direct access allowed');

function aws_loadmore_ajax_handler(){

    $page_template = $_POST['page_template'];

	// prepare our arguments for the query
    //$args = json_decode( stripslashes( $_POST['query'] ), true );
    $args = unserialize( stripslashes( $_POST['query'] ));
    
    
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
 
    //$post_type = $_POST['post_type'];

    // it is always better to use WP_Query but not here
    query_posts( $args );
 
    if( have_posts() ) :        
		// run the loop
        while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
//			get_template_part( 'template-parts/content', get_post_format() );
            if ($page_template == 'page-case-study.php'):
                $cnt = 999;
                include(locate_template('template-parts/content-page-case-study.php'));	
            elseif ($page_template == 'page-testimonial.php'):
                $cnt = 999;
                include(locate_template('template-parts/content-page-testimonial.php'));                
            elseif (is_home() || is_search()):
                include(locate_template('template-parts/content-page-blog.php'));
            endif;
            
        endwhile;
        

		aws_paginator( $_POST['first_page'] );
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
} 
add_action('wp_ajax_loadmore', 'aws_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'aws_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function aws_paginator( $first_page_url ){
 
	// the function works only with $wp_query that's why we must use query_posts() instead of WP_Query()
	global $wp_query;
 
	// remove the trailing slash if necessary
	$first_page_url = untrailingslashit( $first_page_url );
 
    $view_more_text = "Load more";

  
    /*if (is_home() || is_category() ) :
        $view_more_text = "View more posts +";
    elseif (is_product_category()):
            $view_more_text = "View more products +";
    
    elseif (is_search()):
        $view_more_text = "View more results +";
    endif;*/

	// it is time to separate our URL from search query
	$first_page_url_exploded = array(); // set it to empty array
	$first_page_url_exploded = explode("/?", $first_page_url);
	// by default a search query is empty
	$search_query = '';
	// if the second array element exists
	if( isset( $first_page_url_exploded[1] ) ) {
		$search_query = "/?" . $first_page_url_exploded[1];
		$first_page_url = $first_page_url_exploded[0];
	}
 
	// get parameters from $wp_query object
	// how much posts to display per page (DO NOT SET CUSTOM VALUE HERE!!!)
	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	// current page
	$current_page = (int) $wp_query->query_vars['paged'];
	// the overall amount of pages
	$max_page = $wp_query->max_num_pages;
 
	// we don't have to display pagination or load more button in this case
	if( $max_page <= 1 ) return;
 
	// set the current page to 1 if not exists
	if( empty( $current_page ) || $current_page == 0) $current_page = 1;
 
	// you can play with this parameter - how much links to display in pagination
	$links_in_the_middle = 4;
	$links_in_the_middle_minus_1 = $links_in_the_middle-1;
 
	// the code below is required to display the pagination properly for large amount of pages
	// I mean 1 ... 10, 12, 13 .. 100
	// $first_link_in_the_middle is 10
	// $last_link_in_the_middle is 13
	$first_link_in_the_middle = $current_page - floor( $links_in_the_middle_minus_1/2 );
	$last_link_in_the_middle = $current_page + ceil( $links_in_the_middle_minus_1/2 );
 
	// some calculations with $first_link_in_the_middle and $last_link_in_the_middle
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;
	if( ( $last_link_in_the_middle - $first_link_in_the_middle ) != $links_in_the_middle_minus_1 ) { $last_link_in_the_middle = $first_link_in_the_middle + $links_in_the_middle_minus_1; }
	if( $last_link_in_the_middle > $max_page ) { $first_link_in_the_middle = $max_page - $links_in_the_middle_minus_1; $last_link_in_the_middle = (int) $max_page; }
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;
 
 	// begin to generate HTML of the pagination
    
     $pagination = '';

	// haha, this is our load more posts link
	if( $current_page < $max_page ) :	//$pagination = '<div class="pagination-wrapper padding-left">';
        $pagination = '<div class="loadmore-wrapper"><div id="aws_loadmore"><button class="wireframe">'.$view_more_text.'</button></div></div>';	
    endif;
	
	$pagination .= '<nav id="aws_pagination" class="navigation pagination" role="navigation"><div class="nav-links">';
 
 
	// arrow left (previous page)
    if ($current_page != 1)
    
        if (($current_page - 1) == 1):
            $new_page_no = '/';
        else:
            $new_page_no = '/page/'.($current_page - 1).'/';
        endif;

		$pagination.= '<a href="'. $first_page_url . ($new_page_no) . $search_query . '" class="prev page-numbers"><</a>';


	// when to display "..." and the first page before it
	if ($first_link_in_the_middle >= 3 && $links_in_the_middle < $max_page) {
		$pagination.= '<a href="'. $first_page_url .  $search_query . '" class="page-numbers">1</a>';
 
		if( $first_link_in_the_middle != 2 )
			$pagination .= '<span class="page-numbers extend">...</span>';
 
	}
 
	// loop page links in the middle between "..." and "..."
	for($i = $first_link_in_the_middle; $i <= $last_link_in_the_middle; $i++) {
		if($i == $current_page) {
			$pagination.= '<span class="page-numbers current">'.$i.'</span>';
		} else {

            if ($i == 1):
                $new_page_no = '/';
            else:
                $new_page_no = '/page/'.$i.'/';
            endif;

			$pagination .= '<a href="'. $first_page_url . $new_page_no .  $search_query .'" class="page-numbers">'.$i.'</a>';
		}
	}

    	// when to display "..." and the last page after it
	if ( $last_link_in_the_middle < $max_page ) {
 
		if( $last_link_in_the_middle != ($max_page-1) )
			$pagination .= '<span class="page-numbers extend">...</span>';
 
		$pagination .= '<a href="'. $first_page_url . '/page/' . $max_page . '/' . $search_query .'" class="page-numbers">'. $max_page .'</a>';
	}

	// arrow right (next page)
	if ($current_page != $last_link_in_the_middle )
		$pagination.= '<a href="'. $first_page_url . '/page/' . ($current_page+1) . '/' . $search_query .'" class="next page-numbers">></a>';
 

 
	// end HTML
	$pagination.= "</div></nav>\n";
	//$pagination.= "</div>\n";
 
	// replace first page before printing it
	echo str_replace(array("/page/1?", "/page/1\""), array("?", "\""), $pagination);
}