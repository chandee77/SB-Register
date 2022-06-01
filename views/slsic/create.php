<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\slsic */

$this->title = 'Create SLSIC';
$this->params['breadcrumbs'][] = ['label' => 'Slsics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div class="slsic-create">
<div class="container-caro">
   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="form-horizontal">
    <div class="Row">
    	<h2><img src="img/slsic_cre.jpg" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode($this->title) ?></h2>
</div>
</div>
  <br>
    </br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
