<?php

$banner_style = get_sub_field('banner_style');
$link = get_sub_field('banner_link');

?>
<section class="jafwe-wrapper section <?= $banner_style; ?>">
    <div class="container">
        <h2 class="banner-title"><?= get_sub_field('banner_title'); ?></h2>
        <div class="banner-subtitle"><?= get_sub_field('banner_subtitle'); ?></div>
        <?php if ($link): ?>
            <a href="<?= $link['url']; ?>" class="button white banner-link"><?= $link['title']; ?></a>
        <?php endif; ?>
    </div>
    <div class="banner-footer-wrapper">
        <div class="container">
        <div class="banner-footer"><?= do_shortcode(get_sub_field('banner_footer')); ?></div>
        </div>
    </div>
</section>