jQuery(document).ready(function($){
	
	//Ajax loop for filtering
	var loadingSnowReport = false;
	var getReportByResortId = function(resortId) {
		$.ajax({
			type		: "POST",
			data 		: {action: "get_snow_report_ajax", resort_id: resortId},
			dataType	: "json",
			url			: ajaxObject.ajaxurl,
			beforeSend	: function() {
				loadingSnowReport = true;
			},
			success		: function(result) {

				if(result.success){
					$('.open_status').hide();
					$('.base_depth').hide();
					$('.snowfall').hide();
					$('.surface_condition').hide();
				
					$('.open_status').html(result.data.openStatus);	
					$('.base_depth').html(result.data.baseDepth + "&Prime;");	
					$('.snowfall').html(result.data.snowfall + "&Prime;");	
					$('.surface_condition').html(result.data.surfaceCondition);
					
					$('.open_status').fadeIn(500);
					$('.base_depth').fadeIn(500);
					$('.snowfall').fadeIn(500);
					$('.surface_condition').fadeIn(500);
					
					loadingSnowReport = false;
                } else {
                	alert('Error connecting to Snow Report provider');
                }
			},
			error		: function(result) {
				alert(result.data.message);
			}
		});
	};

	$('#resort_dropdown').ddslick({
		onSelected: function(){
			if(!loadingSnowReport) {
				resortId = $('#resort_dropdown .dd-selected-value').val();
				getReportByResortId(resortId);
			}
	    }
	});
});