<?php
    
if (!isset($pid)):
    $pid = get_the_ID();
endif;

if( have_rows('layout', $pid) ):
	 // loop through the rows of data
    while ( have_rows('layout', $pid) ) : the_row();
        /***********************************/
        /*  site component    */
        /***********************************/
        if( get_row_layout() == 'sitec' ):
            $old_pid = $pid;
            $pid = get_sub_field('site_component_page_to_show');
            include(locate_template('template-parts/content-layout.php'));
            //$pid = get_the_ID();
            $pid = $old_pid;
            $prev_layout = 'sitec';     
		/***********************************/
		/* Add hero/slider            */
		/***********************************/
		elseif( get_row_layout() == 'nwgju' ):
            include(locate_template('template-parts/page-layout/layout_nwgju.php'));
            $prev_layout = 'nwgju';
            if (!get_field('hide_breadcrumb')): 
                //include(locate_template('template-parts/partials/partial-breadcrumbs.php'));
            endif;
		/***********************************/
		/* Add Title                */
		/***********************************/
		elseif( get_row_layout() == 'rqtoa' ):
            include(locate_template('template-parts/page-layout/layout_rqtoa.php'));            
            $prev_layout = 'rqtoa';
		/***********************************/
		/* Add Columns                */
		/***********************************/
		elseif( get_row_layout() == 'bqsqi' ):
            include(locate_template('template-parts/page-layout/layout_bqsqi.php'));			
            $prev_layout = 'bqsqi';
		/***********************************/
		/* Add Testimonial Slider            */
		/***********************************/
		elseif( get_row_layout() == 'pnycl' ):
			include(locate_template('template-parts/page-layout/layout_pnycl.php'));			
			$prev_layout = 'pnycl';
		/***********************************/
		/* Add Icon/Image Boxes    */
		/***********************************/
		elseif( get_row_layout() == 'kqbhm' ):
            include(locate_template('template-parts/page-layout/layout_kqbhm.php'));	
            $prev_layout = 'kqbhm';	
		/***********************************/
		/* Add Accordion    */
		/***********************************/
		elseif( get_row_layout() == 'pwaft' ):
            include(locate_template('template-parts/page-layout/layout_pwaft.php'));		
            $prev_layout = 'pwaft';
		/***********************************/
		/* Add Testimonial    */
		/***********************************/
		elseif( get_row_layout() == 'imefd' ):
            include(locate_template('template-parts/page-layout/layout_imefd.php'));		
            $prev_layout = 'imefd';
		/***********************************/
		/* Add Latest Posts    */
		/***********************************/
		elseif( get_row_layout() == 'hytre' ):
            include(locate_template('template-parts/page-layout/layout_hytre.php'));		
            $prev_layout = 'hytre';
		/***********************************/
		/* Add gallery            */
		/***********************************/
		elseif( get_row_layout() == 'tajqy' ):
            include(locate_template('template-parts/page-layout/layout_tajqy.php'));			
            $section_class = '';        
            $prev_layout = 'tajqy';    
		/***********************************/
		/* Add banner     */
		/***********************************/
		elseif( get_row_layout() == 'jafwe' ):
            include(locate_template('template-parts/page-layout/layout_jafwe.php'));	   
            $prev_layout = 'jafwe';       
		/***********************************/
		/* Add Panel Slider     */
		/***********************************/
		elseif( get_row_layout() == 'panwe' ):
            include(locate_template('template-parts/page-layout/layout_panwe.php'));    
            $prev_layout = 'panwe';        
		/***********************************/
		/* Add Testimonial Section     */
		/***********************************/
		elseif( get_row_layout() == 'jepsa' ):
            include(locate_template('template-parts/page-layout/layout_jepsa.php'));   
            $prev_layout = 'jepsa';     
		/***********************************/
		/* Add Image Slider    */
		/***********************************/
		elseif( get_row_layout() == 'gtrwb' ):
            include(locate_template('template-parts/page-layout/layout_gtrwb.php'));   
            $prev_layout = 'gtrwb';     
		/***********************************/
		/* Add Sidebar Section     */
		/***********************************/
		elseif( get_row_layout() == 'sideb' ):
            include(locate_template('template-parts/page-layout/layout_sideb.php'));   
            $prev_layout = 'sideb';     
		/***********************************/
		/* Add Contact Banner     */
		/***********************************/
		elseif( get_row_layout() == 'usopq' ):
            include(locate_template('template-parts/page-layout/layout_usopq.php'));   
            $prev_layout = 'usopq';           
		/***********************************/
		/* Add Icon Links     */
		/***********************************/
		elseif( get_row_layout() == 'llico' ):
            include(locate_template('template-parts/page-layout/layout_llico.php'));   
            $prev_layout = 'llico';   
		/***********************************/
		/* Add Team Slider     */
		/***********************************/
		elseif( get_row_layout() == 'team' ):
            include(locate_template('template-parts/page-layout/layout_team.php'));   
            $prev_layout = 'team';    
		/***********************************/
		/* Add Price Block     */
		/***********************************/
		elseif( get_row_layout() == 'price' ):
            include(locate_template('template-parts/page-layout/layout_price.php'));   
            $prev_layout = 'price';      
		/***********************************/
		/* Add Title Break                 */
		/***********************************/
		elseif( get_row_layout() == 'title_break' ):
		?>
			<div class="section">		
				<div class="container">
					<div class="grid">	
						<div class="col">		
							<div class="padding-left">
								<h2 class="entry-title margin-top"><?= get_sub_field('title_break'); ?></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		endif;						

	endwhile;

else :
?>
    <div class="section">		
      <div class="container">
        <div class="grid">	
            <div class="col">	
                <header class="section-heading">
                    <h1><?= the_title(); ?></h1>
                </header>                
                <?= the_content(); ?>
            </div>
        </div>
    </div>
<?php

endif;	
?>