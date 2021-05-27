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
	<div class="latest-blog-overlay">
		<div class="latest-blog-thumb show-for-large">
			<a href="<?= get_permalink($pid); ?>" aria-label="Read More about <?= $recent['post_title']; ?>">
				<?= get_the_post_thumbnail($pid, 'blog-thumb'); ?>	
			</a>
		</div> 
		<div class="latest-blog-content">
			<div class="latest-blog-title"><a href="<?= get_permalink($pid); ?>"><h3><?= $recent["post_title"]; ?></h3></a></div>
			<?= $recent["post_excerpt"]; ?>
		</div>
		<div class="latest-blog-read">
			<a class="button" href="<?= get_permalink($pid); ?>" aria-label="Read More about <?= $recent['post_title']; ?>">
				Read More <?= get_icon('arrow right'); ?>
			</a>
		</div>
	</div>

	</div>
	<?php
	endforeach;
	wp_reset_query();
?>