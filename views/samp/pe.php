<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Samtholdform */
/* @var $form ActiveForm */
$this->title = Yii::t('app', 'SBR Stratified Random Sample');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="container-fluid"> -->
    <div class="Row"><div class="col-sm-1"></div>
       
      <h2><img src="img/sample.png" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('PE Stratum') ?></h2>
    </div>
<!-- </div> -->

<div class="core-pe">
<!-- <br><br><br> -->

<div class="container">
    <div class="row">
        <div class="col-sm-4"></div><div class="col-sm-4">
            <?php $form = ActiveForm::begin(); ?>
            <legend><i>Census Threshold</i></legend>
            <?= $form->field($model, 'pe_highest') ?>
            <legend ><i>strata 1 (PE Highest)</i></legend>
             <?= $form->field($model, 'pe_higher') ?> 
             <legend ><i>strata 2 (PE Middle)</i></legend>
         </div></div>

         <div class="row">

        <div class="col-sm-4"></div>
       
             <div class="col-sm-2">
                <?= $form->field($model, 'pe_betw1') ?></div>
             <div class="col-sm-2"><?= $form->field($model, 'pe_betw2') ?></div>
         </div>


        <div class="row">
        <div class="col-sm-4"></div><div class="col-sm-4">
            <legend ><i>strata 3 (PE Lowerst)</i></legend>
            <?= $form->field($model, 'pe_lower') ?>
        </div>
    </div>

    <div class="row"><div class="col-sm-4"></div><div class="col-sm-4" align="right">
        <br>
            <?= Html::submitButton('Submit', ['class' => 'btn btn-large btn-primary btn-round-btn-block','style' =>'text-align: center;']) ?>
            <br><br>
    </div></div>

</div>
</div>
    
    <?php ActiveForm::end(); ?>
</div>
</div><!-- core-pe -->
