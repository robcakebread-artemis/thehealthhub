<?php
if (!defined('ABSPATH')) die('No direct access allowed');

/*****************************************************/
/* Add Duplicate Post Option                  */
/*****************************************************/

function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2);



/*****************************************************/
/* Get Snippet                  */
/*****************************************************/

function aws_snippet($content, $len, $link, $break = '.') {
	
	$len = ($len ? (int)$len : 200);
	
	
	if (strlen($content) > $len): 
		$pos=strpos($content, $break, $len);
	
		//$pos = ( ($pos < $pos2 ) ? $pos : $pos2 );
		
		
		
		if (!$pos) :
			$pos=strpos($content, ' ', $len);
		endif;
		$snippet = substr($content,0,$pos+1 ).'...';
		
		if ($link) :
			//$snippet .= '<a href="'.$link.'" title="Read More"> [...]</a>'; 
		endif;
	else: 
		$snippet = $content;
	endif;	
	
	return $snippet;
}

/*****************************************************/
/* Lazyload all images */
/*****************************************************/

if ( !is_admin() ) :
    add_filter( 'wp_get_attachment_image_attributes', 'gs_change_attachment_image_markup' );
    /**
     * Change src and srcset to data-src and data-srcset, and add class 'lazyload'
     * @param $attributes
     * @return mixed
     */
    function gs_change_attachment_image_markup($attributes){

        if (isset($attributes['class'])) :
            $class = $attributes['class'];
        endif;

    
        if (strpos($class, 'no-lazyload') === false && strpos($class, 'custom-logo') === false):
            if (isset($attributes['src'])) {
                $attributes['data-src'] = $attributes['src'];
                $attributes['src']      = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='; //could add default small image or a base64 encoded small image here
            }
            if (isset($attributes['srcset'])) {
                $attributes['data-srcset'] = $attributes['srcset'];
                $attributes['srcset'] = '';
            }
            $attributes['class'] .= ' lazyload';
        endif;
        return $attributes;
    
    }
endif;


function get_section_header($template = '/template-parts/partials/partial-section-header.php') {

    ob_start();
    include(locate_template($template));
    $content = ob_get_contents();
    ob_end_clean();
 
    return $content;
 }
 

 // get icon from icon def file

function get_icon($icon_name) {

    //$filename = (isset($filename) ? $filename : 'symbol-defs.svg');
    $filename = (isset($filename) ? $filename : 'icons.svg');

    $icon_file = get_stylesheet_directory_uri().'/img/'.$filename;

    $classes = $icon_name;
    $icon_name = explode(' ', $icon_name, 2);
    $icon_name = $icon_name[0];

    return '<span class="rs-icon-wrapper '.$classes.'"><svg class="icon" preserveAspectRatio="xMinYMin" role="img"><use xlink:href="'.$icon_file.'#'.$icon_name.'"></use></svg></span>';
}


/*****************************************************/
/* get Yotube image thumbnail */
/*****************************************************/

function get_youtube_thumb($id) {
    $resolution = array (
        //'maxresdefault',
        //'sddefault',
        'mqdefault',
        //'hqdefault',
        //'default'
    );

    $return = array();

    for ($x = 0; $x < sizeof($resolution); $x++) {
        $url = 'https://img.youtube.com/vi/' . $id . '/' . $resolution[$x] . '.jpg';


        if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
            $return = ['url' => $url, 'res' => $resolution[$x]];
            break;
        }
    }
    return $return;
}