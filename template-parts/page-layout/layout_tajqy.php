<?php
    $images = get_sub_field('gallery_images');
    $rid = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);
    $cnt = 0;

    if( $images ): 
?>
    <?php
    // Add hook for front-end
    add_action('wp_footer', function () use($rid) {
        echo "<script>
            jQuery(document).ready(function($){
                setTimeout(function () {
                    $('.image-gallery a').simpleLightbox();
                }, 50);	  
            });
            </script>"; }, 100);
    ?>        
?>
    <section class="tajqy-wrapper section<?= ($section_class ? ' '.$section_class : ''); ?><?= $section_class; ?>">
        <div class="grid image-gallery">
            <?php foreach( $images as $image ):
                $cnt++;

                if ($cnt == 1):
                    $thumb_size = 'full-width-hero';
                elseif ($cnt == 6):
                    $thumb_size = 'gallery-thumb-square-large';
                else:
                    $thumb_size = 'gallery-thumb-square';
                endif;

            ?>
                <div class="column">
                    <div class="image-wrapper">
                        <div class="gallery-image">
                            <a href="<?= $image['url']; ?>">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?= $image['sizes'][$thumb_size]; ?>" alt="<?= $image['alt']; ?>" class="lazyload"  />
                            </a>
                        </div>
                    </div>
                </div>					
            <?php endforeach; ?>
        </div>		
        <div class="gallery-text">
            <?= get_sub_field('after_gallery_text'); ?>
        </div>
    </section>
<?php endif; ?>