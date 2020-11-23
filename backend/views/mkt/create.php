<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mkt */

$this->title = 'Create Mkt';
$this->params['breadcrumbs'][] = ['label' => 'Mkts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
