<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Core */

$this->title = Yii::t('app', 'Verify Establishment ', [
    'modelClass' => 'Core',
]) . $model->SLID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SLID, 'url' => ['view', 'id' => $model->SLID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Verify');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="core-update">
	<div class="container-caro">
<h2><img src="img/edit.jpg" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('Establishment') ?></h2>
    <!-- <h2><span class="glyphicon glyphicon-edit" style="color: black"></span>&nbsp;&nbsp;<?= Html::encode(' Establishment') ?></h2> -->
<br></br>
    <?= $this->render('_verify', array(
        'model' => $model,'model1'=>$model1,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4,
    ))  ?>

</div>
	</div>
