<?php $rid = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7); ?>
<?php
// Add hook for front-end
    add_action('wp_footer', function () use($rid) {
        echo "<script>
            jQuery(document).ready(function($){
                setTimeout(function () {

                    }, 50);				  
            });
            </script>"; }, 100);

$images = get_field('gallery');

if( $images ): 

    $gallerytitle = get_sub_field('layout_gallery_title');

    $image_str = '';

    foreach ($images as $i):
        $image_str .= $i['id'].',';
    endforeach;

    $image_str = rtrim($image_str, ',');

    if ($gallerytitle) :
    ?>
        <h2 class="section-title"><span class="title-entry"><?= $gallerytitle; ?></span></h2>
    <?php
    endif;

    ?>
        <div class="gallery-wrapper">
            <div class="swiper-container gallery-top" data-srcs="<?= $image_str; ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $image): ?>            
                        <div class="swiper-slide">
                            <?= wp_get_attachment_image($image['id'], 'gallery-large', '', array( "class" => "lazyload", "data-url" => wp_get_attachment_image_url($image['id'], 'gallery-large') )); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>

            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">        
                    <?php foreach ($images as $image): ?>
                        <div class="swiper-slide">
                            <div class="thumb-wrapper">
                                <?= wp_get_attachment_image($image['id'], 'woocommerce_gallery_thumbnail'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
