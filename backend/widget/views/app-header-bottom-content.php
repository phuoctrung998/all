<?php 
use common\models\AppsHeaderBottomContents;
?>
<ul class="nav nav-tabs" role="tablist">
	<?php foreach($languages as $index => $lang){?>
	<li class="nav-item">
		<a class="nav-link <?php if($index==0){?>active<?php }?>" data-toggle="tab" href="#m_tabs_1_<?=$lang->code?>">
			<?=$lang->name?>
		</a>
	</li>
	<?php } ?>
</ul>
<div class="tab-content">
	<?php foreach($languages as $index => $lang){?>
	<?php 
		if($mode == 1){
			$contentModel = AppsHeaderBottomContents::find()
			->where('apps_header_bottom_id = :apps_header_bottom_id AND language_code = :language_code',[
				'apps_header_bottom_id' 	=> $apps_header_bottom_id,
				'language_code' 	=> $lang->code	
			])->one();
		}
	?>
	<div class="tab-pane <?php if($index==0){?>active<?php }?>" id="m_tabs_1_<?=$lang->code?>" role="tabpanel">
		
		
		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Chi tiết (<?=$lang->code?>)
			</label>
			<?php 
				$body = "";
				if($mode == 1)
				{
					if(isset($contentModel->body)){
						$body = $contentModel->body;
					}
				}
			?>
			<textarea class="form-control m-input m-input--solid+" name="<?=$lang->code?>[AppsHeaderBottomContents][body]" rows="6"><?=$body?></textarea>
		</div>
		
	</div>
	<?php } ?>
</div>