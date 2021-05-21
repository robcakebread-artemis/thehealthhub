<?php

$title = get_sub_field('pnycl_heading');
?>
<section class="pnycl-wrapper section">
    <div class="container">
        <?php if ($title): ?>
        <header class="section-heading">
            <h2><?= $title; ?></h2>
            <div class="hr-line short"></div>
        </header>
        <?php endif; ?>

        <?php include(locate_template('/template-parts/partials/partial-testimonial-slider.php')); ?>

    </div>
</section>