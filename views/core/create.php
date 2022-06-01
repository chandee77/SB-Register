<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Core */

$this->title = Yii::t('app', 'Add New Establishment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SBR'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="core-create">
<div class="container-caro">
	<div class="form-horizontal">
    <div class="Row">
    	<!--<h2><i class="fa fa-institution"></i>&nbsp;&nbsp;<?= Html::encode(' Establishment') ?></h2>-->
      <h2><img src="img/add.jpg" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('Establishment') ?></h2>
        
    </div>
</div>

   
    <br>
    </br>
    <div class="row">
        <div class="col-md-12">
            
    <?= $this->render('_form', array(
        'model' => $model,'model1' => $model1,'model2' => $model2,'model3' => $model3,'model4' => $model4,
    )) ?>
            </div></div>
</div></div>
