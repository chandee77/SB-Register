<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="core-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SLID') ?>

    <?= $form->field($model, 'District') ?>

    <?= $form->field($model, 'Ds') ?>

    <?= $form->field($model, 'Gn') ?>

    <?= $form->field($model, 'McUcPs') ?>

    <?php // echo $form->field($model, 'Establishment') ?>

    <?php // echo $form->field($model, 'PostalNo') ?>

    <?php // echo $form->field($model, 'FloorNo') ?>

    <?php // echo $form->field($model, 'BuildingName') ?>

    <?php // echo $form->field($model, 'Street') ?>

    <?php // echo $form->field($model, 'VillageTown') ?>

    <?php // echo $form->field($model, 'PostalTown') ?>

    <?php // echo $form->field($model, 'Other') ?>

    <?php // echo $form->field($model, 'LegalState') ?>

    <?php // echo $form->field($model, 'UnitNature') ?>

    <?php // echo $form->field($model, 'BeginingYear') ?>

    <?php // echo $form->field($model, 'AccountStaus') ?>

    <?php // echo $form->field($model, 'PersonEngage') ?>

    <?php // echo $form->field($model, 'PEID') ?>

    <?php // echo $form->field($model, 'Tel_Land1') ?>

    <?php // echo $form->field($model, 'Tel_Land2') ?>

    <?php // echo $form->field($model, 'Tel_Mob1') ?>

    <?php // echo $form->field($model, 'Tel_Mob2') ?>

    <?php // echo $form->field($model, 'E_mail1') ?>

    <?php // echo $form->field($model, 'E_mail2') ?>

    <?php // echo $form->field($model, 'RegInst1') ?>

    <?php // echo $form->field($model, 'RegInst2') ?>

    <?php // echo $form->field($model, 'RegInst3') ?>

    <?php // echo $form->field($model, 'RegInst4') ?>

    <?php // echo $form->field($model, 'RegInst5') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
