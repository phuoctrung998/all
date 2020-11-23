<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SettingImportantValues */

$this->title = 'Thêm mới cấu hình';
$this->params['breadcrumbs'][] = ['label' => 'Cấu hình', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-important-values-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
