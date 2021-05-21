<?php
    $title_tag = (get_sub_field('title_tag') ? get_sub_field('title_tag') : 'h2');
    $section_title =  get_sub_field('section_title');
    $title = get_sub_field('title');
    $intro_text = get_sub_field('intro_text');
    $top_icon = (isset($top_icon) ? $top_icon : '');
?>

<?php if ($section_title || $title || $intro_text || $top_icon): ?>

<div class="grid header">
    <header class="default-header">
        <?php if ($top_icon): ?>
            <div class="header-icon"><?= get_icon($top_icon); ?></div>
        <?php endif; ?>     
        <?php if ($section_title): ?>
            <?php if ($title): ?>
                <p class="xs"><?= $section_title; ?></p>
            <?php else: ?>
                <h2 class="xs"><?= $section_title; ?></h2>
            <?php endif; ?>
        <?php endif; ?>     
        <?php if ($title): ?>          
            <<?= $title_tag; ?>><?= $title; ?></<?= $title_tag; ?>>
        <?php endif; ?>
        <?php if ($intro_text) : ?>
            <div class="text"><?= $intro_text; ?></div>
        <?php endif; ?>
    </header>  
</div>

<?php $top_icon = ''; ?>

<?php endif; ?>