<?php 
    $pids = get_field('site_component_for_footer', $pid);
    
    if (isset($pids) && !empty($pids)):
        foreach ($pids as $pid ):
            include(locate_template('template-parts/content-layout.php'));
        endforeach;
    endif;
?>