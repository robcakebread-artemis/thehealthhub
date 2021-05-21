<?php

$id = get_sub_field('id');
$classes = get_sub_field('classes');

$phone = get_sub_field('phone_number');
$email = get_sub_field('email_address');
$form_id = get_sub_field('form_id');
$form_only = get_sub_field('form_only');
$link = get_sub_field('link');

if ($form_only):
    $classes .= ' form-only';
endif;

$contact =  ($phone ? '<div class="phone contact">'.get_icon('phone-alt').do_shortcode($phone).'</div>' : '');

$contact .= ($email ? '<div class="email contact">'.get_icon('mail-alt').do_shortcode($email).'</div>' : '');

?>
<section class="usopq-wrapper section <?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container">
        <div class="grid<?= (!$form_only ? ' two-col' : ''); ?>">
            <?php if (!$form_only): ?>
            <div class="column">
                <?php include(locate_template('/template-parts/partials/partial-section-header.php')); ?>

                <?php if ($form_id): ?>
                    <?= $contact; ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="column">
            <?php if ($form_only): ?>
                <?php include(locate_template('/template-parts/partials/partial-section-header.php')); ?>
            <?php endif; ?>
            <?php if ($form_id): ?>
                <?php echo do_shortcode($form_id); ?>
            <?php else: ?>
                <?= $contact; ?>
                <?php if ($link): ?>
                    <div class="link">
                        <a href="<?= $link['url']; ?>" class="button orange"><?= $link['title']; ?></a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>