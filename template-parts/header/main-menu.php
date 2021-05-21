<div class="desktop-menu">
	<nav id="site-navigation" class="main-navigation <?= (isset($menu_class) ? ' '.$menu_class : ''); ?>">
    <?php  wp_nav_menu( array( 
        'theme_location' => 'menu-1',
        'container' => 'ul',
        'menu_class' => 'nav menu',
        'menu_id'        => 'primary-menu',
    ) ); ?>
</nav>
<div class="social"><?= do_shortcode('[social-icons class="light"]'); ?></div>
</div>