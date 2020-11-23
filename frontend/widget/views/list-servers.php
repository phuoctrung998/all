<?php 
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<style>
.page-servers-list {
    padding: 0 0 16px;
    margin-bottom: 20px;
    position: relative;
}

.page-servers-list .title {
    height: 45px;
    line-height: 45px;
    font-family: 'UTM Centur Regular', Tahoma, sans-serif;
    font-size: 21px;
    text-align: center;
    text-transform: uppercase;
    font-weight: normal;
    color: #000;
}

.page-servers-list .new-server {
    margin: 0 0 5px;
    text-align: center;
}

.page-servers-list .new-server a::before {
    content: '';
    width: 85px;
    height: 61px;
    background: url(https://css.f.360game.vn/publishing/mainsites/nth360/3/images/moi.png) no-repeat;
    background-size: cover;
    margin: 0 0 13px;
    text-align: center;
    position: absolute;
    top: -7px;
    left: -4px;
}
.page-servers-list .new-server a {
    position: relative;
    display: inline-block;
    background: url(https://css.f.360game.vn/publishing/mainsites/nth360/3/images/sprt_img.png) no-repeat;
    background-position: 0 -234px;
    width: 270px;
    height: 70px;
    line-height: 54px;
    font-family: Tahoma, Arial, sans-serif;
    color: #ffffff;
    font-size: 22px;
    font-weight: normal;
    
}

.page-servers-list .new-server a:hover {
    background-position: 0 -304px;
}

.page-servers-list .list {
    margin-left: 0px;
	padding:0;
    width: 280px;
}

.page-servers-list .list > li {
    float: left;
    margin: 0 0 8px;
}

.page-servers-list .list > li > a {
    background: url(<?=$styleUrl?>/assets/images/lef/bgS.png) no-repeat;
    float: left;
    width: 139px;
    height: 42px;
    line-height: 42px;
    color: #ebeefc;
    text-align: center;

}

.page-servers-list .list > li > a:hover {
	 background: url(<?=$styleUrl?>/assets/images/lef/maychu-rukiaHover.png) no-repeat;
    color: #fdfdfe;
}
.page-servers-list .list > li > a.iconServer{
  position: relative;
  top: 24px;
}
.page-servers-list .page-servers-slide {
    position: relative;
	background-color: #454446;
    background-position: -182px -195px;
    width: 812px;
    height: 30px;
    padding: 0 35px 0 28px;
    overflow: hidden;
}


.page-servers-list .page-servers-slide .slide-btn {
    position: absolute;
    top: 0;
    z-index: 2;
    background: #b79b59;
    float: left;
    width: 30px;
    height: 30px;
    border: 1px solid #0c4d54;
}

.page-servers-list .page-servers-slide .slide-btn:hover {
    background: #9d1a23;
    border-color: #ae6f39;
}

.page-servers-list .page-servers-slide .slide-btn:before {
    content: "";
    position: absolute;
    top: 4px;
    left: 8px;
    background: url(https://css.f.360game.vn/publishing/mainsites/nth360/3/images/sprt_ico.png) no-repeat;
    float: left;
    width: 10px;
    height: 19px;
}

.page-servers-list .page-servers-slide .slide-btn.prev {
    left: 0;
}

.page-servers-list .page-servers-slide .slide-btn.prev:before {
    background-position: -105px -6px;
}

.page-servers-list .page-servers-slide .slide-btn.next {
    right: 0;
}

.page-servers-list .page-servers-slide .slide-btn.next:before {
    left: 10px;
    background-position: -145px -6px;
}

.page-servers-list .page-servers-slide ul {
    float: left;
}

.page-servers-list .page-servers-slide ul li {
    position: relative;
    float: left;
}
.page-servers-list .page-servers-slide ul li.active {
    background-color: #0d6b9c;
}
.page-servers-list .page-servers-slide ul li a {
    display: block;
    height: 30px;
    line-height: 30px;
    padding: 0 11px;
    color: #b9936e;
    font-size: 13px;
}

.page-servers-list .page-servers-slide ul li a:hover {
    color: #fdd472;
}

.page-servers-list .page-servers-slide ul li.active a {
    color:white;
}
.page-servers .content-server{
	margin-top:20px;
}
</style>
<div class="maychu">
	<div class="page-servers page-servers-list">
		
		<div class="page-servers-slide">
		  <a href="javascript:void(0)" class="slide-btn prev"></a>
		  <a href="javascript:void(0)" class="slide-btn next"></a>
		  <ul style="width: 1000px;">
			 <li class="active"><a href="#"></a></li>
			 <li><a href="#"></a></li>
			 <li><a href="#"></a></li>
			 <li><a href="#"></a></li>
			 <li><a href="#"></a></li>
		  </ul>
	   </div>
		
		<div class="content-server">
			<div class="inner ">
				<ul class="list-server list clearfix">
				 <?php 
					foreach($list_servers as $key => $sv){	
						$liClass = 'maychu-smalldefaul';
				?>
							<li class="cursor">
								<a 
								class="server_play"
								server_slug="<?=$sv->server_slug?>" server_status="<?=$sv->server_status?>" server_name="<?=$sv->server_name?>"
								class="<?=$liClass?>" href="javascript:void(0);">
									<?=$sv->server_name?>
								</a>
							</li>
				<?php 
						
					}
				?>
				</ul>
			</div>
		</div>
	</div>		
</div>
<script type="text/javascript">
  (function(){			
    var NUMBER_PER_PAGE = 10;
     var li = $('.page-servers-list .list li');
     $('.page-servers-slide ul').html('');
     var bucket = Math.ceil(li.length / NUMBER_PER_PAGE);
     for(var i=0; i<bucket; i++)	{
       var from = li.length - (i * NUMBER_PER_PAGE);
       var to = li.length - ((i + 1) * NUMBER_PER_PAGE - 1);
       if(to <= 0) to = 1;
       $('.page-servers-slide ul').append('<li><a bucket="' + i + '" href="javascript:void(0)">' + from + '-' + to + '</a></li>');
     }
	 
    var page = 0;
    var btnNext = $('.page-servers-slide [class="slide-btn next"]');
    var btnPrev = $('.page-servers-slide [class="slide-btn prev"]');
    var ul = $('.page-servers-slide ul');
    var li = $('.page-servers-slide li');
    var liWidth = 0;
    for(var i=0; i<li.length; i++)
      liWidth += $(li.get(i)).width();
    if(liWidth < $('.page-servers-slide').width())
      liWidth = $('.page-servers-slide').width();
    $('.page-servers-slide ul').css({width: (liWidth + 25)});
    var liWidth = $('.page-servers-slide').width() - $('.page-servers-slide a').width() * 2;
    btnNext.click(function(){
      page++;
      if(page > bucket - 3)
        page = bucket - 3;
      else
        //ul.animate({'margin-left': '-=' + liWidth}, 200);
        ul.animate({'margin-left': '-=57.11'}, 200);
    });
    btnPrev.click(function(){
      page--;
      if(page < 0)
        page = 0;
      else
        //ul.animate({'margin-left': '+=' + liWidth}, 200);
      	ul.animate({'margin-left': '+=57.11'}, 200);
    });

    $('.page-servers-slide ul a').click(function(){
      var b = $(this).attr('bucket');
      $('.page-servers-slide li').removeClass('active');
      $(this).parent().addClass('active');
      var dom = $('.page-servers-list .clearfix li');
      dom.hide();
      for(var i=0; i<NUMBER_PER_PAGE; i++){
        var index = i + (b * NUMBER_PER_PAGE);
        if(index < dom.length)
          $(dom.get(index)).show();
      }
      dom = $('.page-servers-list ul');
      dom.hide();
      dom.fadeIn(100);
    });

    var d = $('.page-servers-slide ul a');
    if(d.length > 0)
      $(d.get(0)).trigger('click');
  })();
</script>