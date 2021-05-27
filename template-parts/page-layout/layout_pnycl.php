<?php

$title = get_sub_field('pnycl_heading');
$text = get_sub_field('pnycl_text');
?>
<section class="pnycl-wrapper section">
    <div class="container">
    <?= ($title ? '<header class="section-heading"><h2>'.$title.'</h2></header>' : ''); ?>
    <?= ($text ? '<div class="testimonial-text">'.$text.'</div>' : ''); ?>
    <?php include(locate_template('/template-parts/partials/partial-testimonial-slider.php')); ?>

    </div>
</section>