<?php 
    $pid = get_the_ID(); 
    $post_type = 'casestudy';
    $taxonomy = 'casestudycategory';
    $posts_per_page = '9';
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>

<?php get_header(); ?>
	<div id="primary" class="post-archive content-area">
		<main id="main" class="site-main" role="main">
            <?php include(locate_template('template-parts/content-layout.php')); ?>
                <?php

                $args = array(
                    'post_type' => 'casestudy',
                    'posts_per_page'	=> $posts_per_page,
                    'paged' => $paged,
                    'post_status' => 'publish',
                );

                $wp_query = new WP_Query($args);
                ?>
            <section class="post-wrapper case-studies">
                <div class="container">
                <?php
                if( $wp_query->have_posts() ):   
                    $page_template = basename(get_page_template());             
                    $cnt = 0;
                    while ( $wp_query->have_posts() ) : the_post();
                        include(locate_template($tp_file)); 			
                    endwhile; // End of the loop.
                else:
                ?>
                    <p class="no-results">No results found.</p>
                <?php
                endif;
                ?>
                <script>
                    var posts, current_page, max_page, first_page;
                    posts = '<?= serialize( $wp_query->query_vars );?>';
                    current_page = '<?= (get_query_var( 'paged' ) ? get_query_var('paged') : 1) ;?>';
                    max_page = '<?= $wp_query->max_num_pages; ?>';
                    first_page = '<?= get_pagenum_link(1); ?>';
                    page_template = '<?= $page_template; ?>';
                </script>                
                <?php aws_paginator( get_pagenum_link(), $wp_query  ); ?>	
                <?php wp_reset_postdata(); ?>
                </div>
            </section>
            <?php include(locate_template('template-parts/partials/partial-footer-components.php')); ?>
		</main>
	</div>
<?php get_footer(); ?>