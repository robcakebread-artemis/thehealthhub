<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AWS_Custom_Theme
 */

$show_meta = true;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php include(locate_template('template-parts/partials/partial-testimonial.php')); ?>
</article>

<?php $cnt++; ?>