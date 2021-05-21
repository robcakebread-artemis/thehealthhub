<footer id="colophon" class="site-footer footer-2">
    <div class="container">
        <div class="grid footer-wrapper">
            <div class="column footer-widget"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 1')); ?></div>
            <div class="column footer-widget"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 2')); ?></div>
            <div class="column footer-widget"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 3')); ?></div>
        </div>
    </div>
            
    <div id="copyright">
        <div class="container">
            <div class="grid">              
                <div class="column">
                    <div class="site-info">                       
                        <?= (get_field('footer_copyright_text','option') ? do_shortcode(get_field('footer_copyright_text','option')) : ''); ?>
                    </div>                    
                </div>			
            </div>
        </div>
    </div>	
</footer>