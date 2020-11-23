<?php
	use yii\widgets\ActiveForm;
    use yii\web\View;
    use yii\helpers\Url;
?>
<div class="container">
	<div class="form-account">
		<div class="form-wrapper tab-wrapper position-center-center">
			<div class="form-title">
				<div class="menu-tab">
					<ul class="clearfix">
						<li class="active"><a href="#tab-register">New user?  <span>Register Now</span></a></li>
						<li><a href="#tab-login">Returning user?  <span>Sign in!</span></a></li>
					</ul>
				</div><!--.menu-tab-->
			</div><!--.form-title-->
			<div class="form-content">
				<div id="tab-register" class="tab-content active">
					 <?php
						$signup_form = ActiveForm::begin([
							'method' => 'post',
							'action' => ['/register'],
							'fieldConfig' => [
								'template' => "{input}",
								'options' => [
									'tag' => 'p',
								],
							],
							'options' => [
								'class' => 'form-register',
								'id' => 'form-register',
							],
						]);
					?>
					<?php if(Yii::$app->session->hasFlash('error')): ?>
	                    <div class="alert alert-danger" role="alert">
	                        <?= Yii::$app->session->getFlash('error') ?>
	                    </div>
                	<?php endif; ?>
					<?= $signup_form->field($model,'fullname',[ 'template' => "{label}{input}{hint}{error} "])->textInput(['id' => 'fullname', 'class' => '']); ?>

					<?= $signup_form->field($model,'email',[ 'template' => "{label}{input}{hint}{error} "])->textInput(['id' => 'email', 'class' => '']); ?>

					<?= $signup_form->field($model,'password',[ 'template' => "{label}{input}{hint}{error} "])->passwordInput(['id' => 'password', 'class' => '', 'autocomplete' => 'off']); ?>	
					<!--
					<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
                    <p
                    	class="g-recaptcha captcha"
                    	data-sitekey="<?=Yii::$app->params['google_sitekey']?>"
                    	data-callback='activeSubmitButton'
                    	></p>
					-->
					<div class="d-block d-sm-flex justify-content-between align-items-center">
						<p>It's completely free!</p>
						<input type="submit" name="submit" value="Register">
					</div><!--.d-block d-sm-flex-->
					<div class="socials">
						<h4 class="title"><span>OR</span></h4>
						<ul class="clearfix">
							<li class="facebook"><a href="<?=$fb_login_url?>">Login with Facebook</a></li>
							<li class="google"><a href="<?=$gg_login_url?>">Login with Google</a></li>
						</ul>
					</div><!--.socials-->
					<?php ActiveForm::end() ?>
				</div><!--.tab-content-->
				<div id="tab-login" class="tab-content">
					 <?php
                        $signin_form = ActiveForm::begin([
                            'method' => 'post',
                            'action' => ['/login'],
                            'fieldConfig' => [
                                'template' => "{input}",
                                'options' => [
                                    'tag' => 'p',
                                ],
                            ],
                            'options' => [
                                'class' => 'form-login',
                                'id' => 'form-login',
                            ],
                        ]);
                    ?>
					<?php if(Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php endif; ?>
					 <?= $signin_form->field($model,'email',[ 'template' => "{label}{input}{hint}{error} "])->textInput(['id' => 'email', 'class' => '']); ?>

                    <?= $signin_form->field($model,'password',[ 'template' => "{label}{input}{hint}{error} "])->passwordInput(['id' => 'password', 'class' => '']); ?> 
					<div class="d-block d-sm-flex justify-content-between align-items-center">
						<p>Forgot your password?</p>
						<input type="submit" name="submit" value="Login Now">
					</div><!--.d-block d-sm-flex-->
					<div class="socials">
						<h4 class="title"><span>OR</span></h4>
						<ul class="clearfix">
							<li class="facebook"><a href="<?=$fb_login_url?>">Login with Facebook</a></li>
							<li class="google"><a href="<?=$gg_login_url?>">Login with Google</a></li>
						</ul>
					</div><!--.socials-->
					<?php ActiveForm::end() ?>
				</div><!--.tab-content-->
			</div><!--.form-content-->
		</div><!--.form-account-->
	</div><!--.form-account-->
</div><!--.container-->