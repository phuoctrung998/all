(function($) {
	"use strict";
	$(document).ready(function() {

		$('map').imageMapResize();

		setInterval(function(){
	   if($('.start a,.menu-content ul li:first-child a').hasClass('active')) {
	       $('.start a,.menu-content ul li:first-child a').removeClass('active');
	   }else {
	       $('.start a,.menu-content ul li:first-child a').addClass('active');
	   }
	  }, 500);
		
		/*
		$('.start a,.menu-content ul li:first-child a,.mobile-menu ul li.mobile-menu-pop a').click(function() {
			$('#hidpopup').fadeIn();
			$('.pop-login').fadeIn();
		});
		*/
		
		$('.mangaplay-pop-dkyn').click(function() {
			$('#hidpopup').fadeIn();
			$('.pop-login').fadeIn();
		});
	
		$('.pop-login-close a').click(function() {
			$('#hidpopup').fadeOut();
			$('.pop-login').fadeOut();
		});
		
		$('.wating-open-close').click(function(){
			$('#hidpopup').fadeOut();
			$('.pop-wating-open').fadeOut();
		})
		
		$('.home-wating-open').click(function(){
			$('#hidpopup').fadeIn();
			$('.pop-wating-open').fadeIn();
		})
		
		$('.login-menu li').click(function() {
			$('.login-menu li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.login-box .tab').removeClass('active');
			$('.login-box .tab:nth-child('+$inDex+')').addClass('active');
		});

		$('.menu-one-click ul li').click(function() {
			$('.menu-one-click ul li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.box-one-tab .tab').removeClass('active');
			$('.box-one-tab .tab:nth-child('+$inDex+')').addClass('active');
			var $dataLink = $(this).attr('data-link');
			$('.menu-one-click p a').attr('href',$dataLink);
		});

		$('.top-two map area').click(function() {
			$('#hidpopup').fadeIn();
      $('.popup-ingame').fadeIn();
			var $inDex = $(this).index() + 1;
      var $content = $('.ingame-content .item:nth-child('+$inDex+')').html();
      $('.pop-ingame-content').html($content);
      $('.popup-scroll').mCustomScrollbar();
			$('body').addClass('no-scroll');
		});

		$('.popup-ingame-close a').click(function() {
			$('#hidpopup').fadeOut();
      $('.popup-ingame').fadeOut();
			$('body').removeClass('no-scroll');
		});

		$("#TL_cn > div:gt(0)").hide();
		setInterval(function() {
				$('#TL_cn > div:first')
						.fadeOut(100)
						.next()
						.fadeIn(100)
						.end()
						.appendTo('#TL_cn');
		}, 100);

		$('.three-box-left ul li').click(function() {
			$('.three-box-left ul li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.three-skill .three-skill-item').removeClass('active');
			$('.three-skill .three-skill-item:nth-child('+$inDex+')').addClass('active');
			$('.three-figure .three-figure-item').removeClass('active');
			$('.three-figure .three-figure-item:nth-child('+$inDex+')').addClass('active');
			var $htmlST = '<div><img src="/style/pc/images/effect01.png" /></div><div><img src="/style/pc/images/effect02.png" /></div><div><img src="/style/pc/images/effect03.png" /></div><div><img src="/style/pc/images/effect04.png" /></div><div><img src="/style/pc/images/effect05.png" /></div><div><img src="/style/pc/images/effect06.png" /></div><div><img src="/style/pc/images/effect07.png" /></div><div><img src="/style/pc/images/effect08.png" /></div><div><img src="/style/pc/images/effect09.png" /></div><div><img src="/style/pc/images/effect10.png" /></div><div><img src="/style/pc/images/effect11.png" /></div>';
			var $htmlNG = '<div><img src="/style/pc/images/ng01.png" /></div><div><img src="/style/pc/images/ng02.png" /></div><div><img src="/style/pc/images/ng03.png" /></div><div><img src="/style/pc/images/ng04.png" /></div><div><img src="/style/pc/images/ng05.png" /></div><div><img src="/style/pc/images/ng06.png" /></div><div><img src="/style/pc/images/ng07.png" /></div><div><img src="/style/pc/images/ng08.png" /></div><div><img src="/style/pc/images/ng09.png" /></div><div><img src="/style/pc/images/ng10.png" /></div><div><img src="/style/pc/images/ng11.png" /></div>';
			var $htmlPS = '<div><img src="/style/pc/images/ps01.png" /></div><div><img src="/style/pc/images/ps02.png" /></div><div><img src="/style/pc/images/ps03.png" /></div><div><img src="/style/pc/images/ps04.png" /></div><div><img src="/style/pc/images/ps05.png" /></div><div><img src="/style/pc/images/ps06.png" /></div><div><img src="/style/pc/images/ps07.png" /></div><div><img src="/style/pc/images/ps08.png" /></div><div><img src="/style/pc/images/ps09.png" /></div><div><img src="/style/pc/images/ps10.png" /></div><div><img src="/style/pc/images/ps11.png" /></div>';
			if($inDex == 1) {
				$('.three-figure-effect #TL_cn').html($htmlST);
			}else if($inDex == 2) {
				$('.three-figure-effect #TL_cn').html($htmlPS);
			}else if($inDex == 3) {
				$('.three-figure-effect #TL_cn').html($htmlNG);
			}else {
				$('.three-figure-effect #TL_cn').html($htmlPS);
			}
		});

		$('.menu-one02 ul li').click(function() {
			$('.menu-one02 ul li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.top-four-tab .tab').removeClass('active');
			$('.top-four-tab .tab:nth-child('+$inDex+')').addClass('active');
			var $dataLink = $(this).attr('data-link');
			$('.menu-one02 p a').attr('href',$dataLink);
		});

		$('.video-tab .item a').click(function() {
      $('.video-bg').fadeIn();
      $('.video-game').fadeIn();
			var $video = $(this).attr('data-video');
			var $video_id = $video.split('v=')[1];
      var $link_video = "https://www.youtube.com/embed/"+$video_id+"/geTgZcHrXTc?enablejsapi=1&version=3&playerapiid=ytplayer&vq=hd720&autoplay=1&showinfo=0&controls=0";
      $('#video_popup-youtube-player').attr('src',$link_video);
    });

		$('.top-four-tab .tab:not(.video-tab) .item a').click(function() {
			var $dataIMG = $(this).attr('data-img');
			$('.popup-zoom .popup-show-img img').attr('src',$dataIMG);
			$('#hidpopup').fadeIn();
			$('.popup-zoom').fadeIn();
		});

		$('.close-img a').click(function() {
			$('#hidpopup').fadeOut();
			$('.popup-zoom').fadeOut();
		});

		$('.video-close').click(function() {
      $('.video-bg').fadeOut();
      $('.video-game').fadeOut();
      $('#video_popup-youtube-player').attr('src','');
    });

		$('.card-button ul li').click(function() {
			$('.card-button ul li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.card-tab-box .tab-box').removeClass('active');
			$('.card-tab-box .tab-box:nth-child('+$inDex+')').addClass('active');
		});

		$('.card-brand ul li').click(function() {
			$('.card-brand ul li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.card-form .tab').removeClass('active');
			$('.card-form .tab:nth-child('+$inDex+')').addClass('active');
		});

		$('.slider-banner').slick({
		  infinite: true,
		  slidesToShow: 1,
		  slidesToScroll: 1,
			dots: true,
			autoplay: true,
			arrows: false,
			fade: true
		});

	});
})(jQuery);


var wow = new WOW({
	boxClass: 'wow',
	animateClass: 'animated',
	offset: 200,
	mobile: true,
	live: true
});
wow.init();
