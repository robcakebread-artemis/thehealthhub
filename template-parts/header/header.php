<header id="header" class="site-header">
    <div class="site-branding">
        <div class="container">
            <div class="grid">	
                <div class="column aligncenter-mob menu-lg">
                    <div id="logo">
                        <a href="/" title="The Health Hub Logo"><img src="<?= get_stylesheet_directory_uri(); ?>/img/logo.png" width="300" alt="The Health Hub Logo"/></a>
                    </div>
                </div>
                <div class="column aligncenter-mob menu-lg">
                    <div id="header-right">
                        <div class="contact-details">
                            <div class="phone-number contact-detail"><?= get_icon('phone-alt'); ?><?= get_field('options_phone','options'); ?></div>
                            <? /*<div class="email-address contact-detail"><a href="mailto:<?= $email; ?>"><?= get_icon('mail-alt'); ?><?= do_shortcode('[email]'.get_field('options_email','options').'[/email]'); ?></a></div> */ ?>
                        </div>
                        <?php include(locate_template('template-parts/header/main-menu.php')); ?>
                    </div>
                </div>
                <div class="column mob aligncenter-mob">
                    <div id="logo">
                        <a href="/" title="Squarepoint Logo"><img src="<?= get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Squarepoint Logo"/></a>
                    </div>
                    <div id="header-right">
                        <div class="contact-details">
                            <div class="contact-detail"><a href="<?= $phone_mobile_link; ?>"><?= get_icon('phone-alt'); ?></a>
                            </div>
                        </div>
                        <?php include(locate_template('template-parts/header/main-menu.php')); ?>
                    </div>
                </div>  				
            </div>
        </div>
    </div>	
    <div class="header-right-mobile">
        <?php include(locate_template('template-parts/header/hamburger.php')); ?>    
    </div>
</header>