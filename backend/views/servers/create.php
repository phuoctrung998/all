<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Servers */

$this->title = 'Thêm mới máy chủ';
$this->params['breadcrumbs'][] = ['label' => 'Máy chủ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servers-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
