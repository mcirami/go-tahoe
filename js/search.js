jQuery(document).ready(function($){
		
	if($('.search_results').length) {
		
		//Ajax loop for filtering
		var searchLoading = false;
		var $searchContent = $('.search_results');
		var searchPage = 2;
		
		var load_more_search = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "load_more_search_results", paged: searchPage},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					$('.search_results .large_blue_border_button').remove();
					$searchContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					searchLoading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $searchContent.append($data);  
	                    $data.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        searchLoading = false;  
	                    });
	                    searchPage++;
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
		
		$('.search_page .search_results .load_more').live('click', function(e) {
			e.preventDefault();
			load_more_search();
		});
	}
});