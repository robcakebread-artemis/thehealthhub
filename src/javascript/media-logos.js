function media_logos(logos) {
	// Generate 6 items //
	
	if ( jQuery(window).width() > 769 ) {
		var cnt = 8, count = 7, imgCount = 7;

	} else {
		var cnt = 3, count = 2, imgCount = 2;
	}
	
	//var cnt = 12, count = 11, imgCount = 11;
	//populate media logo area with div markup and img src, but logos not added yet
	var i;
	for (i = 0; i < cnt; ++i) {
	  jQuery("#list-logos").append('<div class="col logo-item"><img src="" alt=""></a>');
	}

	// Shuffle function //
	function shuffle(o) {
	  for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
	  return o;
	};

	// get all logos shuffled up
	
	logos = shuffle(logos);
	
	//alert ("logos=" + logos);

	// populate each img src with a logo
	jQuery('.logo-item img').each(function(i) {
	  jQuery(this).attr('src', logos[i]);
	});

	var imgs;

	function getImgs() {
	  imgs = shuffle(jQuery(".logo-item img"));
	}
	
	// this function returns any images that are not currently assigned to an img src
	function getSpareImgs() {
		var currimgs = new Array();
		jQuery('.logo-item img').each(function(i) {
		  currimgs[i] = jQuery(this).attr('src');
		});		
		var difference = jQuery(logos).not(currimgs).get();
		
		return difference;
	}
	
	var diff;
	
	// Change image //
	setInterval(function() {
	  diff = getSpareImgs();
	  count = (count + 1) % diff.length;
	  imgCount = (imgCount + 1) % cnt;
	  if (imgCount == 0) getImgs();
	  jQuery(imgs[imgCount]).fadeOut(600, function() {
		jQuery(this).attr('src', diff[count]).fadeIn(600);
	  });
	}, 3000);		
	
}	