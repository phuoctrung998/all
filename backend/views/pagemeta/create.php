<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PageMeta */

$this->title = 'Create Page Meta';
$this->params['breadcrumbs'][] = ['label' => 'Page Metas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-meta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
