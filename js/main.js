jQuery(document).ready(function($){

	if( location.hostname.indexOf("red8dev.com") == -1 && location.hostname.indexOf("gotahoenorth.com") == -1 ) {
		loadReload();
		$('body').css('opacity', '1');
	}


    $('#gform_submit_button_3').attr('value', '');
    
    var heroSwiper = new Swiper('.hero-swiper-container', {
	    mode: 'horizontal',
	    loop: true,
	    calculateHeight: true,
	    roundLength: true,
	    pagination: '.hero_pagination',
	    paginationClickable: true,
	    autoplay: 5000,
	    preloadImages: false,
	    lazyLoading: true,
	    lazyLoadingOnTransitionStart: true
    });
    
    var windowWidth = $(window).width();
    
    $(window).resize(function(e) {
	   windowWidth = $(window).width();
	   var imageSize = $('.swiper-slide-active .hero_slide_image img').css('height');
	   $('swiper-slide, .swiper-wrapper').css('height', imageSize); 
    });
    
    
	$('.slide_menu, #global_header .mobile_menu_button img').click(function(e){
	    e.preventDefault();
	    if($('.slide_menu').hasClass('menu_open') == false) {
		     $('.site_wrap').animate({
			   right: '235', 
		    }, 500, function(){
			    $('.slide_menu').addClass('menu_open');
			    $('html, body').css('overflow-y', 'hidden');
		    });
		    $('.slide_nav').animate({
			   right: '0', 
		    }, 500);
	    } else {
		    $('.site_wrap').animate({
			   right: '0', 
		    }, 500, function(){
			    $('.slide_menu').removeClass('menu_open');
			    $('html, body').css('overflow-y', 'scroll');
		    });
		    $('.slide_nav').animate({
			   right: '-235', 
		    }, 500);
		    $('[class*="sub_menu_page"]').animate({
				right: '-235'
			}, 500);
		}
	});
	
	var pageNum;
	
	$('.slide_nav li.has_sub > span').click(function(){
		pageNum = $(this).attr('data-menu-link');
		$('.sub_menu_page-' + pageNum).css('display', 'block');
		$('.sub_menu_page-' + pageNum).animate({
			right: '0'
		}, 500);
	});
	
	$('.slide_nav li.has_sub_dropdown span').click(function(){
		$(this).parent().removeClass('dropdown_open');
		if($(this).siblings('.sub_menu_dropdown').css('display') == 'none') {
			$(this).parent().addClass('dropdown_open');
			$(this).siblings('.sub_menu_dropdown').slideDown();
		} else {
			$(this).siblings('.sub_menu_dropdown').slideUp();
		}
	});
			
	$('.nav_close').click(function(){
		$('[class*="sub_menu_page"]').animate({
			right: '-235'
		}, 500);
		$('.slide_nav').animate({
			right: '-235'
		});
		$('.site_wrap').animate({
		   right: '0', 
	    }, 500, function(){
		    $('.slide_menu').removeClass('menu_open');
	    });
	    $('html, body').css('overflow-y', 'scroll');
		$('html, body').css('-ms-overflow-style', '-ms-autohiding-scrollbar');
	});
	
	$('.nav_back').click(function(){
		$(this).parent().animate({
			right: '-235'
		}, 500);
	});

	$('.tooltip').tooltipster({
	    theme: 'gotahoe-tooltip',
    });
    
    var alreadyLoaded = false;

	$('#filter_events').ddslick({
		onSelected: function (data) {
			if (alreadyLoaded === true && (data.selectedData.value != 'category-placeholder')) {
				window.location = data.selectedData.value;
			}
		}
	});

    $('#saved_venue').each(function(e) {
        var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#EventCountry').each(function(e) {
       var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#StateProvinceSelect').each(function(e) {
        var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#saved_organizer').each(function(e) {
        var selectID = $(this).attr('id');
        var selectName = $(this).attr('name');
        $('#'+selectID).ddslick({
            width: '100%',
            background: '#ffffff',
            onSelected: function(data){
                $('#'+selectID+' .dd-selected-value').attr('name', selectName);
            }
        });
    });

    $('#filter_events').click(function(e) {
		alreadyLoaded = true;
	});
	
	// Display/Hide share buttons on blog page
	$('.share_link').click(function(e){
		e.preventDefault();
		if($(this).parent().next().css('display') == "none"){
			$(this).parent().next().slideDown(500);
		} else
			$(this).parent().next().slideUp(500);
	});
	
	/*$('.acf-form').submit(function() {
		console.log("Submit ACF Form");
		return true;
	});
	
	$('#dr_update_form').submit(function() {
		console.log("Submit DR Form");
		return true;
	});
	
	
	$('.acf-form-submit .button').click(function(e) {
		e.preventDefault();
		
		$('#dr_update_form').trigger('submit');
		$('.acf-form').trigger('submit');
	});*/

    // This displays a scroll to top anchor
    var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
    //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
});