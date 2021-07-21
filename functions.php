<?php
/**
 * AWS Custom Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AWS_Custom_Theme
 */

if ( ! function_exists( 'aws_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aws_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AWS Custom Theme, use a find and replace
		 * to change 'aws-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aws-custom', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'aws-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'aws_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
        ) );
        
        //add_image_size( 'acc-logo', 115, 80, false );	
        add_image_size( 'content-width-hero', 1170, 500, array("center","center") );	
        add_image_size( 'full-width-hero', 1920, 600, array("center","center") );	
        //add_image_size( 'full-screen-hero', 1920, 1080, array("center","center") );	
        add_image_size( 'gallery-thumb-square', 500, 500, array("center","center") );
        //add_image_size( 'gallery-thumb-square-large', 1000, 1000, array("center","center") );
        //add_image_size( 'gallery-large', 800, 600, false );
        //add_image_size( 'case-study-thumb', 400, 300, array('center','center') );
        add_image_size( 'case-study-thumb', 400, 400, array('center','center') );
	}
endif;
add_action( 'after_setup_theme', 'aws_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aws_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aws_custom_content_width', 1170 );
}
add_action( 'after_setup_theme', 'aws_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aws_custom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aws-custom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aws-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
	// Footer Widgets
	register_sidebar( array(
		'name' => __('Footer Widgets 1','aws-custom' ),
		'id' => 'footer-widgets',
		'description' => __( 'These are widgets for the Footer.','aws-custom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => __('Footer Widgets 2','aws-custom' ),
		'id' => 'footer-widgets-2',
		'description' => __( 'These are widgets for the Footer.','aws-custom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => __('Footer Widgets 3','aws-custom' ),
		'id' => 'footer-widgets-3',
		'description' => __( 'These are widgets for the Footer.','aws-custom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => __('Footer Widgets 4','aws-custom' ),
		'id' => 'footer-widgets-4',
		'description' => __( 'These are widgets for the Footer.','aws-custom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
    ) );         
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if (is_plugin_active('advanced-custom-fields-pro/acf.php')){ //Check to see if ACF is installed
        if (get_field('dynamic-sidebars','option')){
            while (has_sub_field('dynamic-sidebars','option')){ //Loop through sidebar fields to generate custom sidebars
                $s_name = get_sub_field('sidebar_name','option');
                $s_id = str_replace(" ", "-", $s_name); // Replaces spaces in Sidebar Name to dash
                $s_id = strtolower($s_id); // Transforms edited Sidebar Name to lowercase
                register_sidebar( array(
                    'name' => $s_name,
                    'id' => $s_id,
                    'description'   => esc_html__( 'Add widgets here.', 'aws-custom' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                ) );
            }
        }
     }	        
}
add_action( 'widgets_init', 'aws_custom_widgets_init' );

/*
 * ACF Sidebar Loader
 */
 
function my_acf_load_sidebar( $field ) {
    // reset choices
    $field['choices'] = array();
    $field['choices']['sidebar-1'] = 'Default Sidebar';
    //$field['choices']['none'] = 'No Sidebar';
    // load repeater from the options page
    if(get_field('dynamic-sidebars', 'option')) {
    // loop through the repeater and use the sub fields "value" and "label"
        while(has_sub_field('dynamic-sidebars', 'option')) {
            $label = get_sub_field('sidebar_name');
            $value = str_replace(" ", "-", $label);
            $value = strtolower($value);
            $field['choices'][ $value ] = $label; 
        }
    }
    // Important: return the field
    return $field;
}
add_filter('acf/load_field/name=left_sidebar', 'my_acf_load_sidebar');
add_filter('acf/load_field/name=right_sidebar', 'my_acf_load_sidebar');

/**
 * Enqueue scripts and styles.
 */
function aws_custom_scripts() {
    
    wp_enqueue_style( 'aws-custom-style', get_stylesheet_directory_uri() . '/css/site.min.css', false,  filemtime(get_stylesheet_directory() . '/css/site.min.css')); 
	
    wp_enqueue_script( 'aws-custom-init-js', get_template_directory_uri() . '/js/site.min.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/site.min.js'), true );	    
	/* Add Slick JS */
	wp_enqueue_script( 'aqblinds-slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1', true );	
    //wp_enqueue_script( 'multirange', get_template_directory_uri() . '/js/multirange.js', array(), filemtime(get_stylesheet_directory() . '/js/multirange.js'), true );	   

    if (!is_admin()) :
        wp_deregister_script( 'wp-embed' );
    endif;

    //remove gutenberg blocks css
    wp_dequeue_style( 'wp-block-library' );

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), filemtime(get_stylesheet_directory() . '/js/jquery.min.js'), true );	        

    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_dequeue_script( 'jquery-blockui' );
	wp_dequeue_style('wc-block-style-css'); 


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
    }

    global $is_IE;
    if ($is_IE) :
        wp_enqueue_script( 'svgxuse', get_stylesheet_directory_uri().'/js/svgxuse.js', '', true);
        wp_enqueue_script( 'polyfills', get_stylesheet_directory_uri().'/js/ie11.js', '', true);
    endif;
    
	// only load on blog page
	if ( is_archive() || is_home() || is_search()) :
	
		global $wp_query; 
		wp_register_script( 'aws_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );	
		
		wp_localize_script( 'aws_loadmore', 'aws_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode( $wp_query->query_vars ),
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages,
            'first_page' => get_pagenum_link(1),
            'post_type' => get_post_type()
		) );
	 
		wp_enqueue_script( 'aws_loadmore' );		
    endif;    
    
    /*wp_register_script( 'filter_script', get_stylesheet_directory_uri().'/js/woo-filter.js', array('jquery') );
    wp_localize_script( 'filter_script', 'filter_cat', array( 
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    ));        
    wp_enqueue_script( 'filter_script' );   */

}
add_action( 'wp_enqueue_scripts', 'aws_custom_scripts' );

function aws_increase_max_srcset_image_width( $max_width ) {
	return 1920;
}
add_filter( 'max_srcset_image_width', 'aws_increase_max_srcset_image_width' );

/* add no-js filter to stop titlebar flashin */
add_filter('body_class','my_class_names');
function my_class_names($classes) {
	// add 'class-name' to the $classes array
    $classes[] = 'aws no-js';
	// return the $classes array
	return $classes;
}

/**
 * Load constants
 */
require get_template_directory() . '/inc/constants.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Add custom AJAX pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Add Additional Functions
 */
require get_template_directory() . '/inc/additional-functions.php';

/**
 * Register Custom Post Types
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * custom nav walker
 */
require get_template_directory() . '/inc/class-custom-nav-walker.php';

/**
 * Cleanup
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Ajax functions
 */
require get_template_directory() . '/inc/ajax-functions.php';

/**
 * Breadcrumb manipulation
 */
require get_template_directory() . '/inc/breadcrumbs.php';




/* ADD ACF OPTIONS PAGE */

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function optimize_heartbeat_settings( $settings ) {
    $settings['autostart'] = false;
    $settings['interval'] = 60;
    return $settings;
}
add_filter( 'heartbeat_settings', 'optimize_heartbeat_settings' );

function disable_heartbeat_unless_post_edit_screen() {
    global $pagenow;
    if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' )
        wp_deregister_script('heartbeat');
}
add_action( 'init', 'disable_heartbeat_unless_post_edit_screen', 1 );

add_filter( 'the_content', 'tgm_io_shortcode_empty_paragraph_fix' );

function tgm_io_shortcode_empty_paragraph_fix( $content ) {
 
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );
}

//disable block editor for pages
add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_block_editor_for_page', '__return_false');


function my_body_classes( $classes ) {
    
    $classes[] = 'has-slider';
    
    return $classes;
    
}

add_filter('jpeg_quality', function($arg){return 90;});

add_action('admin_bar_menu', 'aws_add_admin_bar_item', 100);
function aws_add_admin_bar_item($admin_bar) {
//    global $pagenow;
    $args = array(
        'id'    => 'aws-schema-checker',
        'title' => 'Check Schema Markup',
        'href'  => 'https://search.google.com/structured-data/testing-tool/u/0/#url=https%3A%2F%2F'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        'meta'  => array('target' => '_blank')
    );
    $admin_bar->add_menu($args);
}

// load colours into select fields
function acf_load_color_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('colour_palette', 'options') ) {
        
        // while has rows
        while( have_rows('colour_palette', 'options') ) {
            
            // instantiate row
            the_row();
            
            // vars
            $value = get_sub_field('colour_colour');
            $label = get_sub_field('colour_name');
            
            // append to choices
            $field['choices'][ $value ] = $label;
            
        }
        
    }
    // return the field
    return $field;
}
add_filter('acf/load_field/name=top_colour', 'acf_load_color_field_choices');
add_filter('acf/load_field/name=bottom_colour', 'acf_load_color_field_choices');


function my_acf_init() {
	
	acf_update_setting('google_api_key', get_field('options_google_maps_api_key','options'));
}

add_action('acf/init', 'my_acf_init');

add_filter( 'wp_lazy_loading_enabled', '__return_false' );


add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    ga( 'send', 'event', 'Contact Form', 'submit' );
}, false );
</script>
<?php
}

/* ---------------------------------------------------------------------------
 * Loads Slideout files
 * --------------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'custom_slideout_load_scripts' );
function custom_slideout_load_scripts() {
	wp_enqueue_script( 'contact-slideout-script', get_stylesheet_directory_uri() . '/inc/sticky-cta/contact-slideout.js', array('jquery'), '20151215', true );
}

add_action( 'wp_enqueue_scripts', 'custom_swiper_load_scripts' );
function custom_swiper_load_scripts() {
	wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
   wp_enqueue_script('swiper','https://unpkg.com/swiper/swiper-bundle.min.js', array ('jquery') );
}