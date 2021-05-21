<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AWS_Custom_Theme
 */

$classes = '';
$size = "case-study-thumb";
$title = get_the_title();
$image_fit = true;

$image = get_field('gallery')[0]['ID']; 

if (!$image):
    $image = get_post_thumbnail_id(); 
    $image_fit = false;  
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <div class="icon-link-wrapper full-width overlay">
        <a href="<?= the_permalink(); ?>" aria-label="<?= the_title(); ?>">
            <div class="icon-image">
                <?= wp_get_attachment_image($image, $size, '' ); ?>
                <div class="icon-title">
                    <h3 class="secondary-title"><?= the_title(); ?></h3>
                </div>                
                <div class="hover-overlay"></div>
            </div>
        </a>
    </div>
</article>

<?php $cnt++; ?>