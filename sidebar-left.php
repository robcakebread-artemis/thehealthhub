<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AWS_Custom_Theme
 */

if (is_shop() || is_archive() || is_product_category() ) :
	//if (is_product_category()) :
		$sidebar = "Shop Sidebar";
	//else :
	//	$sidebar = "Shop Archive Page";
	//endif;	
//elseif (is_product()) :
//	$sidebar = "Single Shop Page";
else :
	$sidebar = get_field('left_sidebar');
endif;
 
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar($sidebar); ?>
</aside><!-- #secondary -->