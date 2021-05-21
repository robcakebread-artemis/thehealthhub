<?php
    $style = get_sub_field('style');
    $two_col = get_sub_field('accordion_columns');
    $accordion_id = get_sub_field('accordion_to_add')[0];
    $post_text = get_sub_field('post_content');
?>

<section class="pwaft-wrapper section <?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container">
        <div class="grid">
            <div class="column">
                <?php include(locate_template('/template-parts/partials/partial-section-header.php')); ?>

                <?php include(locate_template('template-parts/partials/partial-accordion.php')); ?> 

                <?php if ($post_text): ?>
                    <div class="content">
                        <?= $post_text; ?>
                    </div>
                <?php endif; ?>                
            </div>
        </div>
    </div>
</section>