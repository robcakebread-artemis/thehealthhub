<?php
    $id = get_sub_field('id');
    $classes = get_sub_field('additional_classes'); 
    $container_classes = get_sub_field('container_classes'); 
    $fullwidth = get_sub_field('full_width');
    $style = get_sub_field('column_style');
    $col_width = '';
    $reverse = '';

    switch ($style) {
        case 'single':
            $col_width = (get_sub_field('column_width') ? get_sub_field('column_width') : '100');
            break;
        case 'halfimage':
            $reverse = get_sub_field('reverse_imagetext');
            break;
    }
    
    $heading = get_sub_field('bqsqi_heading');
    if ($heading):
        $tag = get_sub_field('bqsqi_heading_tag');
        $tag = (isset($tag) ? $tag : 'h2');
    endif;

    if ($fullwidth) :
        $classes .= " full-width";
    endif;

    $header = get_section_header();

    $count = count(get_sub_field('columns'));
    if ($count < 2):
        $singlecol = "singlecol";
    endif;
?>

<section class="bqsqi-wrapper section <?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container<?= ($container_classes ? ' '.$container_classes : ''); ?><?= ($fullwidth ? '-full-width' : ''); ?>">
        <div class="content-wrapper">
                                <?= $header; ?>

            <div class="grid <?= $singlecol ?> <?= $style; ?><?= ($reverse ? ' reverse' : ''); ?>"<?= ($col_width ? ' style="grid-template-columns: '.$col_width.'%"' : '');?>>
            <?php
            if( have_rows('columns') ):
                while ( have_rows('columns') ) : the_row();
                    $col_class = get_sub_field('column_class');
            ?>
                <div class="column <?= ($col_class ? ' '.$col_class : ''); ?>">
                    <div class="inner-text">
                        <?= get_sub_field('column_content'); 
                        $link = get_sub_field('link');
                        $link_class = get_sub_field('link_class');
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        if ($link): ?>
                            <div class="link<?= ($link_class ? ' '.$link_class : ''); ?>">
                                <a href="<?= $link['url']; ?>" class="button" target="<?php echo esc_attr( $link_target ); ?>"><?= $link['title']; ?><?= get_icon('arrow right'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>  
                </div>
            <?php
                endwhile;
            endif;
            ?>        
            <?php if ($style == 'halfimage') :?>
                <div class="column image">
                    <?= wp_get_attachment_image( get_sub_field('bqsqi_image'), 'gallery-large' ); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>