jQuery(document).ready(function($) {

    if ( Cookies.get('aws-cookie-consent') != '1' ) {
        $('.aws-cookie-consent').show();
    }

    $('#aws-cookie-accept').on('click touch',function(e) {
        Cookies.set('aws-cookie-consent', '1',  { expires: 365 });

        $('.aws-cookie-consent').fadeOut('slow', function() {
            $('.aws-cookie-consent').remove();
        });
    });

});