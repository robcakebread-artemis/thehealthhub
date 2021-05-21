function showEIPModal() {
//    console.log("Cookie: "+Cookies.get('eipmodal'))

    if ( Cookies.get('eipmodal') != 'true' ) {
        jQuery("#bounceModal").addClass("art-show");
    }
}  

jQuery(document).ready(function($) {
    // EIP Modal

   $( document ).on( 'keydown', function ( e ) {
       if ( e.keyCode === 27 ) { // ESC
           $( '#bounceModal' ).removeClass('art-show');
       }
   });	

	// Closing the Popup Box
	$(".art-close").click(function() {
        $("#bounceModal").removeClass("art-show");
        Cookies.set("eipmodal", 'true');
	});
  
    // If clicked anywhere on body
    $("body").click(function(){
      $("#bounceModal").removeClass("art-show");
    });

    // Prevent event if clicked on #bounceModal
    $("#bounceModal").click(function(e){
      e.stopPropagation();
    });    

});	   