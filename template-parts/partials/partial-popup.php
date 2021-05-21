<?php 
if (!defined('ABSPATH')) die('No direct access allowed');


    $popup = get_field('eip_default_popup', 'options') ;


    if (isset($popup) && $popup) :
        $timeout = get_field('options_time_before_popup_shows', 'options');

        $timeout = ($timeout ? $timeout * 1000 : 30000 );

        $image = get_the_post_thumbnail_url($popup);
?>

    <?php
    // Add hook for front-end
        add_action('wp_footer', function () use($timeout) {
            echo "<script>
                jQuery(document).ready(function($){
                    setTimeout(function () {
                        setTimeout(showEIPModal,".$timeout.");
                    }, 50);				  
                });
                </script>"; }, 100);
        ?>

        <div class="art-modal art-effect" id="bounceModal">
        <div class="art-content"<?= ($image ? ' style="background-image: url('.$image.');"' : ''); ?>>
            <a class="art-close art-close-icon"></a>  
            <div class="eip-content">
                <?= get_field('popup_content', $popup); ?>
            </div>
        </div>
        </div>
        <div class="art-overlay"></div>
	
<?php endif; ?>