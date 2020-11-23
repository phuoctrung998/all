<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Giftcode */

$this->title = 'Create Giftcode';
$this->params['breadcrumbs'][] = ['label' => 'Giftcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giftcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
