<?php


	$id = substr( sha1( "Google Map" . time() ), rand( 2, 10 ), rand( 5, 8 ) );
    $address = get_field('map_address');
    $title =  ($title ? $title : get_field('map_overlay_title'));
    $height = '500px';
    $zoom = '16';
    $icon = '';
    //$place = get_field('map_address');

    // enqueue script
    $apikey = (get_field('options_google_maps_api_key','options') ? 'key='.get_field('options_google_maps_api_key','options').'&amp;' : '');
    if ($place != '') :
		wp_enqueue_script( 'google-maps', "https://maps.googleapis.com/maps/api/js?{$apikey}libraries=places", array(), '1.0', true );    
    else:
		wp_enqueue_script( 'google-maps', "https://maps.googleapis.com/maps/api/js?{$apikey}", array(), '1.0', true );    
    endif;
    
    if ($place != '') :
      ob_start();
        $maptitle = $title;
		
        ?>
        <div class='map' style='height:<?= $height; ?>; margin-bottom: 1.6842em' id='map-<?php echo $id ?>'></div>   
		<script type="text/javascript">
			
		</script>
        <script type="text/javascript">
            var map<?php echo $id ?>;
            window.addEventListener('load', function () {
                map<?php echo $id ?> = new google.maps.Map(document.getElementById('map-<?php echo $id ?>'), {
                center: {lat: 55.3781, lng: -7.9266374},
                zoom: 12
              });

              // Search for our place
              var request<?php echo $id ?> = {
                location: map<?php echo $id ?>.getCenter(),
                radius: '500',
                query: '<?= $place; ?>'
              };
              var service<?php echo $id ?> = new google.maps.places.PlacesService(map<?php echo $id ?>);
              service<?php echo $id ?>.textSearch(request<?php echo $id ?>, callback<?php echo $id ?>);

				// Checks that the PlacesServiceStatus is OK, and adds a marker
				// using the place ID and location from the PlacesService.
				function callback<?php echo $id ?>(results, status) {
				  if (status == google.maps.places.PlacesServiceStatus.OK) {
					var marker<?php echo $id ?> = new google.maps.Marker({
					  map: map<?php echo $id ?>,
					  place: {
						placeId: results[0].place_id,
						location: results[0].geometry.location
					  }
					});
					var infoWindow<?php echo $id ?> = new google.maps.InfoWindow({
						content: '<?= $maptitle; ?>'
					});               
					infoWindow<?php echo $id ?>.open(map<?php echo $id ?>, marker<?php echo $id ?>);                       
					//map.setCenter(marker.getPosition());
					map<?php echo $id ?>.setCenter(results[0].geometry.location);
				  }
				}            
			}, false);
            
        </script>
    <?php    
    elseif ($address != '') :
        ob_start();
        $maptitle = $title;
               
        ?>
        <div class='map' style='height:<?= $height; ?>; margin-bottom: 1.6842em' id='map-<?php echo $id ?>'></div>     
        <script>
            window.addEventListener('load', function () {
              var map = new google.maps.Map(document.getElementById('map-<?php echo $id ?>'), {
                zoom: <?= $zoom; ?>,
                center: {lat: 55.3781, lng: -7.9266374},
                styles: [
                        {
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                            {
                                "visibility": "off"
                            }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#616161"
                            }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#bdbdbd"
                            }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#757575"
                            }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#ffffff"
                            }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#757575"
                            }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#dadada"
                            }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#616161"
                            }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                            ]
                        },
                        {
                            "featureType": "transit.station",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                            {
                                "color": "#c9c9c9"
                            }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                            ]
                        }
                        ]
              });
              var geocoder = new google.maps.Geocoder();
              var address = '<?= $address; ?>';
              console.log (address);
              geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    console.log('all ok');
                  map.setCenter(results[0].geometry.location);
                  var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: '/wp-content/themes/cftm/img/map-pin.png',
                  });
                var infoWindow = new google.maps.InfoWindow({
                    content: '<?= $maptitle; ?>'
                });               
                infoWindow.open(map, marker);                       
                //map.setCenter(marker.getPosition());
                //map.setCenter(results[0].geometry.location);                  
                  
                } else {
                    console.log('map error');
                  //alert('Geocode was not successful for the following reason: ' + status);
                }
              });
            }, false);
        </script>
    <?php
    else :
        
        for ($i = 0; $i < count($lat); ++$i) {
            if ($i != 0) {
                $arrayStr .= ',';
            }
            $arrayStr .= "['".$title[$i]."',".$lat[$i].",".$lng[$i].']';
        }
       
        $id = substr( sha1( "Google Map" . time() ), rand( 2, 10 ), rand( 5, 8 ) );
        ob_start();
        ?>
        <div class='map'  id='map-<?php echo $id ?>'></div> 

        <script type='text/javascript'>
        window.addEventListener('load', function () {
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = { zoom: <?= $zoom; ?> };
            var map = new google.maps.Map(document.getElementById('map-<?php echo $id ?>'), mapOptions);
          
          var markers = [<?php echo $arrayStr ?>]
          
            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(), marker, i;
            
            // Loop through our array of markers & place each one on the map  
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]<?= ($icon == '' ? '' : ',icon: "'.$icon.'"'); ?>
                });
                
                // Allow each marker to have an info window    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(markers[i][0]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));

                // Automatically center the map fitting all markers on the screen
                map.fitBounds(bounds);
            }
        }, false);
        </script>
	<?php
    endif; //end of whether address or lat/lng
    $output = ob_get_clean();
    
	echo $output;
