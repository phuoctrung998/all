(function($) {
    "use strict";
    $(document).ready(function() {

        // Begin: popup trailer
        $('.play-video').click(function() {
            $('.video-bg').fadeIn();
            $('.video-game').fadeIn();
            $('#video_popup-youtube-player').attr('src', 'https://www.youtube.com/embed/neAxD0ecNh0?autoplay=1&controls=0&loop=1&playlist=GGmg2FjE9j0&amp;showinfo=0');
            $('audio').hide();
            $('#mask').fadeIn();
        });
        $('.video-close').click(function() {
            $('.video-bg').fadeOut();
            $('.video-game').fadeOut();
            $('#video_popup-youtube-player').attr('src', '');
            $('#mask').fadeOut();
        });
        // End popup trailer

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
        // Begin: Popup Defaul
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
        // End: Popup Defaul
        // Begin: Index News
        $('.menu-tab li').click(function() {
            $('.menu-tab  li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.content-tab .tab').removeClass('active');
            $('.content-tab .tab:nth-child(' + $inDex + ')').addClass('active');
        });
        // End: Index News

        // Begin: Menu Mobile
        $(".open-left").click(function() {
            $("#menu-left--mb").animate({ left: "0%" }, 200);

            $(".logo-mobile").css("display", "none");
            $("body").css("overflow", "hidden");
        });
        $(".menu-left-close").click(function() {
            $("#menu-left--mb").animate({ left: "-1000%" }, 200);
            $(".logo-mobile").css("display", "block");
            $("body").css("overflow", "scroll");
        });

        // End: Menu Mobile



        // Begin: Block 01
        // begin: news
        $('.block-news .tab-menu > ul li').click(function() {
            $('.block-news .tab-menu > ul li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.block-news .tab').removeClass('active');
            $('.block-news .tab:nth-child(' + $inDex + ')').addClass('active');
        });
        // end: news
        $('.slide-news').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            arrows: false,
            adaptiveHeight: true
        });


        // End: Block 01
        // Begin: Block 02

        $('.block02 .menu-tab_figure  .slide-menu-pc li').click(function() {
            $('.block02 .menu-tab_figure  .slide-menu-pc li').removeClass('active');
            console.log($(this).attr('class'));
            $(this).addClass('active');
            // $('.block-skill').removeClass('active');
            // let togge = $(this).attr('data-togge');
            // $('#'+togge).addClass('active');
            var inDex = $(".menu-tab_figure  .slide-menu-pc li").index($(this)) - 3;
            console.log('block pc');
            $('.content_figure .block-skill').removeClass('active');
            $('.content_figure .block-skill:nth-child(' + inDex + ')').addClass('active');
        });

        $('.slide-menu-pc').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: true,
            vertical: true,

        });


        // Begin Block 2 Mobile

        $('.block02 .menu-tab_figure .slide-menu-mb li').click(function() {
            console.log($(this).attr('class'));
            $('.block02 .menu-tab_figure .slide-menu-mb li').removeClass('active');
            $(this).addClass('active');
            // var $inDex = $(this).index() + 1;
            let $inDex = $(".menu-tab_figure  .slide-menu-mb li").index($(this)) + 1;
            console.log($inDex);
            $('.content_figure .block-skill').removeClass('active');
            $('.content_figure .block-skill:nth-child(' + $inDex + ')').addClass('active');

            var $htmlST = '<div><img src="images/effect01.png" /></div><div><img src="images/effect02.png" /></div><div><img src="images/effect03.png" /></div><div><img src="images/effect04.png" /></div><div><img src="images/effect05.png" /></div><div><img src="images/effect06.png" /></div><div><img src="images/effect07.png" /></div><div><img src="images/effect08.png" /></div><div><img src="images/effect09.png" /></div><div><img src="images/effect10.png" /></div><div><img src="images/effect11.png" /></div>';
            var $htmlNG = '<div><img src="images/ng01.png" /></div><div><img src="images/ng02.png" /></div><div><img src="images/ng03.png" /></div><div><img src="images/ng04.png" /></div><div><img src="images/ng05.png" /></div><div><img src="images/ng06.png" /></div><div><img src="images/ng07.png" /></div><div><img src="images/ng08.png" /></div><div><img src="images/ng09.png" /></div><div><img src="images/ng10.png" /></div><div><img src="images/ng11.png" /></div>';
            var $htmlPS = '<div><img src="images/ps01.png" /></div><div><img src="images/ps02.png" /></div><div><img src="images/ps03.png" /></div><div><img src="images/ps04.png" /></div><div><img src="images/ps05.png" /></div><div><img src="images/ps06.png" /></div><div><img src="images/ps07.png" /></div><div><img src="images/ps08.png" /></div><div><img src="images/ps09.png" /></div><div><img src="images/ps10.png" /></div><div><img src="images/ps11.png" /></div>';


            if ($inDex == 1) {
                $('.three-figure-effect #TL_cn').html($htmlPS);
            } else if ($inDex == 2) {
                $('.three-figure-effect #TL_cn').html($htmlST);
            } else if ($inDex == 3) {
                $('.three-figure-effect #TL_cn').html($htmlPS);
            } else {
                $('.three-figure-effect #TL_cn').html($htmlNG);
            }

            console.log($inDex);
        });

        $('.slide-menu-mb').slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            adaptiveHeight: true,
            horizontal: true,
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
        // ENd Block 2 Mobile

        // End: Block 02
        // Begin: Block 03
        $(".slide").slick({
            asNavFor: ".slide-navigation , .slide-figure",
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: false
        });
        $(".slide-navigation").slick({
            asNavFor: ".slide , .slide-figure",
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            focusOnSelect: true,

        });
        $(".slide-figure").slick({
            asNavFor: ".slide , .slide-navigation",
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: false
        });
        // End: Block 03


        // Begin: Block img
        $('.block-img .menu-tab-info > ul li').click(function() {
            $('.block-img .menu-tab-info > ul li').removeClass('active');
            $(this).addClass('active');
            var $inDex = $(this).index() + 1;
            $('.block-img .content-info .tab').removeClass('active');
            $('.block-img .content-info .tab:nth-child(' + $inDex + ')').addClass('active');
        });

        $('.block-img .menu-tab-info > ul li').click(function() {
            $('.b4-slide').slick('refresh');
            $('.b4-slide-02').slick('refresh');
            $('.b4-slide-03').slick('refresh');
            $('.b4-slide-04').slick('refresh');
            $('.b4-slide-05').slick('refresh');
        });

        $(".b4-slide").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
        });
        $(".b4-slide-02").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
        });
        $(".b4-slide-03").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
        });
        $(".b4-slide-04").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
        });
        $(".b4-slide-05").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
        });
        // End: Block img
        // Begin: Popup page 4
        $(".btn-page4-01").click(function() {
            $('.popup-page04-01').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page04-01 .close-popup").click(function() {
            $('.popup-page04-01').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page4-02").click(function() {
            $('.popup-page04-02').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page04-02 .close-popup").click(function() {
            $('.popup-page04-02').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page4-03").click(function() {
            $('.popup-page04-03').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page04-03 .close-popup").click(function() {
            $('.popup-page04-03').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });

        $(".btn-page4-04").click(function() {
            $('.popup-page04-04').fadeIn();
            $('#mask').fadeIn();
            $("body").addClass("no-scroll");
        });
        $(".popup-page04-04 .close-popup").click(function() {
            $('.popup-page04-04').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });


    });


    let windowSize = $(window).width();
    if (windowSize < 1100) {

        $('.block04-info .menu-tab-info > ul li').click(function() {
            $('.b4-slide').slick('refresh');
            $('.b4-slide-02').slick('refresh');
            $('.b4-slide-03').slick('refresh');
            $('.b4-slide-04').slick('refresh');
            $('.b4-slide-05').slick('refresh');
        });

        $(".b4-slide").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
        });
        $(".b4-slide-02").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
        });
        $(".b4-slide-03").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
        });
        $(".b4-slide-04").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
        });
        $(".b4-slide-05").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
        });
        // $(".block04-info .content-info .b4-slide-All").slick({
        //     infinite: true,
        //     speed: 300,
        //     slidesToShow: 1,
        // });


        // Begin: Server
        var NUMBER_PER_PAGE = 10;
        var li = $('.server-list ul.list li');
        $('.server-slide ul').html('');
        var bucket = Math.ceil(li.length / NUMBER_PER_PAGE);
        console.log(li.length);
        console.log(bucket);
        for (var i = 0; i < bucket; i++) {
            var from = li.length - (i * NUMBER_PER_PAGE);
            var to = li.length - ((i + 1) * NUMBER_PER_PAGE - 1);
            if (to <= 0) to = 1;
            $('.server-slide ul').append('<li class="slide"><a bucket="' + i + '" href="javascript:void(0)">' + from + '-' + to + '</a></li>');
        }

        var page = 0;
        var btnNext = $('.server-slide [class="slide-btn next"]');
        var btnPrev = $('.server-slide [class="slide-btn prev"]');
        var ul = $('.server-slide ul');
        var li = $('.server-slide li');
        var liWidth = 0;
        for (var i = 0; i < li.length; i++)
            liWidth += $(li.get(i)).width();
        if (liWidth < $('.server-slide').width())
            liWidth = $('.server-slide').width();
        $('.server-slide ul').css({ width: (liWidth + 25) });
        var liWidth = $('.server-slide').width() - $('.server-slide a').width() * 2;
        btnNext.click(function() {
            page++;
            if (page > bucket - 3)
                page = bucket - 3;
            else
            //ul.animate({'margin-left': '-=' + liWidth}, 200);
                ul.animate({ 'margin-left': '-=57.11' }, 200);
        });
        btnPrev.click(function() {
            page--;
            if (page < 0)
                page = 0;
            else
            //ul.animate({'margin-left': '+=' + liWidth}, 200);
                ul.animate({ 'margin-left': '+=57.11' }, 200);
        });

        $('.server-slide ul a').click(function() {
            var b = $(this).attr('bucket');
            $('.server-slide li').removeClass('active');
            $(this).parent().addClass('active');
            var dom = $('.server-list .clearfix li');
            dom.hide();
            for (var i = 0; i < NUMBER_PER_PAGE; i++) {
                var index = i + (b * NUMBER_PER_PAGE);
                if (index < dom.length)
                    $(dom.get(index)).show();
            }
            dom = $('.server-list ul');
            dom.hide();
            dom.fadeIn(100);
        });

        var d = $('.server-slide ul a');
        if (d.length > 0)
            $(d.get(0)).trigger('click');
        // End: Server


    }

})(jQuery);