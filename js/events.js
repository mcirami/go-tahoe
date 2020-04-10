jQuery(document).ready(function($){
	
	if($('section.events').length) {
		//Ajax loop for events landing
		var loading = false;
		var $eventsContent = $('.events_list');
		var eventFilter = 'date';
		var eventPage = 1;
		var eventStart = null;
		var eventEnd = null;
		var eventCat = $('.events_top').attr('data-category');
		var event_filter_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_events_by_type", startdate: eventStart, enddate: eventEnd, filterby: eventFilter, paged: eventPage, category: eventCat},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(eventPage == 1) {
						$eventsContent.empty();
						$eventsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>');
					} else {
						$('.events_list .large_blue_border_button').remove();
						$eventsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>');
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $eventsContent.hide(); 
	                    $eventsContent.append($data);  
	                    $eventsContent.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        loading = false;  
	                        var results_number = $('#events_count').val();
	                        console.log(eventPage);
	                        if(eventPage == 1) {
	                        	$('.sort_container .results_number').text(results_number+" Results");
	                        } else {
		                        var currentResults = $('.sort_container .results_number').text().split(' ')[0];
		                        results_number = parseInt(results_number) + parseInt(currentResults);
		                        $('.sort_container .results_number').text(results_number+" Results");
	                        }
	                        $('#events_count').remove();
	                        eventPage++;
	                    });
	                } else {  
	                    $("#temp_load").remove();
	                } 
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
	
		function getEventFilters() {
			eventPage = 1;
			
			eventStart = $('#start_date').val().split(' ')[1];
			eventEnd = $('#end_date').val().split(' ')[1];
	
			var startTime = new Date(eventStart);
			var endTime = new Date(eventEnd);
			
			if(endTime < startTime) {
				$('#end_date').val($('#start_date').val());
				eventEnd = eventStart;
			}
			
			if($(window).width() <= 768) {
				$('html, body').animate({
					scrollTop: $('.sort_container').offset().top
				}, 2000);
			}
			
			event_filter_search();
		}
	
	
		$('#start_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: new Date(), onSelect: function(dateText) { if(!$('section.events .filter_sidebar').hasClass('mobile_filter')) { getEventFilters(); } }});
		$('#end_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: +14, onSelect: function(dateText) { if(!$('section.events .filter_sidebar').hasClass('mobile_filter')) { getEventFilters(); } }});
		
		getEventFilters();
		
		$('section.events .mobile_filter_button').live('click', function(e) {
			e.preventDefault();
			
			toggleEventsSidebar(false, 'mobile');
		});
		
		$('section.events .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			toggleEventsSidebar(true, 'mobile');
		});
		
		$('section.events .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			getEventFilters();
			
			toggleEventsSidebar(true, 'mobile');
		});
		
		
		$('.events_list .load_more').live('click', function(e) {
			e.preventDefault();
				
			event_filter_search();
		});
		
		
		$(window).resize(function(e) {
			if($(window).width() <= 640) {
				toggleEventsSidebar(true, 'mobile');
			} else {
				toggleEventsSidebar(false, 'desktop');
			}
		});
	
	
		function toggleEventsSidebar(hidden, size) {
			if(hidden) {
				$('section.events .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('section.events .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('section.events .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('section.events .filter_sidebar').addClass('mobile_filter');
			}
		}
	}
});