<?php

$id = get_sub_field('id');
$classes = get_sub_field('classes');

$items = get_sub_field('items_to_show');
$link = get_sub_field('link_to_all_testimonials');

?>
<section class="jepsa-wrapper section <?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container">
        <?php include(locate_template('/template-parts/partials/partial-section-header.php')); ?>

        <div class="reviews-wrapper">
            <?php if (in_array(0, $items)): ?>
            <div class="left">
                <?php include(locate_template('/template-parts/partials/partial-testimonial-slider.php')); ?>
                <?php if ($link): ?>
                    <a href="<?= $link['url']; ?>" class="button plain test-link"><?= $link['title']; ?><?= get_icon('arrow right'); ?></a>
                <?php endif; ?>                
            </div>  
            <?php endif; ?>
            <?php if (in_array(1, $items) || in_array(2, $items)): ?>
            <div class="right">
                <?php if (in_array(1, $items)): ?>
                    <?php
                        $cat_score = get_field('checkatrade_score', 'options');
                        $cat_reviews = get_field('checkatrade_no_of_reviews', 'options');
                        $link = get_field('checkatrade_link', 'options');
                    ?>
                    <div class="checkatrade-review review-box">
                        <a href="<?= $link['url']; ?>" rel="noopener noreferrer" target="_blank">
                            <div class="cat-intro"><?= $link['title']; ?></div>
                            <div class="cat-logo"><?= wp_get_attachment_image(get_field('checkatrade_logo', 'options'), 'full'); ?></div>
                            <div class="cat-stars star-rating"><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?></div>
                            <div class="cat-rating">We're rated <?= $cat_score; ?>/10 from <?= $cat_reviews; ?> reviews</div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (in_array(2, $items)): ?>
                    <?php
                        $link = get_field('google_link', 'options');
                    ?>
                    <div class="google-review review-box">
                        <a href="<?= $link['url']; ?>" rel="noopener noreferrer" target="_blank">
                            <div class="google-logo"><?= get_icon('google'); ?></div>
                            <div class="google-stars star-rating"><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?></div>
                            <div><?= $link['title']; ?></div>
                        </a>        
                    </div>
                <?php endif; ?>                
            </div>
            <?php endif; ?>  
        </div>

    </div>
</section>