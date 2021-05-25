<?php
$max = get_sub_field('max_iconsimage_blocks_in_a_row');
$imagetype = get_sub_field('images_or_fontawesome_icons');
$full_width_images = get_sub_field('full_width_images');
$full_width_page = get_sub_field('full_page_width');
$overlay = get_sub_field('overlay_title_on_image');
$section_class = get_sub_field('section_class');
$grid_class = get_sub_field('override_grid_class_advanced');
$heading = get_sub_field('kqbhm_heading');
$after_content = get_sub_field('content_after_images');
$style = get_sub_field('kqbhm_style');
$grid_styles = '';

$max = ($max ? $max : '3');
if ($max != '3'):
    //$grid_styles .= 'grid-template-columns: repeat('.$max.', 1fr);';
    //$grid_styles .= 'flex-basis: 24%;';
    //$column_styles .= 'flex-basis: %;';
endif;

if ($style == 'style2' or 'style3'):
    $grid_styles .= 'grid-gap: 0;';
endif;

if ($full_width_images):
    
    if ((int)$max > 2):
        $image_size = 'full-width';
    else:
        $image_size = 'full';
    endif;
    $classes = 'full-width';
else:
    $image_size = 'full-width';
endif;

if ($overlay):
    if ($classes):
        $classes .= ' ';
    endif;
    $classes .= 'overlay';
endif;

if( have_rows('iconimage_blocks') ):
?>
<section class="kqbhm-wrapper section<?= ($section_class ? ' '.$section_class : ''); ?>">
    <div class="container<?= ($full_width_page ? '-full-width' : ''); ?>">
        <?php if ($heading): ?>
            <header class="section-heading">
                <h2><?= $heading; ?></h2>
            </header>
        <?php endif; ?>     
        <div class="grid <?= ($style ? ' '.$style : ' style1'); ?>"<?= ($grid_styles ? ' style="'.$grid_styles.'"' : ''); ?>>
<?php
    while ( have_rows('iconimage_blocks') ) : the_row();
        $image = '';
        $image = get_sub_field('icon_image');
        if ($image): ?>
            <?php $image = wp_get_attachment_image( $image, $image_size ); ?>
        <?php endif;

        $link = get_sub_field('icon_link_title');

        $icon_text = get_sub_field('icon_text');
?>
        <div class="aligncenter column">
            <div class="icon-link-wrapper <?= ($classes ? ' '.$classes : ''); ?>">
                <?php if ($link['url'] != '#'): ?>
                    <a href="<?= $link['url']; ?>" aria-label="<?= $link['title']; ?>">
                <?php endif; ?>
                <?php if ($image): ?>
                <div class="icon-image">
                    <?= $image; ?>         
                </div>                                   
                <div class="icon-title">
                    <h3 class="secondary-title">
                        <?= $link['title']; ?>
                    </h3>
                    <?php if ($style == 'style21'): ?>
                        <a href="<?= $link['url']; ?>" class="button wireframe white">LEARN MORE <?= get_icon('arrow right'); ?></a>
                    <?php endif; ?>                        
                </div>    
                <?php endif; ?>
                <?php if ($link['url'] != '#'): ?>
                </a>
                <?php endif; ?>  
                <?php if ($icon_text): ?>
                    <div class="icon-link-text"><?= $icon_text; ?>
                        <?php if ($link['url'] != '#'): 
                            if ($imagetype == 'Images'): ?>
                            <p><a href="<?= $link['url']; ?>" aria-label="<?= $link['title']; ?>">LEARN MORE <?= get_icon('arrow right'); ?></a></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>  
            </div>              
        </div>
<?php   
    endwhile;
?>
        </div>

        <?php 

if ($after_content): 
?>
    <div class="grid">
        <div class="column">
            <div class="bottom-content">
                <?= $after_content; ?>
            </div>
        </div>
    </div>
<?php
endif;
?>        
    </div>
</section>
<?php
endif;