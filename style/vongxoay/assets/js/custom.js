function events(){
    $(document).ready(function() {
        // popup the loai
        $('.btn-popup-thele').click(function(){
            $('.popup-thele').fadeIn(.5);    
            $('.mask').fadeIn();
        });
       
        $('.popup-thele .close').click(function() {
            $('.mask').fadeOut();
            $('.popup-thele').fadeOut(.5);
        });
        
        // popup bxh
        $('.btn-popup-bxh').click(function(){
            $('.popup-bxh').fadeIn(.5);    
            $('.mask').fadeIn();
        });
       
        $('.popup-bxh .close').click(function() {
            $('.mask').fadeOut();
            $('.popup-bxh').fadeOut(.5);
        }); 

        // popup doi qua
        $('.btn-popup-doiqua').click(function(){
            $('.popup-doiqua').fadeIn(.5);    
            $('.mask').fadeIn();
        });
       
        $('.popup-doiqua .close').click(function() {
            $('.mask').fadeOut();
            $('.popup-doiqua').fadeOut(.5);
        }); 

        // popup gift code
        $('.btn-popup-giftcode').click(function(){
            $('.popup-giftcode').fadeIn(.5);    
            $('.mask').fadeIn();
            $('.popup-doiqua').fadeOut(.3);
        });
       
        $('.popup-giftcode .close-giftcode').click(function() {
            $('.mask').fadeOut();
            $('.popup-giftcode').fadeOut(.5);
        }); 

        // popup gift code
        $('.btn-popup-giftcode').click(function(){
            $('.popup-giftcode').fadeIn(.5);    
            $('.mask').fadeIn();
            $('.popup-doiqua').fadeOut(.3);
        });
       
        $('.popup-ketqua .close-kq').click(function() {
            $('.popup-ketqua').fadeOut(.5);
            $('.mask').fadeOut();
        });
		
		$('.popup-default .close-default').click(function() {
            $('.popup-default').fadeOut(.5);
            $('.mask').fadeOut();
        });


        // popup chua dang nhap
        $('.btn-popup-warning').click(function(){
            $('.popup-warning').fadeIn(.5);    
            $('.mask').fadeIn();
        });
        $('.popup-warning .close-warning').click(function() {
            $('.popup-warning').fadeOut(.5);
            $('.mask').fadeOut();
        });

        // popup login
        $('.btn-popup-login').click(function(){
            $('.pop-login').fadeIn(.5);    
            $('.mask').fadeIn();
        });
		
		$('.mangaplay-pop-dkyn').click(function(){
            $('.pop-login').fadeIn(.5);    
            $('.mask').fadeIn();
        });
		
		
        $('.pop-login .pop-login-close').click(function() {
            $('.pop-login').fadeOut(.5);
            $('.mask').fadeOut();
        });
		
		$('.login-menu li').click(function() {
			$('.login-menu li').removeClass('active');
			$(this).addClass('active');
			var $inDex = $(this).index() + 1;
			$('.login-box .tab').removeClass('active');
			$('.login-box .tab:nth-child('+$inDex+')').addClass('active');
		});
    })
}
