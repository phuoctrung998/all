<?php
use frontend\widget\TopPartnerWidget;
use frontend\widget\TopHeaderWidget;
use frontend\widget\HtmlContentWidget;
use frontend\widget\SliderWidget;
use frontend\widget\HomeNewsWidget;
use frontend\widget\HomeDuanWidget;
use frontend\widget\HomeTopHeaderWidget;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use frontend\widget\PartnerWidget;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<div class="form-contact bg-white pd-20">
				<h1 class="sub-title mg-t-0">Contact Us</h1>
				<p>If you want to Contact APK Download administrator, Send your suggestions, Report website bugs, or Submit your apps, Please contact us using the following way:</p>
				<ul>
					<li>Send Email: <a href="">support@apkdownload.com</a></li>
					<li>Feedback</li>
				</ul>
				<form action="#" method="GET">
					<div class="text-grid">
						<div class="text-field">
							<label for="name">Your name*</label>
							<input type="text" id="name" name="name" placeholder="Andrew Noah" class="form-control">
						</div><!--.text-field-->
						<div class="text-field">
							<label for="email">Your Email*</label>
							<input type="text" id="email" name="email" placeholder="master@androidapps.com" class="form-control">
						</div><!--.text-field-->
					</div><!--.text-grid-->
					<div class="text-field">
						<label for="subject">Subject</label>
						<input type="text" id="subject" name="subject" placeholder="com.zimbronapps.pubgsounds" class="form-control">
					</div><!--.text-field-->
					<h4 class="sub-title fw-500 radio-title">Reason for reporting:</h4>
					<ul class="radio-wrapper">
						<li class="radio-field">
							<input id="comment" type="radio" name="reason" /><label for="comment"> <span></span> Comments and feedback</label>
						</li>
						<li class="radio-field">
							<input id="report" type="radio" name="reason" /><label for="report"> <span></span> Report a problem</label>
						</li>
						<li class="radio-field">
							<input id="request" type="radio" name="reason" /><label for="request"> <span></span> DMCA takedown request</label>
						</li>
						<li class="radio-field">
							<input id="feedback" type="radio" name="reason" /><label for="feedback"> <span></span> Developer Support and Feedback</label>
						</li>
						<li class="radio-field">
							<input id="other" type="radio" name="reason" /><label for="other"> <span></span> Other</label>
						</li>
					</ul>
					<div class="text-field">
						<label for="message">Your message</label>
						<textarea class="form-control" id="message"></textarea>
					</div><!--.text-field-->
					<div class="text-grid">
						<div class="text-field">
							<label for="code">Verification code</label>
							<input type="text" id="code" name="subject" placeholder="1fcc" class="form-control">
						</div><!--.text-field-->
						<div class="text-field">
							
						</div><!--.text-field-->
					</div><!--.text-grid-->
					<div class="submit-field">
						<input type="submit" name="submit" value="Send Contact">
					</div>
				</form>
			</div><!--.form-contact-->
		</div><!--.col-lg-6-->
	</div><!--.row-->
</div><!--.container-->