(function($) {
	"use strict";

	$( document ).ready(function() {
		$('.card-container #tab-napcard').click(function() {
			$('#doixu-content').hide();
			$('#card-content').show();
		});
		$('.card-container #tab-doixu').click(function() {
			$('#card-content').hide();
			$('#doixu-content').show();
		});
	});


	var videoPopup =  function() {
        $(".fancybox").on("click", function(){
            $.fancybox({
              href: this.href,
              type: $(this).data("type")
            }); // fancybox
            return false
        }); // on
    }; // Video Popup

    var tabServer = function() {
        $('.server-container').each(function() {
            $(this).children('.content-server').children().hide();
            $(this).children('.content-server').children().first().show();
            $(this).find('.menu-server').find('li').on('click', function(e) {
                var liActive = $(this).parent('.owl-item').index(),
                    contentActive = $(this).parent('.owl-item').siblings().children('li').removeClass('active').closest('.server-container').find('.content-server').children().eq(liActive);

                contentActive.addClass('active').fadeIn('slow');
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').closest('.server-container').children('.content-server').children().eq(liActive).siblings().hide();
                e.preventDefault();
            });
        });
    };

    var tabs = function() {
        $('.tab-container').each(function() {
            $(this).children('.content-tab').children().hide();
            $(this).children('.content-tab').children().first().show();
            $(this).find('.menu-tab').children('li').on('click', function(e) {
                var liActive = $(this).index(),
                    contentActive = $(this).siblings().removeClass('active').parents('.tab-container').children('.content-tab').children().eq(liActive);

                contentActive.addClass('active').fadeIn('slow');
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').parents('.tab-container').children('.content-tab').children().eq(liActive).siblings().hide();
                e.preventDefault();
            });
        });
    };

		var tabChooseCard = function() {
        $('.choose-card-container').each(function() {
            $(this).children('.content-tab-card').children().hide();
            $(this).children('.content-tab-card').children().first().show();
            $(this).find('.choose-card').children('li').on('click', function(e) {
                var liActive = $(this).index(),
                    contentActive = $(this).siblings().removeClass('active').parents('.choose-card-container').children('.content-tab-card').children().eq(liActive);

                contentActive.addClass('active').fadeIn('slow');
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').parents('.choose-card-container').children('.content-tab-card').children().eq(liActive).siblings().hide();
                e.preventDefault();
            });
        });


    };

    var VideoSlide = function(){
		$('.video-list').owlCarousel({
			loop:true,
			autoplay: true,
			margin:0,
			dots:true,
			nav: false,
			items:1,
			responsive:{
				0:{
					items:1,
				},
				480:{
					items:1,
				},
				576:{
					items:1,
				},
				768:{
					items: 1,
				},
				992:{
					items: 1,
				},
				1200:{
					items:1,
				}
			}
		});
	  };

	  var BannerSlide = function(){
		$('.banner-slide').owlCarousel({
			loop:true,
			autoplay: true,
			margin:0,
			dots:true,
			nav: false,
			items:1,
			responsive:{
				0:{
					items:1,
				},
				480:{
					items:1,
				},
				576:{
					items:1,
				},
				768:{
					items: 1,
				},
				992:{
					items: 1,
				},
				1200:{
					items:1,
				}
			}
		});
	  };

	  var menuServer = function(){
		$('.menu-server').owlCarousel({
			loop:false,
			autoplay: false,
			margin:0,
			dots:false,
			nav: true,
			items:1,
			responsive:{
				0:{
					items:2,
				},
				480:{
					items:3,
				},
				576:{
					items:4,
				},
				768:{
					items: 4,
				},
			}
		});
	  };

	  var ShowMenu = function() {
	  	$('.btn-menu').on('click', function(e) {
	  		e.stopPropagation();
	  		$(this).closest('body').children('#mainnav-mobi').toggleClass('open');
	  	});
	  	$('#mainnav-mobi > span').on('click', function() {
	  		$(this).parent('#mainnav-mobi').removeClass('open');
	  	});
			$('#mainnav-mobi').on('click', function(e) {
	  		e.stopPropagation();
	  	});
			$('body').on('click', function(){
				$('#mainnav-mobi').removeClass('open');
			});
	  }

	  var tabsCard = function() {
	  	$('.card-container').each(function() {
		  	$(this).children('.card-content').children().hide();
	        $(this).children('.card-content').children().first().show();
		  	/*
			$('.card-container .inner form').find('button').on('click', function(e) {
		  		var liIndex = $(this).closest('.inner').index() + 2;
		  		$('.card-container .inner:nth-child('+liIndex+')').show();
		  		$('.card-container .inner:nth-child('+liIndex+')').siblings().hide();
		  		var liIndex2 = $(this).closest('.card-container').find('.menu-card').children('li').index() + 2;
		  		console.log(liIndex2);
		  		$('.menu-card li:nth-child('+liIndex2+')').addClass('active');
		  		e.preventDefault();
		  	});
		  	$('.card-container .inner:nth-child(2)').find('button').on('click', function(e) {
		  		$('.menu-card li:nth-child(3)').addClass('active');
		  		e.preventDefault();
		  	});
			*/
			});
		};

	  var ChangeTableLogin = function() {
	  	$('.login-menu li').click(function() {
		    var $liIndex = $(this).index() + 1;
		    $('.login-menu li').removeClass('active');
		    $(this).addClass('active');
		    $('.login-box .tab').removeClass('active');
		    $('.login-box .tab:nth-child('+$liIndex+')').addClass('active');
		  });

	  	$('.pop-login-close').click(function() {
		    $('#hidpopup').fadeOut();
		    $('.pop-login').fadeOut();
		  });
	  }
	
	
    	

    // Dom Ready
	$(function() {
		ChangeTableLogin();
		videoPopup();
		tabServer();
		tabs();
		tabChooseCard();
		VideoSlide();
		BannerSlide();
		ShowMenu();
		menuServer();
		tabsCard();
   	});
})(jQuery);

function format (option) {
	if (!option.id) { return option.text; }
	var ob = "<span>"+option.element.value.toLowerCase()+"</span>" + option.text;	// replace image source with option.img (available in JSON)
	return ob;
};

function ShowMLogin(){
	$('#hidpopup').fadeIn();
	$('.pop-login').fadeIn();
}