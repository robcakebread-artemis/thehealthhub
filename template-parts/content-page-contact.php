<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AWS_Custom_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
     include(locate_template('template-parts/content-layout.php')); 
?>   

	<div class="entry-content">
        <div class="container">
            <div class="grid main-content">
                <div class="column">
                    <?php
                    if( have_rows('offices') ):
                    ?>
                    <?php
                        while ( have_rows('offices') ) : the_row();
                        ?>
                        <div class="office-wrapper">
                            <h3><?= get_sub_field('office_name'); ?></h3>
                        <?php

                            if( have_rows('contact_options') ):
                                while ( have_rows('contact_options') ) : the_row();
                                    $contact_type = get_sub_field('contact_type');
                                    $class = '';
                                    $field = 'contact_details';

                                    switch ($contact_type):
                                        case '0':
                                            $icon = 'phone-alt';
                                            $class= "highlight";
                                            break;
                                        case '1':
                                            $icon = 'phone-alt';
                                            $class= "highlight";
                                            break;
                                        case '2':
                                            $icon = 'mail-alt';
                                            $class= "highlight";
                                            break;
                                        case '3':
                                            $icon = 'office';
                                            $field = 'contact_details_large';
                                            break;
                                        case '4':
                                            $icon = 'fax';
                                            break;
                                        case '5':
                                            $icon = '';
                                            $field = 'contact_details_large';
                                            break;
                                        case '6':
                                            $icon = '';
                                            $field = 'contact_details_no_format';
                                            break;
                                    endswitch;
                            ?>

                                <div class="contact-details-wrapper<?= ($class ? ' '.$class : ''); ?>">
                                    <?= ($icon ? '<span class="intro-icon">'.get_icon($icon).'</span>' : ''); ?>
                                    <span class="contact-detail"><?= do_shortcode(get_sub_field($field)); ?></span>
                                </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                            </div>
                        <?php                                
                        endwhile;                    
                    endif;
                    ?>                    
                </div>
                <div class="column">
                    <?php
                        $title = get_field('form_title');
                    ?>
                    <h3><?= $title ?></h3>
                    <?php
                        $enq_id = get_field('general_enquiry_form_id');

                        if ($enq_id):
                    ?>
                            <?php echo do_shortcode($enq_id); ?>
                    <?php
                        endif;
                    ?>                    
               </div>
            </div>
        </div>

        <?php include(locate_template('template-parts/partials/partial-footer-components.php')); ?>

	</div>
</article>