jQuery(function($){
	
	$('body').on('click', '#aws_loadmore', function(){
		$.ajax({
			url : aws_loadmore_params.ajaxurl,
			data : {
				'action': 'loadmore',
				'query': aws_loadmore_params.posts,
				'page' : aws_loadmore_params.current_page,
                'first_page' : aws_loadmore_params.first_page, // here is the new parameter
                'post_type' : aws_loadmore_params.post_type,
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('#aws_loadmore').text('Loading...'); 
			},
			success : function( data ){
 
				$('#aws_loadmore').remove(); // remove button
				$('#aws_pagination').before(data).remove(); // add new posts and remove pagination links
				aws_loadmore_params.current_page++;
 
 
			}
		});
		return false;
	});
	
});	