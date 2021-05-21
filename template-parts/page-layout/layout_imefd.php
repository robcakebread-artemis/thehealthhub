<section class="imefd-wrapper section">
    <div class="container">
        <div class="grid">
            <div class="col-10_sm-12" data-push-left="off-1_sm-0">
            <?php
            $pid = get_sub_field('testimonial_to_show')[0];
            if ($pid):
                $args = array(
                    'post_type' => 'testimonial',
                    'post__in'  => array($pid)
                );	
                //set up custom query
                $aws_query = new WP_Query($args);		

                if ($aws_query->have_posts()) :
                    while ($aws_query->have_posts()) : $aws_query->the_post();  
                ?>	
                        <?php include(locate_template('template-parts/partials/partial-testimonial.php')); ?>
                <?php endwhile;
                    wp_reset_postdata(); 
                    wp_reset_query();
                endif;
            endif;
            ?>
            </div>
        </div>
    </div>
</section>