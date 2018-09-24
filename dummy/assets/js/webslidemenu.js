
 document.addEventListener("touchstart", function() {},false);
$(function() {
	
	//Open Offcanvas
	$('#wsnavtoggle').click(function () {
		$('.wsmenucontainer').toggleClass('wsoffcanvasopener');
	});
	//END Open Offcanvas
	
	
	//Overlap BG
	$('.overlapblackbg').click(function () {
	  $('.wsmenucontainer').removeClass('wsoffcanvasopener');
	});
	//END Overlap BG
	

	//Mobile Toggles
	$('.wsmenu-list> li').has('.wsmenu-submenu').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	$('.wsmenu-list > li').has('.wsshoptabing').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	$('.wsmenu-list > li').has('.megamenu').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');

	$('.wsmenu-click').click(function(){
		$(this).toggleClass('ws-activearrow').parent().siblings().children().removeClass('ws-activearrow');
		$(".wsmenu-submenu, .wsshoptabing, .megamenu").not($(this).siblings('.wsmenu-submenu, .wsshoptabing, .megamenu')).slideUp('slow');
		$(this).siblings('.wsmenu-submenu').slideToggle('slow');
		$(this).siblings('.wsshoptabing').slideToggle('slow');
		$(this).siblings('.megamenu').slideToggle('slow');
		
	});
	
	$('.wstabitem > li').has('.wstitemright').prepend('<span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	$('.wstabitem02 > li').has('.wstbrandbottom').prepend('<span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	
	$('.wsmenu-click02').click(function(){
		$(this).toggleClass('ws-activearrow').parent().siblings().children().removeClass('ws-activearrow');
		$(this).siblings('.wstitemright').slideToggle('slow');
		$(this).siblings('.wstbrandbottom').slideToggle('slow');
	});
	
	//END Mobile Toggles 
	
});
	
	
	//Adding Class in Tabing Links
	$(window).ready(function(){
	
	$(".wsshoptabing.wtsdepartmentmenu > .wsshopwp > .wstabitem > li").on('mouseenter', function() {
        $(this).addClass("wsshoplink-active").siblings(this).removeClass("wsshoplink-active");
    });
	
	$(".wsshoptabing.wtsbrandmenu > .wsshoptabingwp > .wstabitem02 > li").on('mouseenter', function() {
        $(this).addClass("wsshoplink-active").siblings(this).removeClass("wsshoplink-active");
    });

	//END Adding Class in Tabing Links
	
});


 
	setmenuheight();
	$(window).bind("load resize", function() {
			
		var w_height = $( window ).width();
			if(w_height <= 919){
				$(".wsshopwp").css('height','100%');
				$(".wstitemright").css('height','100%');  
			} else {
				setmenuheight();
			}
		});
 
 
	function setmenuheight() {
		var TabgetHeight = 1;
		$(".wstabitem > li").each(function() {
			var forHeight = $(this).find(".wstitemright").innerHeight();      
			TabgetHeight = forHeight > TabgetHeight ? forHeight : TabgetHeight;
			$(this).find(".wstitemright").css('height','auto');
		});
		$(".wsshopwp").css('height',TabgetHeight+15);      
	}



 

$(document).ready(function($){
	function removeStyles() {
    if ($(window).width() >= 919){  
        $('.wsshoptabing, .wstitemright, .wstbrandbottom').css({
            'display': '',
        });
    }  
	}
	removeStyles();
	$(window).resize(removeStyles);
});

