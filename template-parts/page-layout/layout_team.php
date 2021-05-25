<?php

$id = get_sub_field('id');
$classes = get_sub_field('classes');

$title = get_sub_field('team_title');
?>
<section class="team-wrapper section">
    <div class="container">
        <?php if ($title): ?>
        <header class="section-heading">
            <h2><?= $title; ?></h2>
            <div class="hr-line short"></div>
        </header>
        <?php endif; ?>
    </div>
</section>