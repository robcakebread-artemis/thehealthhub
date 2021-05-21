<?php
$rid = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);

add_action('wp_footer', function () use($rid) {
    echo "<script>    
		jQuery(document).ready(function($){
			setTimeout(function () {
                var logoswiper = new Swiper('#slider-".$rid."', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        700: {
                          slidesPerView: 2,
                        },  
                        1024: {
                          slidesPerView: 3,
                        },   
                        1200: {
                          slidesPerView: 4,
                        } 
                    }
                });				
			}, 100);					
        });
        </script>"; }, 100);
?>

<div id="slider-<?= $rid; ?>" class="swiper-container">
    <div class="swiper-wrapper" style="height: 200px">
        <?php $images = get_sub_field('images');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $images ): ?>
            <?php foreach( $images as $image_id ): ?>           
                <div class="swiper-slide test-wrapper relative">
                    <?php echo wp_get_attachment_image( $image_id, $size ); ?>        
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination dot-nav"></div>
</div>