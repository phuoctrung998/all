<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-bg2 h-100">
	<div class="container-fluid h-100">
		<div class="row justify-content-between h-100">
			<div class="col-xl-4">
				<div class="login-info">
					<h2>Admin Apk Download</h2>
					<p class="mb-5">Bạn sẽ không bao giờ biết mình mạnh mẽ như thế nào cho đến khi trở lên mạnh mẽ là sự lựa chọn duy nhất mà bạn có.</p>
					<h5>Address: Tòa nhà LTA , 15 Đống Đa, P.2, Tân Bình, HCM</h5>
				</div>
			</div>
			<div class="col-xl-3 p-0">
				<div class="form-input-content login-form bg-white">
					<div class="card">
						<div class="card-body">
							<div class="logo text-center">
								<a href="index.html">
									<img src="../../assets/images/f-logo.png" alt="">
								</a>
							</div>
							<h4 class="text-center mt-4">Log into Your Account</h4>
							
							<?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'mt-5 mb-5']]); ?>
								<div class="form-group">
									<label>Email</label>
									<?= $form->field($model, 'username',['template'=>'
										<div class="form-group">
											{input}
										</div>
									'])->textInput(['placeholder'=>'Tài khoản','class'=>'form-control']) ?>
								</div>
								<div class="form-group">
									<label>Password</label>
									<?= $form->field($model, 'password',[
										'template' => ' 
										<div class="form-group">
											{input}
										</div>'
									])->passwordInput(['placeholder'=>'Mật khẩu','class'=>'form-control']) ?>
								</div>
								<div class="text-center mb-4 mt-4">
									<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								</div>
							<?php ActiveForm::end(); ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>