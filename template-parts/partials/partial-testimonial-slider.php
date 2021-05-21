<?php
$rid = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);

add_action('wp_footer', function () use($rid) {
    echo "<script>    
		jQuery(document).ready(function($){
			setTimeout(function () {
                var testimonilswiper = new Swiper('#slider-".$rid."', {
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                      },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    }
                });				
			}, 100);					
        });
        </script>"; }, 100);
?>

<div id="slider-<?= $rid; ?>" class="swiper-container">
    <div class="swiper-wrapper">            
<?php

$cat = get_sub_field('testimonial_category_to_show');

$args = array(
    'post_type' => 'testimonial',
    'orderby'	=> 'menu_order',
    'order'		=> 'ASC'		
    //''
);	

if ($cat):
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'testimonialcategory',
            'field'    => 'term_id',
            'terms'    => array((int)$cat),
            'operator' => 'IN',
        ),
    );
endif;
//set up custom query
$aws_query = new WP_Query($args);		

if ($aws_query->have_posts()) :
    while ($aws_query->have_posts()) : $aws_query->the_post();  

?>	
        <div class="swiper-slide test-wrapper relative">
            <div class="testimonial-content-wrapper">
                <div class="grid testimonial-content-inner">  
                    <div class="column">
                        <span class="author aligncenter"><?= the_title(); ?></span>
                        <div class="star-wrapper-slider"><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?><?= get_icon('star'); ?></div>
                        <div class="test-text">                
                            <div class="test-quote"><?= get_icon('quote'); ?></div>    
                            <?= the_content(); ?>
                            <div class="test-quote after"><?= get_icon('quote'); ?></div>
                        </div>
                        <?php if ($show_meta): ?>
                        <div class="testimonial-meta">
                            <div class="test-author"><?= the_title(); ?></div>
                        </div>
                        <?php endif; ?>    
                    </div>
                </div>
            </div>
        </div>
<?php endwhile;
    wp_reset_postdata(); 
    wp_reset_query();
endif;
?>
    </div>
    <div class="swiper-pagination dot-nav"></div>
</div>