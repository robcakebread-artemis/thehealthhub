<?php
$rid = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);
?>
<?php 
$slider_type = (get_sub_field('nwgju_slider_type') ? get_sub_field('nwgju_slider_type') : '1');

$count = count(get_sub_field('slides'));

if( have_rows('slides') ):
    $slider = true;

    /* Slider type
    1 : Content Width
    2 : Full Width
    3 : Full Screen
    */

    switch ($slider_type):
        case '1':
            $thumb_size = 'content-width-hero';
            break;
        case '2':
            $thumb_size = 'full-width-hero';
            break;
        case '3':
            $thumb_size = 'full-screen-hero';
            break;
    endswitch;

    // only turn into slider if more than 1 slide
    if ($count > 1):

    // Add hook for front-end
    add_action('wp_footer', function () use($rid) {
        echo "<script>
            jQuery(document).ready(function($){
                setTimeout(function () {
                    $('#slider-".$rid."').slick({
                        dots: false,
                        autoplay: true,
                        autoplaySpeed: 6000,
                        slidesToShow: 1,
                        centerMode: false,
                        variableWidth: false,
                        infinite: true,
                        pauseOnHover: true,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    dots: true,
                                    arrows: false
                                }
                            },
                        ]
                    });
                    }, 50);				  
            });
            </script>"; }, 100);
        endif;
    ?>
    <section class="nwgju-wrapper section no-padding">
        <div class="grid-noGutter">
            <div class="col">
                <div id="slider-<?= $rid; ?>" class="hero-slider slider-type-<?= $slider_type; ?><?= ($prev_layout == '' ? ' header-slider' : '' ); ?>">
                    <?php 
                    $cnt = 0;
                    while( have_rows('slides') ): the_row(); 
                        $slide_type = get_sub_field('slide_type');

                        if($slide_type == 'Image'):

                            $slide_type = get_sub_field('slide_type');
                            $slide_title = get_sub_field('slide_title');
                            $slide_text = get_sub_field('slide_text');
                            $slide_image = get_sub_field('slide_image');
                            $slide_link = get_sub_field('slide_link');
                            $custom_class = get_sub_field('slide_custom_class');
                        
                        ?>
                        <div class="single-slide<?= ($custom_class ? ' '.$custom_class : ''); ?>" <?= ($cnt == 0 ? ' aria-hidden="true"' : '');?>>
                            <div class="slide-image">
                                <?= wp_get_attachment_image( $slide_image['id'], $thumb_size, '', array( "class" => (($slide_type == 'image') ? 'opaque' : '') ) ); ?>
                                <div class="slide-overlay"></div>
                            </div>
                            <?php if ($slide_title || $slide_text): ?>
                            <div class="slide-content-wrapper">         
                                <div class="slide-content-inner">         
                                    <div class="slide-content">

                                        <?php if ($slide_title) : ?>
                                            <div class="slider-title"><h2><?= $slide_title; ?></h2></div>
                                        <?php endif; ?>
                                        <?php if ($slide_text) : ?>
                                            <div class="slider-text"><?= $slide_text; ?></div>
                                        <?php endif; ?>

                                        <?php if( $slide_link ): ?>
                                            <div class="slider-cta"><a href="<?= $slide_link['url'];?>" class="cta-button button"><span><?= $slide_link['title']; ?></span> <?= get_icon('arrow right'); ?></a></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        

                    <?php elseif($slide_type == 'Map'): ?>
                        <?php $has_map = true; ?>
                        <div class="single-slide" <?= ($cnt == 0 ? ' aria-hidden="true"' : '');?>>
                            <div class="slide_image">

                            <?php
                            if( have_rows('google_map_coords') ):
                                $title = [];
                                while ( have_rows('google_map_coords') ) : the_row();
                                    $loc = get_sub_field('map');
                                    $lat[] = $loc['lat'];
                                    $lng[] = $loc['lng'];
                                    $title[] = get_sub_field('location_name');

                                endwhile;
                            endif;
                            ?>


                                <?php include(locate_template('template-parts/partials/partial-google-map.php')); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $cnt++; endwhile; ?>
                </div>
            </div>
        </div>	
    </section>
<?php endif; ?>