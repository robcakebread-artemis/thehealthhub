<?php
/**
 * Artemis MegaMenu Walker
 *
 * @author   Nick Dilley
 */
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
/**
 * Custom Mega menu walker
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
class ARTMegaWalker extends Walker_Nav_Menu{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
            if($depth == 0){
                $output .= '<div class="nav-column"><ul>';
            } elseif($depth >=1) {
	            $output .=  '<ul class="submenu-' . $depth .'">';
            } elseif($depth >= 2) {
	            $output .=  '<ul>';
            } else {
	             $output .= '';
            }
        }
        
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        
        if($depth == 0) {
	        $output .=  '</ul>';
	    } elseif($depth >= 1) {
	        $output .= '</ul>';
	    } elseif($depth >= 2) {
	        $output .= '';
	    } else {
		    $output .= '';
	    }
    }
    

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        //print_r($args);
        $menu_id = 'menu-item-' . $item->ID;
        $hasSub = '';
        if($args->walker->has_children){
            $hasSub = 'has-dropdown';
            
            if (get_field('enable_mega_menu', $item)):
                $hasSub .= ' megamenu';
            else:
                $hasSub .= ' no-megamenu';
            endif;
		}
        $output .= '<li id="' . $menu_id . '" class="' . $hasSub .' ' . $menu_id .'">';

        $title = $item->title;
        $permalink = $item->url;
        // get first class
		$classes = $item->classes;
		$classes = reset($classes);
		// Convert the classes into a string for output.
		//$classes_str  = implode( ' ', $first_class );
		
        //Add SPAN if no Permalink
        if( ($permalink && $permalink != '#') || ($permalink && $depth == 0) ) {
            $output .= '<a href="' . $permalink . '" class="' . $classes .'">'.$title.'</a>';
        } else {
            $output .= '<span class=' . $classes .'>'.$title.'</span>';
        }

    }
}

/*
class ARTMegaWalkerMobile extends Walker_Nav_Menu{
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
            
        $output .= '<div class="mp-level"><a class="mp-back" href="#">back</a><ul class="mobile-menu">';

  
        }
        
    public function end_lvl( &$output, $depth = 0, $args = array() ) {

	    
	    $output .= '</ul></div>';

    }
    

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
       
        $menu_id = 'mobile-menu-item-' . $item->ID;
        $output .= '<li id="' . $menu_id . '" class="icon-arrow-left ' . $menu_id .'">';



        $title = $item->title;
        $permalink = $item->url;

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '">';
        } else {
            $output .= '<span>';
        }
        $output .= $title;
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
        if ($depth == 0) {
           // endif;
        }
    }
}*/

class Mobile_Custom_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array();
        if ($depth == 0 || $depth == 2):
            $classes = array( 'sub-menu', 'collapsed' );
        endif;

		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
	}

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		$output .= "$indent</ul>{$n}";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' level-'.$depth.'" data-level="'. $depth .'"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		//$output .= $indent . '<li' . $id . $class_names .'>';
		$output .= '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );


        $permalink = $item->url;
        $classes = $item->classes;
        //$classes = reset($classes);

        if (in_array('hide-column', $classes)):
            $hide_item = true;
        else:
            $hide_item = false;
        endif;
        
        $item_output = $args->before;
        if( ($permalink && $permalink != '#')) :
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
        elseif ($hide_item):
            // don't output item
            //$item_output .= '<span>'.$depth.'</span>';
        else:
            $item_output .= '<span class="mega-menu-title">';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</span>';
        endif;
        $item_output .= $args->after;

        if ($depth != 0 && $permalink == '#'):
            $hide_plus = true;
        else: 
            $hide_plus = false;
        endif;

		//$item_output .= '<pre>'.print_r($args, true).'</pre>';
        if ($args->walker->has_children && !$hide_plus) :
			$item_output .= '<button class="submenu-arrow" title="Expand Menu"></button>';
		endif;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
	}
}