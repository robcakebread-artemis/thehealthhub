<?php
    $image = wp_get_attachment_image(get_field('testimonial_author_image'), 'full');
    $testimonial_author = get_field('testimonial_author');
    $testimonial_company = get_field('testimonial_company');
    $show_stars = false;
    $show_meta = ($show_meta ? $show_meta : false);
?>
<div class="testimonial-content-wrapper">
    <div class="grid testimonial-content-inner">  
        <div class="column">
            <div class="test-text">                
                <?= the_content(); ?>
                <span class="author"><i><?= the_title(); ?></i></span> 
            </div> 
        </div>
    </div>
</div>