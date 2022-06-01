<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\slsic */

$this->title = 'SLSIC: ' . $model->CombID;
$this->params['breadcrumbs'][] = ['label' => 'Slsics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id5d, 'url' => ['view', 'id' => $model->id5d]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slsic-update">
 <div class="container-caro">
    <!--<h4><?= Html::encode($this->title) ?></h4>-->
<h2><img src="img/slsic_e.jpg" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode($this->title) ?></h2>
<br><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

