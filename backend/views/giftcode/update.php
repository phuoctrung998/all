<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Giftcode */

$this->title = 'Update Giftcode: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Giftcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="giftcode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
