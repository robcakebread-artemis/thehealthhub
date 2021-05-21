<?php
$tag = get_sub_field('rqtoa_tag');
$tag = (isset($tag) ? $tag : 'h2');
?>

<header class="no-hero-page-header">
    <div class="container">
        <<?= $tag; ?>><?= get_sub_field('rqtoa_title'); ?></<?= $tag; ?>>
    </div>
</header>
<?php
   // include(locate_template('template-parts/partials/partial-breadcrumbs.php'));
?>