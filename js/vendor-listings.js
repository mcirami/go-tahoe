jQuery(document).ready(function($){
		
	//Ajax loop for filtering
	var loadingResults = false;
	var listingContent = $('.vendor_listing_results');
	var listingType = $('#vendor_listing_type').val();
	var listingPage = 1;
	var excludedListings = new Array();
	var getResults = function() {
		$.ajax({
			type		: "POST",
			data 		: {action: "filter_vendor_listing_by_type", paged: listingPage, listing_type: listingType, excluded_posts: excludedListings},
			dataType	: "html",
			url			: ajaxObject.ajaxurl,
			beforeSend	: function() {
				if(listingPage == 1) {
					listingContent.empty();
					listingContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
				} else {
					$('.vendor_listing_results .large_blue_border_button').remove();
					listingContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
				}
				loadingResults = true;
			},
			success		: function(data) {
				result = $(data);
				if(result.length){  
					if(listingPage == 1) {
						listingContent.hide(); 
						listingContent.append(result);  
						listingContent.fadeIn(500, function(){
							$("#temp_load").remove();  
							loadingResults = false;  
	                    });
                    } else {
                    	$('.large_blue_border_button').remove();
	                    result.hide().fadeIn(500, function(){
		                    $("#temp_load").remove();  
	                    	loadingResults = false;  
	                    });
                    	listingContent.find('ul').append(result);
                    }
					listingPage++;
                }
			},
			error		: function(jqXHR, textStatus, errorThrown) {
				$("#temp_load").remove();
				alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});
	};
	
	if(listingContent.length) {
		if(!loadingResults) {
			listingPage = 1;
			getResults();
		}
	}

	$('.vendor_listing_results .load_more').live('click', function(e) {
		e.preventDefault();
		
		
		excludedListings = new Array();
		$('.vendor_listing_results ul li.listing_info').each(function(e) {
			var post_id = $(this).attr('data-post_id');
			if(post_id.length) {
				excludedListings.push(post_id);
			}
		});
		
		getResults();
	});
});