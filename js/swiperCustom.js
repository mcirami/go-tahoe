jQuery(document).ready(function($){
	
	$('.swiper-container').each(function(){
		var slideIndex;
		var slideId = $(this).attr("id");
		var limit = $('#'+slideId).siblings('.slide_count').children('.slides_num').children('.slide_upper').html();
		var mySwiper = new Swiper($('#'+slideId)[0], {
		    mode:'horizontal',
		    loop: true,
		    calculateHeight: true,
		    onSlideChangeEnd : function(swiper, direction){
			    slideIndex = swiper.activeIndex;
			    if(slideIndex > limit){
				    slideIndex = 1;
			    } else if(slideIndex < 1){
				    slideIndex = limit;
			    }
			    $('#'+slideId).siblings('.slide_count').children('.slides_num').children('span').html(slideIndex);
			}
		});
		
		$('#'+slideId).siblings('.swiper_nav').children('.swiper_left').click(function(){
			mySwiper.swipePrev();
		});
		
		$('#'+slideId).siblings('.swiper_nav').children('.swiper_right').click(function(){
			mySwiper.swipeNext();
		});
	});
});