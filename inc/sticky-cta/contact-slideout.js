(function($) {
    $(document).ready(function(){
  
  $(document).on('click', '#art-side-form-tab', function() {
      $el = $('#art-side-form');
      $el.toggleClass('open');

      if ($el.hasClass('open')) {
          $el.addClass('opened');
          $el.removeClass('closed');
      } else {
          $el.addClass('closed');
          $el.removeClass('opened');
      }
  });

  	$('.close-cross').on('click touch',function(e) {
	      e.preventDefault();
	      var $el = $(this).data('toggle');
	
	      $($el).removeClass('open');
	      $($el).removeClass('opened');
	      $($el).addClass('closed');
	});     

  $('a[href="#send-message"]').click( function() {
      $el = $('#art-side-form');
      $el.addClass('temp-closed');
  });
	
});
})( jQuery );

(function($) {
    $(document).ready(function(){
  
  $(document).on('click', '#art-side-form-tab-calculator', function() {
      $el = $('#art-side-form-calculator');
      $el.toggleClass('open');

      if ($el.hasClass('open')) {
          $el.addClass('opened');
          $el.removeClass('closed');
      } else {
          $el.addClass('closed');
          $el.removeClass('opened');
      }
  });

    $('.close-cross').on('click touch',function(e) {
        e.preventDefault();
        var $el = $(this).data('toggle');
  
        $($el).removeClass('open');
        $($el).removeClass('opened');
        $($el).addClass('closed');
  });     

  $('a[href="#send-message"]').click( function() {
      $el = $('#art-side-form-calculator');
      $el.addClass('temp-closed');
  });
  
});
})( jQuery );