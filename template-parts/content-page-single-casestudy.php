<?php
    $location = get_field('location');
    $completed = get_field('contract_completed');
    $works = get_field('works_undertaken');
    $cat = get_the_terms(get_the_id(), 'casestudycategory');
    $content = get_the_content();
?>

<header class="no-hero-page-header">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if ($location): ?>
        <p class="subtitle"><?= $location; ?></p>
        <?php endif; ?>
    </div>
</header>
<?php
    include(locate_template('template-parts/partials/partial-breadcrumbs.php'));
?>   
    <article>
        <div class="container">
            <div class="grid">
                <div class="column gallery-left">
                    <?php
                        $image = get_post_thumbnail_id();
                    ?>
                    <?php if (!$image): ?>
                        <?php include(locate_template('template-parts/partials/partial-gallery-slider.php')); ?>
                    <?php else: ?>
                        <div class="single-image">
                            <?= wp_get_attachment_image($image, 'gallery-large', '' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="column gallery-right">
                    <div class="cs-meta">
                        <h2>Project Details</h2>
                        <p><span class="title">Project: </span><?= the_title().($location ? ', '.$location : ''); ?></p>
                        <?php if ($completed): ?>
                        <p><span class="title">Contract Completed: </span><?= $completed; ?></p>
                        <?php endif; ?>
                        <?php if ($works): ?>
                        <p><span class="title">Works Undertaken: </span><?= $works; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (get_the_content()): ?>
            <div class="grid">
                <div class="cs-desc">
                    <h2>About the Project</h2>
                    <?= the_content(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </article>
    <?php
        $pid = 6487;

        include(locate_template('template-parts/content-layout.php'));
    ?>