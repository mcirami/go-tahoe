jQuery(document).ready(function($){
		
	if($('.blog.wrapper').length) {
		
		//Ajax loop for filtering
		var blogLoading = false;
		var $blogContent = $('.blog.wrapper .content');
		var blogPage = 2;
		
		var load_more_blog = function() {
			$.ajax({
				type		: "GET",
				data		: {action: "load_more_blog_results", paged: blogPage},
				dataType	: "html",
				url			: ajaxObject.ajaxurl,
				beforeSend	: function() {
					$('.blog.wrapper .content .large_blue_border_button').remove();
					$blogContent.append('<div id="temp_load" style="text-align:center; margin: 10px 0; width: 100%;"><img style="display: inline-block;" src="http://' + top.location.host.toString() + '/wp-content/themes/gotahoe/images/ajax-loader.gif" /></div>'); 
					blogLoading = true;
				},
				success		: function(data) {
					$data = $(data);
					if($data.length){  
	                    $blogContent.append($data);  
	                    $data.fadeIn(500, function(){  
	                        $("#temp_load").remove();  
	                        blogLoading = false;  
	                    });
	                    blogPage++;
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
		
		$('.blog.wrapper .load_more').live('click', function(e) {
			e.preventDefault();
			load_more_blog();
		});
	}
});