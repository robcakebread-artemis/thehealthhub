<?php get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php include(locate_template('template-parts/content-layout.php')); ?>
         <?php

            $post_type = 'testimonial';
            $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

            foreach( $taxonomies as $taxonomy ) :

        // Gets every "category" (term) in this taxonomy to get the respective posts
        $terms = get_terms( array( 
            'taxonomy' => $taxonomy,
            'parent' => 50,
            'order' => 'DESC'
        ) );

        foreach( $terms as $term ) : ?>
            <section class="post-wrapper">
                <div class="container">
                    <div class="content-wrapper">             
                        <div class="grid header">
                            <header class="default-header aligncenter">
                                <h2>Read My <?php echo $term->name; ?> Reviews</h2>
                            </header>  
                        </div>
                    </div>
            <?php
            $args = array(
                    'post_type' => $post_type,
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'slug',
                            'terms' => $term->slug,
                        )
                    )

                );
            $posts = new WP_Query($args);

            if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php include(locate_template('template-parts/partials/partial-testimonial.php')); ?>
                </article>

            <?php endwhile; endif; ?>
            <script>
                var posts, current_page, max_page, first_page;
                posts = '<?= serialize( $wp_query->query_vars );?>';
                current_page = '<?= (get_query_var( 'paged' ) ? get_query_var('paged') : 1) ;?>';
                max_page = '<?= $wp_query->max_num_pages; ?>';
                first_page = '<?= get_pagenum_link(1); ?>';
                page_template = '<?= $page_template; ?>';
            </script>                
            <?php aws_paginator( get_pagenum_link(), $wp_query ); ?>    
            <?php wp_reset_postdata(); ?>
            </div>
            </section>
        <?php endforeach;

        endforeach; ?>
        <?php include(locate_template('template-parts/partials/partial-footer-components.php')); ?>
        </main>
    </div>
<?php get_footer(); ?>