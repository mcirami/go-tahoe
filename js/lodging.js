jQuery(document).ready(function($){
		
	if($('.lodging_listings').length) {
		
		var map;
		var mapLatLng;
		
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
			var firstLatLong = $('.lodging_search_results .listing_result:first-child').attr('data-latlong');
			firstLatLong = firstLatLong.replace('[', '').replace(']', '');
			firstLatLong = firstLatLong.split(',');
			mapLatLng = new google.maps.LatLng(firstLatLong[0], firstLatLong[1]);
			
			function initialize() {
				var mapProp = {
			    	center: mapLatLng,
					zoom: 11,
					mapTypeId: google.maps.MapTypeId.ROADMAP
			  	};
			  	
			  	map = new google.maps.Map(document.getElementById("lodgingMap"),mapProp);
			  	
			  	var marker;
			  	var infowindow;
							      
				infowindow = new google.maps.InfoWindow({
					content: '...'
			  	});
			  
			  	
			  	function setMarkers(map, marker) {
				  	var markerArray = new Array();
				  	var markerTitleArray = new Array();
				  	var markerLodgingTypeArray = new Array();
				  	var markerAddressArray = new Array();
				  	var markerLinkArray = new Array();
				  	$('.lodging_search_results .listing_result').each(function(e) {
				  		markerArray.push($(this).attr('data-latlong'));
				  		markerTitleArray.push($(this).find('.listing_result_title').text());
				  		markerLodgingTypeArray.push($(this).attr('data-lodging_type'));
				  		markerAddressArray.push($(this).children('.result_content').children('p').text());
				  		markerLinkArray.push($(this).find('.view_details').attr('href'));
					});
					
					//console.log(markerTitleArray);
					//console.log(markerLodgingTypeArray);

			        for (var i = 0; i < markerArray.length; i++) {
			            var sites = markerArray[i];
			            sites = sites.replace('[', '').replace(']', '');
			            sites = sites.split(',');
			            var siteLatLng = new google.maps.LatLng(sites[0], sites[1]);
			            
			            
			            
			            var lodgingTitle = '';
			            if(markerTitleArray.length > i) {
			            	lodgingTitle = markerTitleArray[i];
			            }
			            
			            var lodgingType = '';
			            if(markerLodgingTypeArray.length > i) {
			            	lodgingType = markerLodgingTypeArray[i];
			            }
			            
			            var siteLink = '';
			            if(markerLinkArray.length > i) {
				            siteLink = markerLinkArray[i];
			            }
			            
			            var address = '';
			            if(markerAddressArray.length > i) {
			            	address = '<div id="content">'+
								      '<div id="siteNotice">'+
								      '</div>'+
								      '<h1 id="firstHeading" class="firstHeading">'+ lodgingTitle +'</h1>'+
								      '<div id="bodyContent">'+
								      '<p>'+ markerAddressArray[i] +'</p>' + '<a href="'+ siteLink + '"> View Details </a>' + '</div>' + '</div>';
			            }
			            
			            if(lodgingType == 'none') {
				            marker = new google.maps.Marker({
				                position: siteLatLng,
				                map: map,
				                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_resort.png',
						    	labelContent: lodgingTitle,
						    	labelAnchor: new google.maps.Point(60, 20),
						    	labelClass: "lodgingMapIconLabel",
						    	title: lodgingTitle,
						    	address: address
				            });
			            } else {
				            marker = new google.maps.Marker({
				                position: siteLatLng,
				                map: map,
				                icon: 'http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/badge_'+lodgingType+'.png',
						    	labelContent: lodgingTitle,
						    	labelAnchor: new google.maps.Point(60, 20),
						    	labelClass: "lodgingMapIconLabel",
						    	title: lodgingTitle,
						    	address: address
				            });
			            }
			            google.maps.event.addListener(marker, 'click', function() {
					        infowindow.setContent(this.address);
							infowindow.open(map, this);
						});
			        }
		        }
			  	
			  	setMarkers(map, marker);
			  	
			}
			initialize();
		}
		
		//Ajax loop for filtering
		var loading = false;
		var $lodgingContent = $('.lodging_search_results');
		var lodgingTypes = new Array();
		var lodgingTowns = new Array();
		var lodgingAmenities = new Array();
		var excludedLodging = new Array();
		var lodgingPage = 1;
		var filter_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_lodging_by_type", types: lodgingTypes, towns: lodgingTowns, amenities: lodgingAmenities, paged: lodgingPage, excluded_posts: excludedLodging},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(lodgingPage == 1) {
						$lodgingContent.empty();
						$lodgingContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					} else {
						$('.lodging_search_results .large_blue_border_button').remove();
						$lodgingContent.find('ul').append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
						if(lodgingPage == 1) {
		                    $lodgingContent.hide(); 
		                    $lodgingContent.append($data);  
		                    $lodgingContent.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    } else {
		                    $lodgingContent.find('ul').append($data);  
		                    $data.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    }
	                    lodgingPage++;
	                    loadMapMarkers();
	                    
	                    $('.tooltip').tooltipster({
						    theme: 'gotahoe-tooltip',
						    position: 'bottom'
					    });
					    
					    $('.full_list_tooltip').tooltipster({
						    theme: 'gotahoe-tooltip',
						    position: 'bottom',
						    contentAsHTML: true,
					    });
	                } else {  
	                    $("#temp_load").remove();
	                    loading = false;
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		$('.full_list_tooltip').live(
			"click",
			function() {
				return false;
			}
		);
		
		function get_lodging_filters() {
			if(!loading) {
				lodgingTypes = new Array();
				lodgingTowns = new Array();
				lodgingAmenities = new Array();
				
				$('.filter_sidebar .type_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						lodgingTypes.push($(this).attr('data-taxonomy'));
					}
				});
				
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						lodgingTowns.push($(this).attr('data-taxonomy'));
					}
				});
				
				$('.filter_sidebar .amenity_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						lodgingAmenities.push($(this).attr('data-taxonomy'));
					}
				});
				
				lodgingPage = 1;
				excludedLodging = new Array();
				
				if($(window).width() <= 768) {
					$('html, body').animate({
						scrollTop: $('.lodging_search_results').offset().top
					}, 2000);
				}
				
				filter_search();
			}
		}
		
		get_lodging_filters();
		
		$('.lodging_listings .filter_sidebar .filter_section h3').click(function(e) {
			if($(this).siblings('ul').css('display') == 'none') {
				$(this).siblings('ul').slideDown();
				$(this).addClass('filter_open');
			} else {
				$(this).siblings('ul').slideUp();
				$(this).removeClass('filter_open');
			}
		});
		
		$('.lodging_listings .filter_sidebar .filter_section ul li a').click(function(e) {
			e.preventDefault();
					
			if(!loading) {
				if($(this).hasClass('filtered')) {
					$(this).removeClass('filtered');
				} else {
					$(this).addClass('filtered');
				}
				
				if(!$('.lodging_listings .filter_sidebar').hasClass('mobile_filter')) {
					get_lodging_filters();
				}
			}
		});
		
		$('.lodging_listings .filter_sidebar .town_filter .clear_filters').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).removeClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_listings .filter_sidebar .town_filter .select_all').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).addClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_listings .filter_sidebar .amenity_filter .clear_filters').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .amenity_filter ul li a').each(function(e) {
					$(this).removeClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_listings .filter_sidebar .amenity_filter .select_all').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .amenity_filter ul li a').each(function(e) {
					$(this).addClass('filtered');
				});
				
				get_lodging_filters();
			}
		});
		
		$('.lodging_search_results .load_more').live('click', function(e) {
			e.preventDefault();
			
			excludedLodging = new Array();
			$('.lodging_search_results .listing_result').each(function(e) {
				var post_id = $(this).attr('id');
				if(post_id.length) {
					post_id = post_id.split("listing_result_")[1];
					excludedLodging.push(post_id);
				}
			});
				
			filter_search();
		});
		
		$('.lodging_search_results .mobile_filter_button a').live('click', function(e) {
			e.preventDefault();
			
			toggleLodgingSidebar(false, 'mobile');
		});
		
		$('.lodging_listings .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			toggleLodgingSidebar(true, 'mobile');
		});
		
		$('.lodging_listings .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			get_lodging_filters();
			
			toggleLodgingSidebar(true, 'mobile');
		});
	
	
		$(window).resize(function(e) {
			if($(window).width() <= 855) {
				toggleLodgingSidebar(true, 'mobile');
			} else {
				toggleLodgingSidebar(false, 'desktop');
			}
		});
	
	
		function toggleLodgingSidebar(hidden, size) {
			if(hidden) {
				$('.lodging_listings .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('.lodging_listings .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('.lodging_listings .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('.lodging_listings .filter_sidebar').addClass('mobile_filter');
			}
		}
	}
});