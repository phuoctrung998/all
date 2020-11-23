<div id="banner-slider-box" class="banner-slider"><ul></ul></div>
<div class="">
	<ul class="bn-slide"></ul>
</div>
<script src="http://tayduh5.com/style/pc/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="//js.f.360game.vn/v1/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
/*
(function () {
	$.ajax({
		url: "https://360game.vn/dtbs/get",
		jsonp: "callback",
		dataType: "jsonp",
		data: {action:"get", pos: "54", count: "{54:4}"},
		success: function (resp) {
			if (resp.error >= 0) {
              var banner = resp.data;
              for (var i in banner) {
                $('.banner-slider ul').append('<li><a href="' + (banner[i].link + '&' + location.search.substring(1)) + '" target="_blank"><img src="' + banner[i].img + '" alt="' + banner[i].appname + '"></a></li>');
              }
              $('.bn-slide').bxSlider({
                auto: true,
                controls: false
              });
            }
		}
	});
})();
*/
(function () {
	  var banner = {"img":"https://img.f.360game.vn/banner/dtb-upload/bi%20kiep%20san%20code-1537758661967.png","appname":"nth360game","pos":54,"open_new_tab":false,"link":"https://360game.vn/dtbs/redirect?token=MjAwmw","avoid_display":"","id":426,"type":0};
	  for (var i in banner) {
		$('.banner-slider ul').append('<li><a href="' + banner[i].link +'" target="_blank"><img src="' + banner[i].img + '" alt="' + banner[i].appname + '"></a></li>');
	  }
	  $('.bn-slide').bxSlider({
		auto: true,
		controls: false
	  });
})();
</script>