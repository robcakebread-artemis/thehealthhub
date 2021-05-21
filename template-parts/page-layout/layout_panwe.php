<?php
$id = get_sub_field('id');
$classes = get_sub_field('classes');
$header = get_section_header();

$rid = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);

if( have_rows('panels') ):
    // Add hook for front-end
    add_action('wp_footer', function () use($rid) {  
        echo "<script> 
            jQuery(document).ready(function($){
                var titles = [];
                var icons = [];
                $('#slider-".$rid." .swiper-slide').each(function(i) {
                    titles.push($(this).data('name'));
                    icons.push($(this).data('icon'));
                });                
                setTimeout(function () {    
                    var mySwiper = new Swiper ('.swiper-container#slider-".$rid."', {
                        direction: 'horizontal',
                        loop: true,
                        preloadImages: false,
                        updateOnImagesReady: false,                                                             
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                            renderBullet: function(index, className) {
                                                text = '<div class=\"' + className + '\"><span class=\"title-icon\">' + icons[index] + '</span><span>' + titles[index] + '</span></div>';
                                                return text;
                            }            
                        },
                    }) 
                }, 50);				  
            });
        </script>"; }, 100);


?>
<section class="panwe-wrapper section with-marker <?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container">
        <?= $header ?>

        <div id="slider-<?= $rid; ?>" class="swiper-container">
            <div class="swiper-pagination button-nav"></div>
            <div class="swiper-wrapper">
                <?php while ( have_rows('panels') ) : the_row(); ?>
                    <?php $slider_title = get_sub_field('slider_title'); ?>
                    <div class="swiper-slide" data-name='<?= get_sub_field('panel_name'); ?>' data-icon='<?= get_icon(get_sub_field('panel_icon_name')); ?>'>
                        <div class="slide-content-wrapper">
                            <?= (get_sub_field('panel_title') ? '<h3 class="panel-title">'.get_sub_field('panel_title').'</h3>' : ''); ?>
                            <?php if( have_rows('icons') ): ?>
                                <div class="grid">
                                <?php while ( have_rows('icons') ) : the_row(); ?>
                                    <?php $link = get_sub_field('link'); ?>
                                    <div class="column">
                                        <?php if ($link): ?>
                                            <a href="<?= $link['url']; ?>" class="icon-link">
                                        <?php endif; ?>
                                        <div class="item-icon"><?= get_icon(get_sub_field('icon_name')); ?></div>
                                        <div class="item-title"><?= get_sub_field('title'); ?></div>
                                        <?php if ($link): ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($link): ?>
                                                <a href="<?= $link['url']; ?>" class="button plain"><?= $link['title']; ?><?= get_icon('arrow right'); ?></a>
                                        <?php endif; ?>                                        
                                    </div>
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>   
    </div>
</section>
<?php endif; ?>

