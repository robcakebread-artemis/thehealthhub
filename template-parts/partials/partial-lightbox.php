<?php
?>
<div class="pu-overlay"></div>
<div class="aws-pu active">
    <div class="aws-pu-inner<?= (isset($class) ? ' '.$class : ''); ?>">
        <div class="close white">Close<span class="cross"></span></div>

        <?php if ($putype != 1 && $putype != 2): ?>

        <div id="lightbox-slider" class="swiper-container">
            <div class="swiper-wrapper">

            <?php if ($srcs):
                    $cnt = 0;
                    foreach ($srcs as $src):
                        if (strpos($src, 'v=') === 0):
            ?>
                        <div class="swiper-slide" data-slide="<?= $cnt; ?>">
                            <iframe width="420" height="315" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"
                                src="https://www.youtube.com/embed/<?= str_replace('v=', '', $src); ?>?rel=0&autoplay=1">
                            </iframe>
                        </div>
            <?php       
                        else:
            ?>
                        <div class="swiper-slide" data-slide="<?= $cnt; ?>"><?= wp_get_attachment_image($src, 'large'); ?></div>
            <?php
                        endif;
                        $cnt++;
                    endforeach;
                endif;
            ?>
            
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
        <?php endif; ?>

        <?php if ($putype == 1): ?>
        <?php
                if ($id):
                ?>
                    <div class="content">
                        <?= get_field('popup_content', $id) ?>
                    </div>
                
                <?php
                endif;
        ?>
        <?php endif; ?>

        <?php if ($putype == 2): ?>
        <?php
                if ($id):
                ?>
                    <div class="content">
                        <iframe width="420" height="315" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"
                                src="https://www.youtube.com/embed/<?= str_replace('v=', '', $id); ?>?rel=0&autoplay=1">
                        </iframe>
                    </div>
                
                <?php
                endif;
        ?>
        <?php endif; ?>        

    </div>
</div>