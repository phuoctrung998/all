<?php 
use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\AppAsset;
use common\models\AppsSiteReviews;
AppAsset::register($this);
$asset = backend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thêm Webiste';
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="nav nav-tabs" role="tablist">
	<?php foreach($languages as $index => $lang){?>
	<li class="nav-item">
		<a class="nav-link <?php if($index==0){?>active<?php }?>" data-toggle="tab" href="#uk_tabs_1_<?=$lang->code?>">
			<?=$lang->name?>
		</a>
	</li>
	<?php } ?>
</ul>
<div class="tab-content">
	<?php foreach($languages as $index => $lang){?>
	<?php 
		if($mode == 1){
			$contentUudiemModel = AppsSiteReviews::find()
			->where('app_id = :app_id AND language_code = :language_code AND review_type =:review_type',[
				'app_id' 			=> $app_id,
				'language_code' 	=> $lang->code,
				'review_type'		=> 1
			])->asArray()->all();
			
			$contentKhuyetdiemModel = AppsSiteReviews::find()
			->where('app_id = :app_id AND language_code = :language_code AND review_type =:review_type',[
				'app_id' 			=> $app_id,
				'language_code' 	=> $lang->code,
				'review_type'		=> 2
			])->asArray()->all();
		}
	?>
	<div class="tab-pane <?php if($index==0){?>active<?php }?>" id="uk_tabs_1_<?=$lang->code?>" role="tabpanel">
		
		<div class="form-group form-repeater m-form__group m--margin-bottom-20">
			<h4 class="m-section__heading">
				Ưu điểm
			</h4>
			<div class="repeater-wrapper">
				<div class="row row-input">
					<div class="col-md-12">
						<?php for($i=0;$i<7;$i++){?>
							<?php if(isset($contentUudiemModel[$i])){?>
							<div class="form-group m-form__group">
								<div class="input-group">
									<div class="input-group-prepend">
										<select  
											name="<?=$lang->code?>[reviews][<?=$i+1?>][AppsSiteReviews][review_type]"
											class="custom-select form-control">
											<option selected value="1">
												Ưu điểm
											</option>
										</select>
									</div>
									<input type="text" 
									class="form-control m-input" 
									name="<?=$lang->code?>[reviews][<?=$i+1?>][AppsSiteReviews][review_text]"
									value="<?=$contentUudiemModel[$i]['review_text']?>"
									placeholder="Nội dung">
								</div>
							</div>
							<?php }else{ ?>
							<div class="form-group m-form__group">
								<div class="input-group">
									<div class="input-group-prepend">
										<select  name="<?=$lang->code?>[reviews][<?=$i+1?>][AppsSiteReviews][review_type]" 
										class="custom-select form-control">
											<option selected value="1">
												Ưu điểm
											</option>
										</select>
									</div>
									<input type="text" class="form-control m-input" 
									name="<?=$lang->code?>[reviews][<?=$i+1?>][AppsSiteReviews][review_text]" 
									placeholder="Nội dung">
								</div>
							</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="form-group form-repeater m-form__group m--margin-bottom-20">
			<h4 class="m-section__heading">
				Nhược điểm
			</h4>
			<div class="repeater-wrapper">
				<div class="row row-input">
					<div class="col-md-12">
						<?php for($i=0;$i<7;$i++){?>
							<?php if(isset($contentKhuyetdiemModel[$i])){?>
							<div class="form-group m-form__group">
								<div class="input-group">
									<div class="input-group-prepend">
										<select  
											name="<?=$lang->code?>[reviews][<?=$i+8?>][AppsSiteReviews][review_type]"
											class="custom-select form-control">
											<option selected value="2">
												Ưu điểm
											</option>
										</select>
									</div>
									<input type="text" 
									class="form-control m-input" 
									name="<?=$lang->code?>[reviews][<?=$i+8?>][AppsSiteReviews][review_text]"
									value="<?=$contentKhuyetdiemModel[$i]['review_text']?>"
									placeholder="Nội dung">
								</div>
							</div>
							<?php }else{ ?>
							<div class="form-group m-form__group">
								<div class="input-group">
									<div class="input-group-prepend">
										<select  
										name="<?=$lang->code?>[reviews][<?=$i+8?>][AppsSiteReviews][review_type]" 
										class="custom-select form-control">
											<option selected value="2">
												Ưu điểm
											</option>
										</select>
									</div>
									<input type="text" 
									class="form-control m-input" 
									name="<?=$lang->code?>[reviews][<?=$i+8?>][AppsSiteReviews][review_text]" 
									placeholder="Nội dung">
								</div>
							</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php 
$this->registerJsFile($baseUrl.'/js/main.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>