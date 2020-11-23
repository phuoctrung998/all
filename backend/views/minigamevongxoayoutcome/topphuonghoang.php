<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinigameVongxoayOutcomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Top Thu Thập Phượng Vũ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-outcome-index">

    <table class="">
		<?php foreach($bxhTopDiem as $t => $mem){?>
		<tr>
			<td><?=$t+1?></td>
			<td><?=$mem['member_username']?></td>
			<td><?=$mem['point']?></td>
		</tr>
		<?php } ?>
	</table>
</div>
