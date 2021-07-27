<?php

$id = get_sub_field('id');
$classes = get_sub_field('classes');
$title = get_sub_field('team_title');
$text = get_sub_field('team_intro_text');
$id = get_sub_field('id');

$args = array(
    'post_type' => 'team',
    'orderby'	=> 'date',
    'order'		=> 'ASC',
    'posts_per_page' => -1	
    //''
);	
//set up custom query
$aws_query = new WP_Query($args); ?>		


<section class="team-wrapper section<?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container">
        <?php if ($title): ?>
        <header class="section-heading">
            <h2><?= $title; ?></h2>
        </header>
        <?php endif; ?>
        <div class="team-text"><?= $text; ?></div>
        <div class="grid">
            <?php if ($aws_query->have_posts()) :
            while ($aws_query->have_posts()) : $aws_query->the_post();  ?>	
                <? $job_title = get_field('job_title'); ?>
                <div class="column" <?php if ( is_page('therapists') ): ?>id="<?= the_title(); ?>"<? endif ?>>
                    <?php if ( !is_page('therapists') ): ?><a href="/therapists/#<?= the_title(); ?>"><? endif ?>
                    <div class="team-image"><?= get_the_post_thumbnail(); ?></div>
                    <div class="team-name">
                        <h3><?= the_title(); ?></h3>
                        <p><?= $job_title ?></p>
                    </div>
                    <?php if ( !is_page('therapists') ): ?></a><? endif ?>
                    <?php if ( is_page('therapists') ): ?>
                        <div class="team-content" ><?= the_content(); ?></div>
                    <? endif ?>

                </div>
            <?php endwhile;
            wp_reset_postdata(); 
            wp_reset_query();
        endif; ?>
        </div>
        <div class="grid">
            <div class="column column-link ">
            <?php $link = get_sub_field('link');
                if ($link): ?>
                    <div class="link text-center">
                        <a href="<?= $link['url']; ?>" class="button"><?= $link['title']; ?><?= get_icon('arrow right'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
    </div>
</section>

