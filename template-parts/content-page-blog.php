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
<div class="grid">
    <div class="column column-thumb">
        <div class="latest-blog-overlay">
            <div class="latest-blog-thumb show-for-large">
            <a href="<?= the_permalink(); ?>" aria-label="<?= the_title(); ?>"><?= get_the_post_thumbnail(get_the_id(), $size); ?></a>
            </div> 
        </div>
    </div>
    <div class="column column-content">
        <div class="latest-blog-overlay">
            <div class="latest-blog-content">
                <div class="latest-blog-title"><a href="<?= the_permalink(); ?>" aria-label="<?= the_title(); ?>"><h3><?= the_title(); ?></h3></a></div>
                <div><?= the_excerpt(); ?></div>
            </div>
            <div class="latest-blog-read">
                <a class="button" href="<?= get_permalink($pid); ?>" aria-label="Read More about <?= $recent['post_title']; ?>">
                    Read More <?= get_icon('arrow right'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php $cnt++; ?>