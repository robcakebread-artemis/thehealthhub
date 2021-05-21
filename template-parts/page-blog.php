<?php 
    $pid = get_option( 'page_for_posts' ); 
    
    $post_type = 'blog';
    $posts_per_page = '9';
?>

<?php get_header(); ?>
	<div id="primary" class="post-archive content-area">
		<main id="main" class="site-main" role="main">
            <?php include(locate_template('template-parts/content-layout.php')); ?>

            <section class="post-wrapper">
                <div class="container">
                    <div class="grid">
                    <?php
                        $cnt = 0;
                        if ( have_posts() ):
                            while ( have_posts() ) : the_post();
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
                            posts = '<?= addslashes(serialize( $wp_query->query_vars ));?>';
                            current_page = '<?= (get_query_var( 'paged' ) ? get_query_var('paged') : 1) ;?>';
                            max_page = '<?= $wp_query->max_num_pages; ?>';
                            first_page = '<?= get_pagenum_link(1); ?>';
                            page_template = 'blog';
                        </script> 
                        <?php aws_paginator( get_pagenum_link() ); ?>
                    </div>
                </div>	
            </section>
            <?php include(locate_template('template-parts/partials/partial-footer-components.php')); ?>
		</main>
	</div>
<?php get_footer(); ?>