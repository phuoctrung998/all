<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

LoginAsset::register($this);
$asset = backend\assets\LoginAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Apk Download</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$baseUrl?>/gleek/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?=$baseUrl?>/gleek/main/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
<?php $this->beginBody() ?>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    
        <?= $content ?>
    <?php $this->endBody() ?>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="<?=$baseUrl?>/gleek/assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="<?=$baseUrl?>/gleek/main/js/custom.min.js"></script>
    <script src="<?=$baseUrl?>/gleek/main/js/settings.js"></script>
    <script src="<?=$baseUrl?>/gleek/main/js/gleek.js"></script>
</body>
</html>
<?php $this->endPage() ?>