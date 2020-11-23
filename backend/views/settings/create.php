<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblSettings */

$this->title = 'Create Tbl Settings';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-settings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
