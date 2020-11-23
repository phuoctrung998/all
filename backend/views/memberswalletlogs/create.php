<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MembersWalletLogs */

$this->title = 'Create Members Wallet Logs';
$this->params['breadcrumbs'][] = ['label' => 'Members Wallet Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-wallet-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
