<script>
    $(function() {
        $('.server').click(function(){
            server_index = $(this).attr('server_index');
            slug =  $(this).attr('server_slug');
            if(server_index == 1){
                window.location.href = '/may-chu/'+slug;
            }else{
                alert('Máy chủ '+slug+' đang được bảo trì, vui lòng chọn máy chủ khác !!!');
            }
        });
    });
</script>
 <script>
        $(document).ready(function(){
              $('#tabserver').liquidcarousel({ height: 24, duration: 100, hidearrows: false });
        });
</script>

<section class="server-area">
	<div class="top-title">
		<?php if(!Yii::$app->user->isGuest){?>
		Chào đạo hữu: <span><?=Yii::$app->user->identity->member_username?></span> 
		<?php }else{ ?>
		Chào đạo hữu !
		<?php } ?>
	</div>
	
	<div class="new-server">
		<div class="title">
			Máy Chủ Mới
		</div>
		<?php foreach ($new_servers as $newsv){  ?>	
		<div class="link-server">
			<a href="/may-chu/<?php echo $newsv->server_slug ?>"><?php echo $newsv->server_name ?></a>
		</div>
		<?php } ?>
	</div>
	<!--
	<div class="new-server">
		<div class="title">
			Máy Chủ Hot
		</div>
		<div class="link-server">
			<a href="#">S9 - Naruto</a>
		</div>
	</div>
	-->
<div class="server-container">
	<div class="menu-server owl-carousel">
		<?php 
					if(!empty($list_servers)){
						$numRow = count($list_servers) / 10;
						$numRow = CEIL($numRow);
					}
					for($i=1; $i <= $numRow; $i++)
					{
						$cumsv = $i+1;
						$classBoxServerMenu = "slide";
						if($i == 1){
							$classBoxServerMenu = "slide active";
						}
						if($i == 1){
							$begin_text_sv = $i;
							$end_text_sv  = 10*$i;
						}elseif($i == $numRow){
							$val = end($list_servers);
							$begin_text_sv = 10*$i - 9;
							$end_text_sv = count($list_servers);
						}
						else{
							$begin_text_sv = 10*$i - 9;
							$end_text_sv  = 10*$i;
						}
	?>
	<li class="li_cum<?=$i?> <?=($i==1) ? 'active' : ''?>">
			Cụm <?=$i?>
		</li>
   <?php } ?>
	</div>
	<div class="content-server">
		<?php 
					if(!empty($list_servers)){
					foreach($list_servers as $key => $val){
						$stt = $key+1;	
						if($key == 0 || $key % 10 == 0){
							$classActive = $key == 0 ? '' : 'd-none';
							$groupSv  = CEIL($stt/10);
							echo '<div class="inner cumsv'.$groupSv.' '.$classActive.'"><ul class="list-server">';
						}
				?>
								<li><a 
								class='server' 
								server_slug='<?php echo $val->server_slug ?>' 
								server_index='<?php echo $val->server_status?>'
								href="javascript:void(0);"
								>
									<strong><?php echo $val->server_name?></strong>
								</a>
								</li>
				<?php 
						if($key != 0 && ($stt % 10 == 0 || $stt == count($list_servers))){
							echo '</ul></div>';
						}
						
						}
					} 
	?>
	</div>
</div>
</section>