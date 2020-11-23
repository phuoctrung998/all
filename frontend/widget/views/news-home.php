<?php 
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<div class="maychu">
	<div class="server-container">
		<a class="cursor" href="/may-chu">
			<img src="<?=$styleUrl?>/assets/images/lef/danhsachmaychu.jpg" style="margin-bottom: 8px;">
		</a>

		
		<!-- list server -->
		<div class="menu-server owl-carousel">
		<?php 
			$numRow = count($list_servers) / 10;
			$numRow = CEIL($numRow);
			
			for($i=1; $i <= $numRow; $i++)
			{
				$classBoxServerMenu = "";
				if($i == 1){
					$classBoxServerMenu = "active";
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
			<li class="<?=$classBoxServerMenu?>"><?=$begin_text_sv?>-<?=$end_text_sv?></li>
		<?php } ?>
		</div>
		<!-- end list server -->
		
		<div class="content-server">
			
			 <?php 
				foreach($list_servers as $key => $val){
					$stt = $key+1;	
					if($key == 0 || $key % 10 == 0){
						$liClass = 'maychu-smalldefaul iconServer';
						echo '<div class="inner"><ul class="list-server">';
					}else{
						$liClass = 'maychu-smalldefaul';
					}
					
			?>
						<li class="cursor">
							<a class="<?=$liClass?>" href="#"></a>
						</li>
			<?php 
					if($stt % 10 == 0 || $stt == count($list_servers)){
						echo '</ul></div>';
					}
					
					}
			?>
			<div class="inner">
				<ul class="list-server">
					<li class="cursor">
						<a class="maychu-smalldefaul iconServer" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="#"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
				   
				</ul>
			</div>
			<div class="inner">
				<ul class="list-server">
					<li class="cursor">
						<a class="maychu-smalldefaul iconServer" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="#"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
				   
				</ul>
			</div>
			<div class="inner">
				<ul class="list-server">
					<li class="cursor">
						<a class="maychu-smalldefaul iconServer" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="#"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
				 
				</ul>
			</div>
			<div class="inner">
				<ul class="list-server">
					<li class="cursor">
						<a class="maychu-smalldefaul iconServer" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="#"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					<li class="cursor">
						<a class="maychu-smalldefaul" href="server.html"></a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>		
</div>