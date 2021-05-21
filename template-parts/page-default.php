<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				include(locate_template($tp_file)); 			
			endwhile; // End of the loop.
			?>
		</main>
	</div>
<?php get_footer(); ?>
