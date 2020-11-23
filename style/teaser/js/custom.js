var wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: 200,
    mobile: true,
    live: true
});
wow.init();
var is_reload = false;
(function($) {
    "use strict";
    $(document).ready(function() {

        $('a[href^="#"]').on('click', function(event) {
            $(".menu-left ul li a").removeClass('active');
            $(this).addClass('active');

            var target = $($(this).attr('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 700);
            }
        });

        $("#p01").hover(function() {
            $(".menu-left ul li a").removeClass('active');
            $("#left1").addClass('active');
        });
        $("#p02").hover(function() {
            $(".menu-left ul li a").removeClass('active');
            $("#left2").addClass('active');
        });
        $("#p03").hover(function() {
            $(".menu-left ul li a").removeClass('active');
            $("#left3").addClass('active');
        });
        $("#p04").hover(function() {
            $(".menu-left ul li a").removeClass('active');
            $("#left4").addClass('active');
        });
        $("#p05").hover(function() {
            $(".menu-left ul li a").removeClass('active');
            $("#left5").addClass('active');
        });
        var windowSize = $(window).width();

        if (windowSize > 1100) {
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 50) {
                    $('#return-to-top').fadeIn(200);

                } else {
                    $('#return-to-top').fadeOut(200);
                }
            });
        }

        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });

        window.onload = function() {
            var context = new AudioContext();
        }
        var myaudio = document.getElementById("audio_autoplay");

        function play() {
            return myaudio.play();
        };

        function stop() {
            return myaudio.pause();
        };
        // Begin Play music
        $("#volume-play").click(function() {
            console.log('play');
            document.getElementById('audio_autoplay').play();
            $(this).hide();
            $("#volume-stop").show();
            $('.audio-xoay').trigger("pause");
        });
        $("#volume-stop").click(function() {
            console.log('pause');
            document.getElementById('audio_autoplay').pause();
            $(this).hide();
            $("#volume-play").show();
            $('.audio-xoay').trigger("pause");
        });
        // End Play music

        // Page 01 - Video
        // Begin: popup trailer
        $('.btn-trailer').click(function() {
            $('.video-bg').fadeIn();
            $('.video-game').fadeIn();
            $('.audio-game').trigger("pause");
            $('#video_popup-youtube-player').attr('src', 'https://www.youtube.com/embed/neAxD0ecNh0?autoplay=1&controls=0&loop=1&playlist=GGmg2FjE9j0&amp;showinfo=0');
            $('audio').hide();
            $('#mask').fadeIn();
        });
        $('.video-close').click(function() {
            $('.video-bg').fadeOut();
            $('.video-game').fadeOut();
            $('.audio-game').trigger("play");
            $('#video_popup-youtube-player').attr('src', '');
            $('#mask').fadeOut();
        });
        // End popup trailer

        // =================================  
        // Begin: Popup page 2
        // End: Popup page 2
        $(".btn-tuong1").click(function() {
            $('.popup-tuong01').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-tuong .close-popup").click(function() {
            $('.popup-tuong01').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-tuong2").click(function() {
            $('.popup-tuong02').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-tuong .close-popup").click(function() {
            $('.popup-tuong02').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-tuong3").click(function() {
            $('.popup-tuong03').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-tuong .close-popup").click(function() {
            $('.popup-tuong03').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        // Begin: Popup page 3
        $(".btn-page3-01").click(function() {
            $('.popup-page03-01').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-01 .close-popup").click(function() {
            $('.popup-page03-01').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page3-02").click(function() {
            $('.popup-page03-02').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-02 .close-popup").click(function() {
            $('.popup-page03-02').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page3-03").click(function() {
            $('.popup-page03-03').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-03 .close-popup").click(function() {
            $('.popup-page03-03').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page3-04").click(function() {
            $('.popup-page03-04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-04 .close-popup").click(function() {
            $('.popup-page03-04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        $(".btn-page3-05").click(function() {
            $('.popup-page03-05').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-05 .close-popup").click(function() {
            $('.popup-page03-05').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page3-06").click(function() {
            $('.popup-page03-06').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-06 .close-popup").click(function() {
            $('.popup-page03-06').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page3-07").click(function() {
            $('.popup-page03-07').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-07 .close-popup").click(function() {
            $('.popup-page03-07').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });


        $(".btn-page3-08").click(function() {
            $('.popup-page03-08').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page03-08 .close-popup").click(function() {
            $('.popup-page03-08').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        // Page 03 - Phuc Loi
        $(".slide-phucloi").slick({
            rows: 2,
            autoplay: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 200,
            responsive: [{

                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    // autoplay: true,
                    speed: 200,
                }
            }, ]
        });
        // End: Popup page 3


        // =================================   
        // Begin: popup defaul
        $(".btn-defaul").click(function() {
            $('.popup-defaul').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-defaul .close-popup").click(function() {
            $('.popup-defaul').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        // End: popup defaul
        // =================================   

        // Begin: Popup Login
        $(".btn-login").click(function() {
            $('.effect-login').fadeIn();
            $('.pop-login').fadeIn(2500);
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        })
        $('.pop-login-close').click(function() {
            $('#mask').fadeOut();
            $('.pop-login').fadeOut();
            $('.effect-login').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $('.login-menu li').click(function() {
            $('.login-menu li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.login-box .tab').removeClass('active');
            $('.login-box .tab:nth-child(' + $inDex + ')').addClass('active');
        });
        // End: Popup Login
        $(".btn-nhancode").click(function() {
            $('.popup-nhancode').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-nhancode .close-popup").click(function() {
            $('.popup-nhancode').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-guicode").click(function() {
            $('.popup-nhancode .nhancode-01').fadeOut();
            $('.popup-nhancode .nhancode-02').fadeIn();

        });
        // Begin: Nhan Code

        // End: Nhan Code


        // Begin: Popup Page Mini Game - Page 03
        $('.bg-giftcode button').click(function() {
            $(this).prev("input").focus();
            $(this).prev("input").select();
            document.execCommand('copy');
        });

        $('.p3-menu_tab .ul-tab li').click(function() {
            $('.p3-menu_tab .ul-tab li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.p3-content_tab .tab').removeClass('active');
            $('.p3-content_tab .tab:nth-child(' + $inDex + ')').addClass('active');
        });


        // begin: popup page 03 mini game

        $('.popup-menu li').click(function() {
            $('.popup-menu li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.popup-box .tab').removeClass('active');
            $('.popup-box .tab:nth-child(' + $inDex + ')').addClass('active');
        });
        $('.popup-menu-mb li').click(function() {
            $('.popup-menu-mb li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.popup-box .tab').removeClass('active');
            $('.popup-box .tab:nth-child(' + $inDex + ')').addClass('active');
        });
        //  ===
        $(".btn-doicode").click(function() {
            $('.popup-page04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
            $(".popup-menu li").removeClass('active');
            $(".popup-menu li:nth-child(1)").addClass('active');
            $(".popup-box .tab").removeClass('active');
            $(".popup-box .tab:nth-child(1)").addClass('active');
        });
        $(".popup-thele .close-popup").click(function() {
            $('.popup-page04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        //  ===
        $(".btn-thele").click(function() {
            $('.popup-page04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
            $(".popup-menu li").removeClass('active');
            $(".popup-menu li:nth-child(3)").addClass('active');
            $(".popup-box .tab").removeClass('active');
            $(".popup-box .tab:nth-child(3)").addClass('active');
        });
        $(".popup-thele .close-popup").click(function() {
            $('.popup-page04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        //  ===
        $(".btn-tuingoc").click(function() {
            $('.popup-page04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
            $(".popup-menu li").removeClass('active');
            $(".popup-menu li:nth-child(4)").addClass('active');
            $(".popup-box .tab").removeClass('active');
            $(".popup-box .tab:nth-child(4)").addClass('active');
        });
        $(".popup-page04 .close-popup").click(function() {
            $('.popup-page04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        //  ===
        $(".btn-lichsu").click(function() {
            $('.popup-page04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
            $(".popup-menu li").removeClass('active');
            $(".popup-menu li:nth-child(5)").addClass('active');
            $(".popup-box .tab").removeClass('active');
            $(".popup-box .tab:nth-child(5)").addClass('active');
        });
        $(".popup-bxh .close-popup").click(function() {
            $('.popup-page04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        //  ===

        $(".btn-demo").click(function() {
            $('.popup-page04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
            $(".popup-menu li").removeClass('active');
            $(".popup-menu li:nth-child(2)").addClass('active');
            $(".popup-box .tab").removeClass('active');
            $(".popup-box .tab:nth-child(2)").addClass('active');
        });
        $(".popup-thele .close-popup").click(function() {
            $('.popup-page04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });


        $(".btn-doicode").click(function() {
            $('.popup-doiqua').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-doiqua .close-popup").click(function() {
            $('.popup-doiqua').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".popup-ketqua .close-kq").click(function() {
            $('.popup-ketqua').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        // end: popup page 03 mini game

        // Begin: Popup Page 05
        $(".btn-datmoc").click(function() {
            $('.popup-defaul.popup-datmoc').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-defaul.popup-datmoc .close-popup").click(function() {
            $('.popup-defaul.popup-datmoc').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        // ===
        $(".btn-chua-datmoc").click(function() {
            $('.popup-defaul.popup-chua-datmoc').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-defaul.popup-chua-datmoc .close-popup").click(function() {
            $('.popup-defaul.popup-chua-datmoc').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });
        // ===
        $('.label-code button').click(function() {
            $(this).prev("input").focus();
            $(this).prev("input").select();
            document.execCommand('copy');
        });
        // ===

        // End: Popup Page 05

        // Begin Count down
        $('#clock').countdown('2020/1/1 10:00:00').on('update.countdown', function(event) {
            var $this = $(this).html(event.strftime('' +
                '<span>%-n<img src="style/teaser/images/day.png" alt="Siêu Xay Da"></span>' +
                '<span>%H<img src="style/teaser/images/hours.png" alt="Siêu Xay Da"></span>' +
                '<span>%M<img src="style/teaser/images/min.png" alt="Siêu Xay Da"></span>' +
                '<span>%S<img src="style/teaser/images/seconds.png" alt="Siêu Xay Da"></span>'));
        }).on('finish.countdown', function(event) {
            var $this = $(this).html(event.strftime('' +
                '<span>0<img src="style/teaser/images/day.png" alt="Siêu Xay Da"></span>' +
                '<span>0<img src="style/teaser/images/hours.png" alt="Siêu Xay Da"></span>' +
                '<span>0<img src="style/teaser/images/min.png" alt="Siêu Xay Da"></span>' +
                '<span>0<img src="style/teaser/images/seconds.png" alt="Siêu Xay Da"></span>'));
        });
        // End Count down

        // End: Popup Page Mini Game

        // ===============

        //  console.clear();
        //console.log($('body').width());

        // ===============




    });
})(jQuery);
// Begin: Page 04 Slide
var rev = $('.rev_slider');
rev.on('init', function(event, slick, currentSlide) {
    var
        cur = $(slick.$slides[slick.currentSlide]),
        next = cur.next(),
        prev = cur.prev();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    cur.removeClass('slick-snext').removeClass('slick-sprev');
    slick.$prev = prev;
    slick.$next = next;
}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    console.log('beforeChange');
    var
        cur = $(slick.$slides[nextSlide]);
    console.log(slick.$prev, slick.$next);
    slick.$prev.removeClass('slick-sprev');
    slick.$next.removeClass('slick-snext');
    next = cur.next(),
        prev = cur.prev();
    prev.prev();
    prev.next();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    slick.$prev = prev;
    slick.$next = next;
    cur.removeClass('slick-next').removeClass('slick-sprev');
});

rev.slick({
    speed: 1000,
    arrows: true,
    dots: false,
    focusOnSelect: true,
    infinite: true,
    centerMode: true,
    slidesPerRow: 1,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerPadding: '0',
    swipe: true,
    customPaging: function(slider, i) {
        return '';
    },
    /*infinite: false,*/
});
// End: Page 04 Slide