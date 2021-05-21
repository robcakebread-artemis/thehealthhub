<?php
/**
 * Template part for displaying page content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AWS_Custom_Theme
 */

$classes = '';

$size = 'full';


?>
<div class="column">
    <div class="latest-blog-thumb show-for-large">
        <a href="<?= the_permalink(); ?>" aria-label="<?= the_title(); ?>"><?= get_the_post_thumbnail(get_the_id(), $size); ?></a>
        <div class="latest-blog-overlay">
            <div class="latest-blog-content">
                <a href="<?= the_permalink(); ?>" aria-label="<?= the_title(); ?>"><h3><?= the_title(); ?></h3></a>
            </div>
        </div>  
    </div>
</div>

<?php $cnt++; ?>