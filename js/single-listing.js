jQuery(document).ready(function($){
		
	if($('.single_listing').length) {
		
		var map;
		var mapLatLng;
		var lodgingType;
		
		$('.view_map').live('click', function(e) {
			e.preventDefault();
			$('.map_popup').css('display', 'block');
			google.maps.event.trigger(map, 'resize');
			map.setCenter(mapLatLng);
		});
		
		$('.map_close').click(function(e) {
			e.preventDefault();
			$('.map_popup').css('display', 'none');
		});
		
		function loadMapMarkers() {
			lodgingType = $('#lodging_type').val();
			var lodgingTitle = $('.content > h1').text();
			
			var firstLatLong = $('#latlong').val();
			firstLatLong = firstLatLong.replace('[', '').replace(']', '');
			firstLatLong = firstLatLong.split(',');
			mapLatLng = new google.maps.LatLng(firstLatLong[0], firstLatLong[1]);
			
			function initialize() {
				var mapProp = {
				    	center: mapLatLng,
						zoom: 10,
						mapTypeId: google.maps.MapTypeId.ROADMAP
				  	};
			  	
			  	var marker;
			  	
			  	function setMarkers(map, marker) {
				  	if(lodgingType == 'none') {
			            marker = new google.maps.Marker({
			                position: mapLatLng,
			                map: map,
			                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_resort.png',
					    	labelContent: lodgingTitle,
					    	labelAnchor: new google.maps.Point(60, 20),
					    	labelClass: "lodgingMapIconLabel",
					    	title: lodgingTitle,
			            });
		            } else {
			            marker = new google.maps.Marker({
			                position: mapLatLng,
			                map: map,
			                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_'+lodgingType+'.png',
					    	labelContent: lodgingTitle,
					    	labelAnchor: new google.maps.Point(60, 20),
					    	labelClass: "lodgingMapIconLabel",
					    	title: lodgingTitle,
			            });
		            }
		        }
			  	
			  	map = new google.maps.Map(document.getElementById("lodgingMap"),mapProp);
			  	
			  	setMarkers(map, marker);
			}
			initialize();
		}
		
		loadMapMarkers();
	}
	
});