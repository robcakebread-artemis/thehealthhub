	// Off canvas Menu

	$('.submenu-arrow').click(function(){

		console.log('clicked');

		var $submenu = $(this).next("ul");
		//var panelID = '.page-template-page-faq #'+$obj.parent().attr('id');
        var $parent_level = $(this).closest('li').data('level');

        console.log($parent_level);
        

		$('li[data-level="'+$parent_level+'"] .sub-menu').not($submenu).removeClass("expanded");
        $('li[data-level="'+$parent_level+'"] .sub-menu').not($submenu).slideUp(); //hide the others			
		
		//$('.submenu-arrow').html('<i class="fas fa-caret-right"></i>');
		$('li[data-level="'+$parent_level+'"] .submenu-arrow').removeClass('open');

		$submenu.slideToggle(); //toggle the current one		
		$submenu.toggleClass("expanded");

		if ($submenu.hasClass('expanded')) {
            //$(this).html('<i class="fas fa-caret-down"></i>');
            $(this).addClass('open');
		} else {
            //$(this).html('<i class="fas fa-caret-right"></i>');
            $(this).removeClass('open');
		}

    });	