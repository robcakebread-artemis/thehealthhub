<?php 
$end = get_sub_field('sidebar_end');
?>

<?php if (!$end): ?>


<div class="sidebar-section">
    <div class="container">
        <div class="grid">
            <div class="column content">


<?php else: ?>
    <?php 
/*    $sidebarleft = false;
    $sidebarright = false;
    $contentclass = '';
    
    if (get_sub_field('select_sidebar_layout')) :
        switch (get_field('select_sidebar_layout')) {
            case 'none':
                break;
            case 'left':
                $sidebarleft = true;
                break;
            case 'right':
                $sidebarright = true;
                break;
            case 'both':
                $sidebarleft = true;
                $sidebarright = true;
                break;
            default :
                break;
        }
    endif;*/
    
    $sidebar = get_sub_field('right_sidebar');

    ?>

            </div>
            <aside class="column sidebar">
                <div class="container">
                    <?php dynamic_sidebar($sidebar); ?>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php endif; ?>