<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GiftcodeType */

$this->title = 'Create Giftcode Type';
$this->params['breadcrumbs'][] = ['label' => 'Giftcode Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giftcode-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
