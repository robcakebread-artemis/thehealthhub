jQuery(document).ready(function($) {

	// smooth anchor scroll
	$(function() {
	  $('a[href*="#"]:not([href="#"], [href*="#tab-"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	  });
	});		

    $('#return-to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	
	if('objectFit' in document.documentElement.style === false) {
//	  console.log('NO Obejct Fit');
	  $('.object-fit').each(function () {
		var $container = $(this), imgUrl;
		
		imgUrl = $container.find('img').prop('src');
		
		if (imgUrl == '') {
			console.log('no url');
			imgURL = $container.find('img').data('src');
		}
		
		console.log('imgURL'+imgUrl);
		
		if (imgUrl) {

		  $container
			.css('backgroundImage', 'url(' + imgUrl + ')')
			.addClass('compat-object-fit');
		}  
	  });
	}	
	
	// hamburger menu
	$('.menu-bar').on('click touch', { passive: true } , function(e) {

		e.preventDefault();
		$(this).toggleClass("exit");
		
		$('#off-canvas').toggleClass("open");
		$('body').toggleClass("off-canvas-open");
	});
	
	$( document ).on( 'keydown', function ( e ) {
		if ( e.keyCode === 27 ) { // ESC
			$( '#off-canvas' ).removeClass('open');
			$('.menu-bar').removeClass("exit");	
			$('body').removeClass("off-canvas-open");
		}
	});		
	
	
	
    $('.accordion').find('.accordion-toggle').not('.expanded').click(function(){

      //Expand or collapse this panel

        $(this).next().slideToggle('fast');

        var $button = $(this).find('button');
        $button.toggleClass('open');
        $('button.arrow').not($button).removeClass('open');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });
	
	$('#accordion-2').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });

	var cancel = false;
	$("#show-qc").hover(function(){
		$(".quick-contact").fadeIn('fast');
	},function(){
	  if(!cancel)
	  $(".quick-contact").hide();
	});

	$("#show-qc").click(function(){
	  cancel = (cancel)?false: true;
	});	

		// open youtube video in popup
	
		/*$('.video a').magnificPopup({
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
	
			fixedContentPos: false,
			iframe: {
					markup: '<div class="mfp-iframe-scaler">'+
							'<div class="mfp-close"></div>'+
							'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
							'</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button	
				 patterns: {
					youtube: {
							index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
	
							id: 'v=', // String that splits URL in a two parts, second part should be %id%
							// Or null - full URL will be returned
							// Or a function that should return %id%, for example:
							// id: function(url) { return 'parsed id'; }
	
							src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0' // URL that will be set as a source for iframe.
					}
					},
					srcAction: 'iframe_src', 
			},
			
        });	*/
        
    $(".read-more-toggle").click(function(e) {
        e.preventDefault();
        var lesstext = $(this).data("lesstext");
        var moretext = $(this).data("moretext");
        $(this).toggleClass("expanded");
        $(this).prev(".read-more-wrapper").slideToggle();

        if ($(this).hasClass("expanded")) {
            $(this).html(lesstext);
        } else {
            $(this).html(moretext);
        }
    });       


    // size img in fullscreen slider

    if ($('.hero-slider.header-slider.slider-type-3').length && !$('body').hasClass('full-height')) {
        var header_height = $('.site-header').height()
        if ($('#wpadminbar')) {
            header_height += $('#wpadminbar').height();
        }

        $('.hero-slider.header-slider.slider-type-3').find('.slide-image').css('height', 'calc(100vh - ' + header_height + 'px)') ;
    } 

	// manual payment form 
	$('.radio-contact').on('click touch', { passive: true } , function(e) {     
        console.log('clicked');
        
        $("#manual-payment-wrapper .po-choice").removeClass('selected');
		$(".contact-panel").hide();
		
        var form_type = $(this).data("val");
        
        $('#' + form_type).show();
    });	        


    // make images square on image boxes

    var image_resize_timer;
    
    $(window).on('resize', function() {
        clearTimeout(image_resize_timer);                 
        image_resize_timer = setTimeout(function() { 
            resize_boxes();
        }, 200);	
    }).resize();	

});

function resize_boxes() {
    $('.icon-link-wrapper .icon-image').height($('.icon-link-wrapper .icon-image').width());
}

