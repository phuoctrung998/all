// Begin Btn Trieu Hoi
$(".popup-ketqua .close-popup").click(function() {
        $(".popup-ketqua").fadeOut(200);
        $('#mask').fadeOut();
    })
    /*
    $(".btn-trieuhoi").click(function(){
    	$(".doiqua-minigame").fadeOut();
    	$(".dragon").css("display", "none");
    	$(".ngoc").css("display", "none");
    	$('#vid-trieuhoi').css("display", "block");
    	$('.audio-game').trigger("pause");
    	$('.audio-xoay').trigger("play");
    	$('#vid-trieuhoi').trigger('play');
    	setTimeout(function () {
    		$('.figure .d-none').css("display", "block");
    		$('.audio-popup').trigger("pause");
    			var color = Math.floor(Math.random() * 100)+1; 
    			if(1 <= color && color <=10){
    				$('#ketqua-img').html('<img src="images/ngoc1.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 1');
    			}
    			if(11 <= color && color <=20){
    				$('#ketqua-img').html('<img src="images/ngoc2.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 2');
    			}
    			if(21 <= color && color <=30){
    				$('#ketqua-img').html('<img src="images/ngoc3.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 3');
    			}
    			if(31 <= color && color <=40){
    				$('#ketqua-img').html('<img src="images/ngoc4.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 4');
    			}
    			if(41 <= color && color <=50){
    				$('#ketqua-img').html('<img src="images/ngoc5.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 5');
    			}
    			if(51 <= color && color <=60){
    				$('#ketqua-img').html('<img src="images/ngoc6.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 6');
    			}
    			if(61 <= color && color <=100){
    				$('#ketqua-img').html('<img src="images/ngoc7.png" alt="">');
    				$('#ketqua').html('Triệu Hồi Được Ngọc 7');
    			}
    			setTimeout(function () {
    				$('.audio-game').trigger("pause");
    			}, 2800);
    		
    			setTimeout(function () {
    				$('.audio-xoay').trigger("pause");
    				$('.audio-popup').trigger("play");
    				$(".popup-ketqua").fadeIn();
    				$('#mask').fadeIn();
    				setTimeout(function () {
    					$(".dragon").css("display", "block");
    					$(".ngoc").css("display", "block");
    					$('#vid-trieuhoi').css("display", "none");
    					$('.audio-game').trigger("play");
    				}, 1000);
    			}, 3700);
    			
    	}, 3400);
    });
    // End Btn Trieu Hoi
    */