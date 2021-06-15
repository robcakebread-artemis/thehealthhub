<?php
    $image = wp_get_attachment_image(get_field('testimonial_author_image'), 'full');
    $testimonial_location = get_field('testimonial_location');
    $show_stars = true;
    $show_meta = ($show_meta ? $show_meta : false);
?>
<div class="testimonial-content-wrapper">
    <div class="grid testimonial-content-inner">  
        <div class="column">
            <div class="test-text">                
                <?= the_content(); ?>
                <span class="author"><i><?= the_title(); ?><?php if( get_field('testimonial_location') ): ?>, <?= $testimonial_location ?><?php endif; ?></i></span> 
            </div> 
        </div>
    </div>
</div>