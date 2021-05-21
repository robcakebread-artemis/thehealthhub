

	<?php if ( is_front_page() ) : ?>
		<div id="art-side-form-calculator" class="art-side-form closed home-calc"><div id="art-side-form-tab-calculator" class="art-side-form-tab"><div class="art-side-form-side-text">Equity Release Calculator</div></div><div class="art-side-form-inner"><div class="frm_forms" id="frm_form_15_container">

    		<?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]'); ?>

    	</div>
		<a href="javascript:void(0);" data-toggle="#art-side-form" class="close-cross"></a></div></div>

	    <div id="art-side-form" class="art-side-form closed home-contact"><div id="art-side-form-tab" class="art-side-form-tab"><div class="art-side-form-side-text">Get In Touch</div><div class="art-side-form-side-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div></div><div class="art-side-form-inner"><h4>Get in touch below</h4><div class="frm_forms" id="frm_form_15_container">
	
			<?php echo do_shortcode('[gravityform id="3" title="false" ajax="true"]'); ?>
			
		</div>
		<a href="javascript:void(0);" data-toggle="#art-side-form" class="close-cross"></a></div></div>
	<?php else : ?>
	    <div id="art-side-form" class="art-side-form closed"><div id="art-side-form-tab" class="art-side-form-tab"><div class="art-side-form-side-text">Get In Touch</div><div class="art-side-form-side-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div></div><div class="art-side-form-inner"><h4>Get in touch below</h4><div class="frm_forms" id="frm_form_15_container">
	
			<?php echo do_shortcode('[gravityform id="3" title="false" ajax="true"]'); ?>
			
		</div>
		<a href="javascript:void(0);" data-toggle="#art-side-form" class="close-cross"></a></div></div>
	<?php endif; ?>