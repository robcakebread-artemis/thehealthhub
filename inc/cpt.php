<?php

add_action( 'init', 'aws_register_cpt' );

function aws_register_cpt() {
    register_post_type( 'popup',
	// CPT Options
		array(
            'labels' => get_cpt_labels('popup', 'popups', 'popup'),
            'public' => false,
            'show_ui' => true,
			'has_archive' => false,
			'query_var' => true,
			'hierarchical'  => false,	
			'menu_icon'  => 'dashicons-feedback',
            'menu_position'         => 31,
			'supports' => array( 'title', 'author', 'thumbnail', 'custom-fields'),
            'rewrite' => array('with_front' => false),
		)
	);


	register_post_type( 'testimonial',
	// CPT Options
		array(
            'labels' => get_cpt_labels('testimonial', 'testimonials', 'testimonial'),
			'public' => true,
			'has_archive' => false,
			'query_var' => true,
			'hierarchical'  => false,	
			'taxonomies' => array( 'testimonialcategory' ),
			'menu_icon'  => 'dashicons-format-chat',
            'menu_position'         => 30,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
            'rewrite' => array('with_front' => false),
		)
	);
	
	register_taxonomy(
		'testimonialcategory',
		'testimonial',		
		array(
			'public' => false,
			'label' => 'Testimonial Categories',
			'hierarchical' => true,
			'query_var' => true,			
			'show_ui' => true,
			'show_admin_column' => true,
		)
    );	   

	register_post_type( 'team',
	// CPT Options
		array(
            'labels' => get_cpt_labels('Team', 'Team Members', 'team'),
			'public' => true,
			'publicly_queryable'  => false,
			'has_archive' => false,
			'query_var' => true,
			'hierarchical'  => false,	
			'taxonomies' => array( 'teamcategory' ),
			'menu_icon'  => 'dashicons-admin-users',
            'menu_position'         => 30,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields'),
            'rewrite' => array('with_front' => false),
		)
	);

	// create Accordion

	$args = array(
        'labels' => get_cpt_labels('Accordion/FAQ', 'Accordions/FAQs', 'accordion'),
		'hierarchical' => false,
		'supports' => array( 'title', 'author', 'thumbnail', 'custom-fields', 'page-attributes'),
		//'taxonomies' => array( 'FAQ_category' ),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-list-view',
		'show_in_nav_menus' => true,
		'publicly_queryable' => false,
		'exclude_from_search' => false,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'rewrite' => array('with_front' => false),
	);

    register_post_type( 'accordion', $args );	     

    register_post_type( 'site-component',
	// CPT Options
		array(
            'labels' => get_cpt_labels('site component', 'site components', 'site-component'),
			'public' => false,
            'has_archive' => false,
            'show_ui' => true,
			'query_var' => true,
			'hierarchical'  => false,	
			'menu_icon'  => 'dashicons-networking',
            'menu_position'         => 30,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
            'rewrite' => array('with_front' => false),
		)
    );    
            
}
function get_cpt_labels($single, $plural, $cpt) {
    $labels = array(
            'name' => __( ucwords($plural), $cpt ),
            'singular_name' => __( ucwords($single), $cpt ),
            'add_new' => __( 'Add New', $cpt ),
            'add_new_item' => __( 'Add New '.ucwords($single), $cpt ),
            'edit_item' => __( 'Edit '.ucwords($single), $cpt ),
            'new_item' => __( 'New '.ucwords($single), $cpt ),
            'view_item' => __( 'View '.ucwords($single), $cpt ),
            'search_items' => __( 'Search '.ucwords($plural), $cpt ),
            'not_found' => __( 'No '.$plural.' found', $cpt ),
            'not_found_in_trash' => __( 'No '.$plural.' found in Trash', $cpt ),
            'parent_item_colon' => __( 'Parent '.ucwords($single).':', $cpt ),
            'menu_name' => __( ucwords($plural), $cpt ),
    );
    
    return $labels;
}    