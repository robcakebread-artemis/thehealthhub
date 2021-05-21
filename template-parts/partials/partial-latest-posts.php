<?php

if (!isset($count)) :
	$count = 2;
endif;

	$args = array( 'numberposts' => $count );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ) :
        $pid = $recent["ID"];
	?>
	<div class="column">
		<a href="<?= get_permalink($pid); ?>" aria-label="Read More about <?= $recent['post_title']; ?>">
			<div class="latest-blog-thumb show-for-large">
				<?= get_the_post_thumbnail($pid, 'blog-thumb'); ?>	
				<div class="latest-blog-overlay">
					<div class="latest-blog-content">
						<a href="<?= get_permalink($pid); ?>"><h3><?= $recent["post_title"]; ?></h3></a>
					</div>
				</div>	
			</div>
		</a>

	</div>
	<?php
	endforeach;
	wp_reset_query();
?>