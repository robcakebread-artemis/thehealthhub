<?php
    $title = get_sub_field('section_title');
    $style = get_sub_field('hytre_style');
    $count = get_sub_field('no_posts');
    $cats = get_sub_field('category_to_show');
?>

<section class="hytre-wrapper section<?= ($style ? ' '.$style : ''); ?>">
    <div class="container">
        <?= ($title ? '<header class="section-heading"><h2>'.$title.'</h2></header>' : ''); ?>

        <div class="grid">
            <?php include(locate_template('template-parts/partials/partial-latest-posts.php')); ?>
        </div>
    </div>
</section>