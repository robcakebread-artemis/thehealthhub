ready(function(){
    var rmtaelement = document.getElementsByClassName("showrmtawidget");
    var cnt = 0;
    //var $image_url = 'https://d27f2tt2zpkdy7.cloudfront.net/rating_images';
    var $image_url = 'https://ratemyteachingagency.com/rating_images';
//

    for (var i = 0; i < rmtaelement.length; i++) {

        var id = rmtaelement[i].dataset.agency;
        var widget_type = rmtaelement[i].dataset.type;

        if (widget_type == 'banner') {
            var url_image = $image_url + '/rmta_rating_widget_banner_'+id+'.png';
        } else {
            var url_image = $image_url + '/rmta_rating_widget_'+id+'.png';
        }

        var agency_url = 'https://ratemyteachingagency.com/?p='+id;

        var img = document.createElement("img");
        var a = document.createElement("a");
        a.setAttribute("href", agency_url)
        a.setAttribute("target", '_blank')
        a.appendChild(img)
        rmtaelement[i].appendChild(a);
        img.src = url_image;
        img.alt = 'Rate My Teaching Agency Ratings';              

    }

});

function ready(callback){
    // in case the document is already rendered
    if (document.readyState!='loading') callback();
    // modern browsers
    else if (document.addEventListener) document.addEventListener('DOMContentLoaded', callback);
    // IE <= 8
    else document.attachEvent('onreadystatechange', function(){
        if (document.readyState=='complete') callback();
    });
}