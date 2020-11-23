<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */

$this->title = 'Cập nhật: ' . $model->post_title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post_title, 'url' => ['view', 'id' => $model->post_title]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posts-update">

    <?= $this->render('_form', [
        'model' 		=> $model,
		'categories' 	=> $categories
    ]) ?>

</div>
