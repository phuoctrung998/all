<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Members */

$this->title = 'Create Members';
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
