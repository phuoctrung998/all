<?php 
use common\models\AppsCategoryContents;
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
			$contentModel = AppsCategoryContents::find()
			->where('app_category_id = :app_category_id AND language_code = :language_code',[
				'app_category_id' 	=> $cate_id,
				'language_code' 	=> $lang->code	
			])->one();
		}
	?>
	<div class="tab-pane <?php if($index==0){?>active<?php }?>" id="m_tabs_1_<?=$lang->code?>" role="tabpanel">
		
		<div class="form-group m-form__group">
			<label>
				Tiêu đề (<?=$lang->code?>)
			</label>
			<div class="m-input-icon m-input-icon--left">
				<?php 
					$name = "";
					if($mode == 1)
					{
						if(isset($contentModel->name)){
							$name = $contentModel->name;
						}
					}
				?>
				<input type="text" value="<?=$name?>" class="form-control m-input" name="<?=$lang->code?>[AppsCategoryContents][name]" placeholder="Nhập tiêu đề tại đây">
				<span class="m-input-icon__icon m-input-icon__icon--left">
					<span>
						<i class="la la-android"></i>
					</span>
				</span>
			</div>
		</div>
		
		
		
		<div class="form-group m-form__group">
			<label>
				Meta title (<?=$lang->code?>)
			</label>
			<div class="m-input-icon m-input-icon--left">
				<?php 
					$meta_title = "";
					if($mode == 1)
					{
						if(isset($contentModel->meta_title)){
							$meta_title = $contentModel->meta_title;
						}
					}
				?>
				<input type="text" value="<?=$meta_title?>" class="form-control m-input" name="<?=$lang->code?>[AppsCategoryContents][meta_title]" placeholder="Nhập tiêu đề tại đây">
				<span class="m-input-icon__icon m-input-icon__icon--left">
					<span>
						<i class="la la-android"></i>
					</span>
				</span>
			</div>
		</div>	
		
		<div class="form-group m-form__group">
			<label>
				Meta description (<?=$lang->code?>)
			</label>
			<div class="m-input-icon m-input-icon--left">
				<?php 
					$meta_description = "";
					if($mode == 1)
					{
						if(isset($contentModel->meta_description)){
							$meta_description = $contentModel->meta_description;
						}
					}
				?>
				<input type="text" value="<?=$meta_description?>" class="form-control m-input" name="<?=$lang->code?>[AppsCategoryContents][meta_description]" placeholder="Nhập tiêu đề tại đây">
				<span class="m-input-icon__icon m-input-icon__icon--left">
					<span>
						<i class="la la-android"></i>
					</span>
				</span>
			</div>
		</div>
		
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
			<textarea class="form-control m-input m-input--solid+" name="<?=$lang->code?>[AppsCategoryContents][body]" rows="6"><?=$body?></textarea>
		</div>
		
	</div>
	<?php } ?>
</div>