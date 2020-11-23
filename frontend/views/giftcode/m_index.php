<section class="server-area">

			
			<div class="top-title">
				<?php if(!Yii::$app->user->isGuest){?>
					<input type="hidden" value="<?=Yii::$app->user->identity->member_username?>" id="txtMemberLoged">
						<div class="top-title">
						Chào đạo hữu: <span><?=Yii::$app->user->identity->member_username?></span> 
					</div>
				<?php }else{ ?>
					<div class="top-title">
						Chào đạo hữu!
					</div>
				<?php } ?>
			</div>
			
			<div class="card-container">
				<form action="" id="f-nc-updateMemberInfo">
					<div class="input-form show-code">
						<label  class="flb">GIFCODE ĐẤU THIÊN</label>
						<?php if(!empty($member_code)){?>
							<input type="text" class="textinput" value="<?=$member_code->giftcode?>">
						<?php } else {?>	
							<input type="text" class="textinput" value="<?=$msg?>">
						<?php } ?>
					</div>
					
					<div class="input-form show-code">
						<label  class="flb">GIFCODE HÀNG MA</label>
						<?php if(!empty($hangma_code)){?>
							<input type="text" class="textinput" value="<?=$hangma_code->giftcode?>">
						<?php } else {?>	
							<input type="text" class="textinput" value="<?=$msg?>">
						<?php } ?>
					</div>
					
					<div class="input-form show-code">
						<label  class="flb">GIFCODE PHỤC YÊU</label>
						<?php if(!empty($phucyeu_code)){?>
							<input type="text" class="textinput" value="<?=$phucyeu_code->giftcode?>">
						<?php } else {?>	
							<input type="text" class="textinput" value="<?=$msg?>">
						<?php } ?>
					</div>
			   </form>	
			</div>		   
</section>