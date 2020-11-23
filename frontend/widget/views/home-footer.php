<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
?>
<section class='footer footer-detail'>
        <div class='zindex'>
            <div class='container'>
                <div class="footer-logo pc"><img src="<?=$styleUrl?>/images/logo.png"></div>
                <div class="footer-manga mb"><img src="<?=$styleUrl?>/images/logo-manga.png"></div>
                <div class="footer-desc">
                    <strong>Siêu Xay Da</strong><br>
                    ©Bản quyền trò chơi thuộc về MangaPlay<br>
                    Chính thức phát hành tại Việt Nam<br>
                    Địa chỉ : Tòa nhà SABAY, 288 Phạm Văn Hai, phường 5, quận Tân Bình, TPHCM.
                </div>
            </div>
        </div>
    </section>