jQuery(document).ready(function($) {
	$('body').on('click', '.gallery-top img, .gallery-top .video-thumb, .show-pu', function(e){
        e.preventDefault();

        var putype = $(this).data('type');

        if (putype == 1 || putype == 2) {
            var id = $(this).data('id');

            console.log(id);
        } else {
            var id = $(this).data('url');
            var slide = $(this).closest('.swiper-slide').data('swiper-slide-index');
            var srcs = $('.gallery-top').data('srcs');

            console.log(id);
		}

       
		//console.log(slide);

		$.ajax({
			url : '/wp-admin/admin-ajax.php',
			data : {
				'action': 'loadlightbox',
                'id'	: id,
                'putype': putype,
                'srcs'  : srcs,
                'slide' : slide,
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				//$('#aws_loadmore').text('Loading...'); 
			},
			success : function( data ){ 
                var $temp = $('<div id="pu-temp">' + data + '</div>');
                $("body").append($temp);
                $('.pu-overlay').addClass('active');

                if (putype != 1) {

                    var lightboxSwiper = new Swiper('#lightbox-slider', {
                        initialSlide: slide,
                        loop: true,
                        navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                        },
                    });    
                }
			}
		});
        return false;
    });

    $( document ).on('click touch', '.close', { passive: true } , function(e) {
        close_pu();
    });

    $( document ).on('click touch', '.cross', { passive: true } , function(e) {
        close_pu();
    });

    $( document ).on('click touch', '.pu-overlay', { passive: true } , function(e) {
        close_pu();
    });

    $( document ).on('click touch', '.aws-pu', { passive: true } , function(e) {
        close_pu();
    });

    $( document ).on('click touch', '.aws-pu-inner', { passive: true } , function(evt) {
        evt.stopPropagation();
    });

    function close_pu() {
        $('.pu-overlay').removeClass('active');
        $('#pu-temp').remove();
    }    

	$( document ).on( 'keydown', function ( e ) {
		if ( e.keyCode === 27 ) { // ESC
            close_pu();
		}
    });	    
});        