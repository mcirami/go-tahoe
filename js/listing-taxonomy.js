jQuery(document).ready(function($){
		
	if($('.listing_taxonomy_page').length) {
		
		//Ajax loop for filtering
		var loading = false;
		var $listingTaxonomyContent = $('.listing_taxonomy_page .listing_results_container');
		var excludedListings = new Array();
		var listingPage = 2;
		var taxonomyName = $('#taxonomy_name').val();
		var taxonomyTerms = $('#taxonomy_terms').val();
		
		var load_more_listing_taxonomy = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "load_more_listing_taxonomy", paged: listingPage, excluded_posts: excludedListings, taxonomy_name: taxonomyName, taxonomy_terms: taxonomyTerms},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					$('.listing_results_container .large_blue_border_button').remove();
					$listingTaxonomyContent.find('ul').append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					loading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $listingTaxonomyContent.find('ul').append($data);  
	                    $data.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        loading = false;  
	                    });
	                    listingPage++;
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
		
		$('.listing_taxonomy_page .listing_results_container .load_more').live('click', function(e) {
			e.preventDefault();
			
			excludedListings = new Array();
			$('.listing_results_container .listing_result').each(function(e) {
				var post_id = $(this).attr('id');
				if(post_id.length) {
					post_id = post_id.split("listing_result_")[1];
					excludedListings.push(post_id);
				}
			});
		
			load_more_listing_taxonomy();
		});
	}
});