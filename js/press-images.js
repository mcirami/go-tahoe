jQuery(document).ready(function($) {
	
	if($('.press_images').length) {
		
		var pressSeason = 'summer';
		var pressPage = 1;
		var loading = false;
		var $pressImagesContent = $('.press_images_results ul');
		var pressPageID = $('#press_image_page_id').val();

		var filter_press_images = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "filter_press_images_by_season", season: pressSeason, pageID: pressPageID},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					if(pressPage == 1) {
						$pressImagesContent.empty();
						$pressImagesContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					} else {
						$('.press_images_results .large_blue_border_button').remove();
						$pressImagesContent.find('ul').append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					}
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
						if(pressPage == 1) {
		                    $pressImagesContent.hide(); 
		                    $pressImagesContent.append($data);  
		                    $pressImagesContent.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    } else {
		                    $pressImagesContent.append($data);  
		                    $data.fadeIn(500, function(){  
		                        $("#temp_load").remove();  
		                        loading = false;  
		                    });
	                    }
	                    //pressPage++;
	                } else {  
	                    $("#temp_load").remove();
	                    loading = false;
	                } 
	                loading = false;
				},
				error		: function(jqXHR, textStatus, errorThrown) {
					$("#temp_load").remove();  
					alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
		};
		
		function get_press_filters() {
			if(!loading) {
				
				$('.filter_sidebar .season_filter ul li a').each(function(e) {
					if($(this).hasClass('filtered')) {
						pressSeason = $(this).attr('data-taxonomy');
					}
				});
				
				pressPage = 1;
				
				if($(window).width() <= 768) {
					$('html, body').animate({
						scrollTop: $('.press_images_results').offset().top
					}, 2000);
				}
				
				filter_press_images();
			}
		}
		
		get_press_filters();
		
		$('.press_images .filter_sidebar .filter_section h3').click(function(e) {
			if($(this).siblings('ul').css('display') == 'none') {
				$(this).siblings('ul').slideDown();
				$(this).addClass('filter_open');
			} else {
				$(this).siblings('ul').slideUp();
				$(this).removeClass('filter_open');
			}
		});
		
		$('.press_images .filter_sidebar .filter_section ul a').click(function(e) {
			e.preventDefault();
					
			if(!loading) {
				if(!$(this).hasClass('filtered')) {
					$('.press_images .filter_sidebar .filter_section ul .filtered').removeClass('filtered');
					$(this).addClass('filtered');
				
					if(!$('.press_images .filter_sidebar').hasClass('mobile_filter')) {
						get_press_filters();
					}
				}
			}
		});
		
		$('.press_images_results .load_more').live('click', function(e) {
			e.preventDefault();
			
			/*excludedLodging = new Array();
			$('.press_images_results .press_image').each(function(e) {
				var post_id = $(this).attr('id');
				if(post_id.length) {
					post_id = post_id.split("listing_result_")[1];
					excludedLodging.push(post_id);
				}
			});
				
			filter_search();*/
		});
		
		$('.press_images .mobile_filter_button').live('click', function(e) {
			e.preventDefault();
			
			togglePressImagesSidebar(false, 'mobile');
		});
		
		$('.press_images .filter_sidebar .mobile_filter_close a').click(function(e) {
			e.preventDefault();
			
			togglePressImagesSidebar(true, 'mobile');
		});
		
		$('.press_images .filter_sidebar .mobile_apply_filters a').click(function(e) {
			e.preventDefault();
			
			get_press_filters();
			
			togglePressImagesSidebar(true, 'mobile');
		});
	
	
		$(window).resize(function(e) {
			if($(window).width() <= 768) {
				togglePressImagesSidebar(true, 'mobile');
			} else {
				togglePressImagesSidebar(false, 'desktop');
			}
		});
	
	
		function togglePressImagesSidebar(hidden, size) {
			if(hidden) {
				$('.press_images .filter_sidebar').css('display', 'none');
				$('html, body').css('overflow-y', 'initial');
			} else {
				$('.press_images .filter_sidebar').css('display', 'block');
				$('html, body').css('overflow-y', 'hidden');
			}
			
			if(size == 'desktop') {
				$('html, body').css('overflow-y', 'initial');
				$('.press_images .filter_sidebar').removeClass('mobile_filter');
			} else {
				$('.press_images .filter_sidebar').addClass('mobile_filter');
			}
		}
		
		
		$('a.login_alert').live('click', function(e) {
			e.preventDefault();
			alert('Please login to view photo.');
		});
	}
});