<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentPartner */

$this->title = 'Create Payment Partner';
$this->params['breadcrumbs'][] = ['label' => 'Payment Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
