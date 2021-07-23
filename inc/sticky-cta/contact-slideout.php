<div id="art-side-form" class="art-side-form closed">
	<div id="art-side-form-tab" class="art-side-form-tab">
		<div class="art-side-form-side-text">Contact Us</div>
		<div class="art-side-form-side-icon"><?= get_icon('mail-alt'); ?></div>
	</div> 
	<div class="art-side-form-inner">
		<h3>Contact Us</h3><p>Please get in touch using the form below</p>
		<div class="frm_forms" id="frm_form_15_container">

    <?php //echo do_shortcode( '[contact-form-7 id="$form_id" title="Contact form 1"]' ); ?>
	<?php echo do_shortcode('[gravityform id="2" title="false" ajax="true"]'); ?>
	<?php  //echo FrmFormsController::get_form_shortcode(array('id'=> 2, 'title' => false, 'description' => false, 'ajax' => true)); ?>

</div>
<a href="javascript:void(0);" data-toggle="#art-side-form" class="close-cross"></a></div></div>
