<?php
    $id = get_sub_field('id');
    $classes = get_sub_field('classes'); 

?>

<section class="price-wrapper section <?= ($classes ? ' '.$classes : ''); ?>"<?= ($id ? ' id="'.$id.'"' : ''); ?>>
    <div class="container">
        <div class="content-wrapper">
            <div class="grid">
                <div class="column">
                <?php if( have_rows('therapy') ):
                    while( have_rows('therapy') ) : the_row(); ?>
                        <?php if ( !get_sub_field( 'massage' ) ):
                            $therapy_name = get_sub_field('therapy_name'); ?>
                            <div class="therapy-name"><?= $therapy_name ?></div> 
                            <div class="sessions">
                                <?php if( have_rows('prices') ):
                                    while( have_rows('prices') ) : the_row(); 
                                    $session = get_sub_field('session');
                                    $price = get_sub_field('price'); ?>
                                    <div><?= $session ?><span class="price">£<?= $price ?></span></div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
                <div class="column">
                <?php if( have_rows('therapy') ):
                        while( have_rows('therapy') ) : the_row(); ?>
                            <?php if ( get_sub_field( 'massage' ) ):
                                $therapy_name = get_sub_field('therapy_name'); ?>
                            <div class="therapy-name"><?= $therapy_name ?></div> 
                            <div class="sessions">
                                <?php if( have_rows('prices') ):
                                    while( have_rows('prices') ) : the_row(); 
                                    $session = get_sub_field('session');
                                    $price = get_sub_field('price'); ?>
                                    <div><?= $session ?><span class="price">£<?= $price ?></span></div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>