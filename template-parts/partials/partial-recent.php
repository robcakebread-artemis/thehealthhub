<?php

$args = array(
    'post_type'           => 'casestudy',
    'posts_per_page'      => 3,
    'orderby'             => 'date',
    'order'               => 'DESC',
);

$term = get_sub_field('category_to_show');

if ($term):
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'casestudycategory',
            'field'    => 'term_id',
            'terms'    => array((int)$term),
            'operator' => 'IN',
        ),
    );
endif;  

$size = 'case-study-thumb';

$query = new WP_Query( $args );

if ( $query->have_posts() ):
?>
<div class="grid style1">
<?php
    while ( $query->have_posts() ) : $query->the_post();
        $location = get_field('location');
        $image = get_field('gallery')[0]['ID']; 

        if (!$image):
            $image = get_post_thumbnail_id(); 
        endif;
?>
        <div class="column">
            <div class="icon-link-wrapper full-width overlay">
                <a href="<?= get_post_permalink(); ?>" aria-label="<?= get_the_title(); ?>">
                    <div class="icon-image">
                        <?= wp_get_attachment_image($image, $size, '' ); ?>
                        <div class="icon-title">
                            <h3 class="secondary-title"><?= get_the_title().($location ? '<br />'.$location : ''); ?></h3>
                        </div>                
                        <div class="hover-overlay"></div>
                    </div>
                </a>
            </div>        
        </div>

<?php
    endwhile;
?>
</div>
<?php
endif;
wp_reset_postdata();
wp_reset_query();