<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AWS_Custom_Theme
 */

?>
   </div>	

   <?php if (get_field('eip_show_popup', 'options')): ?>
        <?php include(locate_template('template-parts/partials/partial-popup.php')); ?>
    <?php endif; ?>
    <?php if (get_field('footer_bar', 'options')): ?>
        <?php include(locate_template('template-parts/footer/footer-bar.php')); ?>
    <?php endif; ?>
   <?php include(locate_template('template-parts/footer/footer-2.php')); ?>
</div>

<?php wp_footer(); ?>
<?php get_template_part( 'inc/sticky-cta/contact-slideout'); ?>

</body>
</html>

