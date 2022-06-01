<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\samSizeform */
/* @var $form ActiveForm */
$this->title = Yii::t('app', 'SBR Sample size determination');
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="Row"><div class="col-sm-1"></div>
       
      <h2><img src="img/sample.png" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('Sample size determination') ?></h2>
    </div>
<div class="core-samsizefrm">
<br><br><br><br><br>
<div class="container-caro2">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sam_size') ?>
        <?= $form->field($model, 'maxS_size') ?>
    <br>
    
        <div class="form-group" align="right">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-large btn-primary btn-round-btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>
<br><br>
</div><!-- core-samsizefrm -->
</div>