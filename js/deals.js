jQuery(document).ready(function($){
		
	if($('section.deals').length) {
		//Ajax loop for filtering
		var loading = false;
		var $dealsContent = $('.deals_search_results');
		var dealTypes = new Array();
		var dealTowns = new Array();
		var dealPage = 1;
		var dealStart = null;
		var dealEnd = null;
		var excludedDeals = new Array();
		var deal_filter_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_deals_by_type", startdate: dealStart, enddate: dealEnd, types: dealTypes, towns: dealTowns, paged: dealPage, excluded_posts: excludedDeals},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(dealPage == 1) {
						$dealsContent.empty();
						$dealsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					} else {
						$('.deals_search_results .large_blue_border_button').remove();
						$dealsContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
						if(dealPage == 1) {
		                    $dealsContent.hide(); 
		                    $dealsContent.append($data);  
		                    $dealsContent.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    } else {
		                    $data.hide();
		                    $dealsContent.find('ul').append($data);
		                    $data.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    }
	                    dealPage++;
	                } else {  
	                    $("#temp_load").remove();
	                } 
	                loading = false;
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		
		function get_deal_filters() {
			if(!loading) {
				dealTypes = new Array();
				dealTowns = new Array();
				
				$('.filter_sidebar .deal_type_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						dealTypes.push($(this).attr('data-taxonomy'));
					}
				});
				
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						dealTowns.push($(this).attr('data-taxonomy'));
					}
				});
				
				dealStart = $('#start_date').val().split(' ')[1];
				dealEnd = $('#end_date').val().split(' ')[1];
	
				var startTime = new Date(dealStart);
				var endTime = new Date(dealEnd);
				
				if(endTime < startTime) {
					$('#end_date').val($('#start_date').val());
					dealEnd = dealStart;
				}
				
				dealPage = 1;
				
				if($(window).width() <= 768) {
					$('html, body').animate({
						scrollTop: $('.deals_search_results').offset().top
					}, 2000);
				}
				
				deal_filter_search();
			}
		}
		
		var dealEndDate = $('#end_date').val();
			
		$('#start_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: new Date(), onSelect: function(dateText) { if(!$('.deals .filter_sidebar').hasClass('mobile_filter')) { get_deal_filters(); } }});
		$('#end_date').datepicker({dateFormat: 'D mm/dd/yy', defaultDate: dealEndDate, onSelect: function(dateText) { if(!$('.deals .filter_sidebar').hasClass('mobile_filter')) { get_deal_filters(); } }});
			
		get_deal_filters();
		
		$('.deals .filter_sidebar .filter_section h3').click(function(e) {
			if($(this).siblings('.deals_calendar').length) {
				if($(this).siblings('.deals_calendar').css('display') == 'none') {
					$(this).siblings('.deals_calendar').slideDown();
					$(this).addClass('filter_open');
				} else {
					$(this).siblings('.deals_calendar').slideUp();
					$(this).removeClass('filter_open');
				}
			} else {
				if($(this).siblings('ul').css('display') == 'none') {
					$(this).siblings('ul').slideDown();
					$(this).addClass('filter_open');
				} else {
					$(this).siblings('ul').slideUp();
					$(this).removeClass('filter_open');
				}
			}
		});
		
		$('.deals .filter_sidebar .filter_section ul li a').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				if($(this).hasClass('filtered')) {
					$(this).removeClass('filtered');
				} else {
					$(this).addClass('filtered');
				}
				
				if(!$('.deals .filter_sidebar').hasClass('mobile_filter')) {
					get_deal_filters();
				}
			}
		});
		
		$('.deals .filter_sidebar .town_filter .clear_filters').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).removeClass('filtered');
				});
				
				get_deal_filters();
			}
		});
		
		$('.deals .filter_sidebar .town_filter .select_all').click(function(e) {
			e.preventDefault();
			
			if(!loading) {
				console.log('Select All');
				$('.filter_sidebar .town_filter ul li a').each(function(e) {
					$(this).addClass('filtered');
				});
				
				get_deal_filters();
			}
		});
		
		$('.deals_search_results .load_more').live('click', function(e) {
			e.preventDefault();
			
			excludedDeals = new Array();
			$('.deals_search_results ul li.deal_result').each(function(e) {
				var post_id = $(this).attr('data-post_id');
				if(post_id.length) {
					excludedDeals.push(post_id);
				}
			});
			
			deal_filter_search();
		});
		
		$('.deals_search_results .mobile_filter_button').live('click', function(e) {
			e.preventDefault();
			
			toggleDealsSidebar(false, 'mobile');
		});
		
		$('.deals .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			toggleDealsSidebar(true, 'mobile');
		});
		
		$('.deals .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			get_deal_filters();
			
			toggleDealsSidebar(true, 'mobile');
		});
	
		$(window).resize(function(e) {
			if($(window).width() <= 768) {
				toggleDealsSidebar(true, 'mobile');
			} else {
				toggleDealsSidebar(false, 'desktop');
			}
		});
	
		function toggleDealsSidebar(hidden, size) {
			if(hidden) {
				$('.deals .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('.deals .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('.deals .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('.deals .filter_sidebar').addClass('mobile_filter');
			}
		}
	}
});