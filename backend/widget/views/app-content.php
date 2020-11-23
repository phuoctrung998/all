<?php 
use common\models\AppsContents;
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
			$contentModel = AppsContents::find()
			->where('app_id = :app_id AND language_code = :language_code',[
				'app_id' 		=> $app_id,
				'language_code' => $lang->code	
			])->one();
		}
	?>
	<div class="tab-pane <?php if($index==0){?>active<?php }?>" id="m_tabs_1_<?=$lang->code?>" role="tabpanel">
		
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
				<input type="text" value="<?=$meta_title?>" class="form-control m-input" name="<?=$lang->code?>[AppsContents][meta_title]" placeholder="Nhập tiêu đề tại đây">
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
				<input type="text" value="<?=$meta_description?>" class="form-control m-input" name="<?=$lang->code?>[AppsContents][meta_description]" placeholder="Nhập tiêu đề tại đây">
				<span class="m-input-icon__icon m-input-icon__icon--left">
					<span>
						<i class="la la-android"></i>
					</span>
				</span>
			</div>
		</div>
		
		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Mô tả trên nội dung (<?=$lang->code?>)
			</label>
			<?php 
				$before_body = "";
				if($mode == 1)
				{
					if(isset($contentModel->before_body)){
						$before_body = $contentModel->before_body;
					}
				}
			?>
			<textarea class="form-control m-input m-input--solid+" name="<?=$lang->code?>[AppsContents][before_body]" rows="3"><?=$before_body?></textarea>
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
			<textarea class="form-control m-input m-input--solid+" name="<?=$lang->code?>[AppsContents][body]" rows="6"><?=$body?></textarea>
		</div>
		
		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Mô tả dưới nội dung (<?=$lang->code?>)
			</label>
			<?php 
				$after_body = "";
				if($mode == 1)
				{
					if(isset($contentModel->after_body)){
						$after_body = $contentModel->after_body;
					}
				}
			?>
			<textarea class="form-control m-input m-input--solid+" name="<?=$lang->code?>[AppsContents][after_body]" rows="3"><?=$after_body?></textarea>
		</div>
		
		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Đánh giá của website (<?=$lang->code?>)
			</label>
			<?php 
				$site_review = "";
				if($mode == 1)
				{
					if(isset($contentModel->site_review)){
						$site_review = $contentModel->site_review;
					}
				}
			?>
			<textarea class="form-control m-input m-input--solid+" name="<?=$lang->code?>[AppsContents][site_review]" rows="3"><?=$site_review?></textarea>
		</div>
		
		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Text Scroll to Clip (<?=$lang->code?>)
			</label>
			<?php 
				$clip_review_text = "";
				if($mode == 1)
				{
					if(isset($contentModel->clip_review_text)){
						$clip_review_text = $contentModel->clip_review_text;
					}
				}
			?>
			<input type="text" value="<?=$clip_review_text?>" class="form-control m-input" 
			name="<?=$lang->code?>[AppsContents][clip_review_text]" 
			placeholder="Nhập tiêu đề tại đây">
		</div>
		
		<div class="form-group m-form__group">
			<label for="exampleTextarea">
				Text tiêu đề Clip (<?=$lang->code?>)
			</label>
			<?php 
				$clip_review_title = "";
				if($mode == 1)
				{
					if(isset($contentModel->clip_review_title)){
						$clip_review_title = $contentModel->clip_review_title;
					}
				}
			?>
			<input type="text" value="<?=$clip_review_title?>" class="form-control m-input" 
			name="<?=$lang->code?>[AppsContents][clip_review_title]" 
			placeholder="Nhập tiêu đề tại đây">
		</div>
		
	</div>
	<?php } ?>
</div>