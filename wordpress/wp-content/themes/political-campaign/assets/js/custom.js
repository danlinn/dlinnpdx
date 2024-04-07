function political_campaign_menu_open_nav() {
	window.political_campaign_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function political_campaign_menu_close_nav() {
	window.political_campaign_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.political_campaign_currentfocus=null;
  	political_campaign_checkfocusdElement();
	var political_campaign_body = document.querySelector('body');
	political_campaign_body.addEventListener('keyup', political_campaign_check_tab_press);
	var political_campaign_gotoHome = false;
	var political_campaign_gotoClose = false;
	window.political_campaign_responsiveMenu=false;
 	function political_campaign_checkfocusdElement(){
	 	if(window.political_campaign_currentfocus=document.activeElement.className){
		 	window.political_campaign_currentfocus=document.activeElement.className;
	 	}
 	}
 	function political_campaign_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.political_campaign_responsiveMenu){
			if (!e.shiftKey) {
				if(political_campaign_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				political_campaign_gotoHome = true;
			} else {
				political_campaign_gotoHome = false;
			}

		}else{

			if(window.political_campaign_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.political_campaign_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.political_campaign_responsiveMenu){
				if(political_campaign_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					political_campaign_gotoClose = true;
				} else {
					political_campaign_gotoClose = false;
				}
			
			}else{

			if(window.political_campaign_responsiveMenu){
			}}}}
		}
	 	political_campaign_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery('document').ready(function(){
  var owl = jQuery('#Campaign-princi-section .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: true,
    dots:false,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});