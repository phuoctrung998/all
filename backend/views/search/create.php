<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Search */

$this->title = 'Create Search';
$this->params['breadcrumbs'][] = ['label' => 'Searches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
