<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerRedirects */

$this->title = 'Create Manager Redirects';
$this->params['breadcrumbs'][] = ['label' => 'Manager Redirects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-redirects-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
