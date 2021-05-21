<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="grid">
            <div class="col">
            <?php
                if ( function_exists('yoast_breadcrumb') ) :
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                endif;
            ?>
            </div>
        </div>
    </div>
</div>