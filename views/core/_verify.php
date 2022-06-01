<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use kartik\form\ActiveFormAsset;
use kartik\widgets\DepDrop;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Core */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="core-form">
   

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => FALSE]); ?>
    
    <?php  
    $data_rgdInd=ArrayHelper::map($model2,'id','name');
    $data_staus=ArrayHelper::map($model3,'id','status');
    $district=ArrayHelper::map($model4,'dis','name');
    $data_unitT=array(1=>'Single',2=>'Head Office',3=>'Multiple Unit');
    $data_accM=array(1=>'Documented',2=>'Not Documented');
    ?>
    
    
    <div class="row"><div class="col-md-12">	
    <fieldset>
    <legend>Identification</legend>

    <div class="col-md-3"><?= $form->field($model, 'District')->dropDownList($district, ['id' => 'dis','prompt'=>'--Select District--']); ?></div>

    <div class="col-md-3"><?= $form->field($model, 'Ds')->widget(DepDrop::classname(), ['options' => ['id' => 'ds'], 'pluginOptions' => ['depends' => ['dis'], 'placeholder' => ('--Select DS--'), 'url' => Url::to(['core/subcat'])]]); ?></div>

    <div class="col-md-3"><?= $form->field($model, 'Gn')->widget(DepDrop::classname(), ['pluginOptions' => ['depends' => ['dis', 'ds'],'initDepends'=>['dis', 'ds'], 'placeholder' =>('--Select GN--'), 'url' => Url::to(['/core/prod'])]]);
        ?></div>

    <div class="col-md-3"><?= $form->field($model, 'McUcPs')->widget(DepDrop::classname(), ['options' => ['id' => 'id'], 'pluginOptions' => ['depends' => ['dis'], 'placeholder' => '--Select MC/UC/PC--', 'url' => Url::to(['/core/listmc'])]]); ?></div>
		
    <div><br></br></div>	
    <div class="col-md-8"><?= $form->field($model, 'Establishment')->textInput(['maxlength' => true,'placeholder' => "--Enter Establishment Name--"]) ?></div>

    <div class="col-md-4"><?php $data=ArrayHelper::map($model1,'id5d','industry'); echo $form->field($model, 'slsic')->widget(Select2::classname(), ['data' => $data, 'options' => ['placeholder' => '--Select SLSIC Code--'], 'pluginOptions' => ['allowClear' => true],]); ?></div>

	<div class="col-md-12"></fieldset></div>
		
    <?php //echo $model->getAttributeLabel('Address'); ?></div>
	
	<!--<div class="row"><div class="col-md-12">	
	<fieldset>
    <legend></legend>
	 </fieldset></div></div>-->

	 <div class="row"><div class="col-md-12">	 <br></br>
	
    <fieldset>
            <legend>Address</legend>
	
	<div class="col-md-2">
    <?= $form->field($model, 'PostalNo')->textArea()->label(false)->textInput(['maxlength' => true])->textInput(['placeholder' => "Postal No"]) ?></div>
	
	<div class="col-md-2">
    <?= $form->field($model, 'FloorNo')->textArea()->label(false)->textInput(['maxlength' => true])->textInput(['placeholder' => "Floor No"]) ?></div>
    
	<div class="col-md-4">
    <?= $form->field($model, 'BuildingName')->textArea()->label(false)->textInput(['maxlength' => true])->textInput(['placeholder' => "Building Name"]) ?></div>

	<div class="col-md-4">
    <?= $form->field($model, 'Street')->textArea()->label(false)->textInput(['maxlength' => true])->textInput(['placeholder' => "Street/Road/Avenue"]) ?></div>

	<div class="col-md-4">
    <?= $form->field($model, 'VillageTown')->textArea()->label(false)->textInput(['maxlength' => true])->textInput(['placeholder' => "Village Town"]) ?></div>

	<div class="col-md-4">
    <?= $form->field($model, 'PostalTown')->textArea()->label(false)->textInput(['maxlength' => true])->textInput(['placeholder' => "Postal Town"]) ?></div>

	<div class="col-md-4">
    <?= $form->field($model, 'Other')->textArea()->label(false)->textarea(['maxlength' => true])->textInput(['placeholder' => "Other (Eg: 7th mile post)"]) ?>
        </div>
    </fieldset></div></div>
	
    
    <div class="row"><div class="col-md-12">	 
	<fieldset>
            <!-- <legend></legend>  -->
            <br></br>
    <fieldset>
    <legend>Telephone No.</legend>
	<div class="col-md-3"><?= $form->field($model, 'Tel_Land1',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-earphone"></i>']]])->textInput()->label(false)->textInput(['placeholder' => "Land Line #1"]); ?></div>

    <div class="col-md-3"><?= $form->field($model, 'Tel_Land2',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-earphone"></i>']]])->textInput()->label(false)->textInput(['placeholder' => "Land Line #2"]); ?></div>

    <div class="col-md-3"><?= $form->field($model, 'Tel_Mob1',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]])->textInput()->label(false)->textInput(['placeholder' => "Mobile #1"]); ?></div>

    <div class="col-md-3"><?= $form->field($model, 'Tel_Mob2',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]])->textInput()->label(false)->textInput(['placeholder' => "Mobile #2"]); ?></div>
	</fieldset></div></div>

    <div class="row"><div class="col-md-12">
	<fieldset>
    <legend>E-Mail</legend>
    <div class="col-md-6"><?= $form->field($model, 'E_mail1',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]])->textInput()->label(false)->textInput(['placeholder' => "E-Mail #1"]); ?></div>
       
    <div class="col-md-6"><?= $form->field($model, 'E_mail2',['addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]])->textInput()->label(false)->textInput(['placeholder' => "E-Mail #2"]); ?></div>
	</fieldset></fieldset></div></div>

	<div class="row"><div class="col-md-12"><br></br>
	<fieldset>
    
	<legend>Other</legend>
	
	<div class="col-md-3">
	<?= $form->field($model, 'LegalState')->multiselect($data_staus,array('selector'=>'radio')); ?></div>
	
	<div class="col-md-3">
	<?= $form->field($model, 'RegInst1')->multiselect($data_rgdInd); ?></div>
		
	<div class="col-md-3">
            <?=
            $form->field($model, 'UnitNature')->widget(Select2::classname(), [
                'data' => $data_unitT,
                'options' => ['placeholder' => 'Nature of Unit'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
 
 <div class="col-md-3"><?= $form->field($model, 'BeginingYear')->widget(DatePicker::classname(), [
    'name' => 'dp_1',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'pluginOptions' => [
        'autoclose'=>true,
        'maxViewMode'=>'centuries',
         'minViewMode'=>'year',
        'format' => 'yyyy'
    ]
]); ?></div>
 
 <div class="col-md-3">
          <?=$form->field($model, 'AccountStaus')->widget(Select2::classname(), [
             'data' => $data_accM,
             'options' => ['placeholder' => 'Account Status'],
             'pluginOptions' => [
                 'allowClear' => true
             ],
         ]);
         ?>
 </div>

    <div class="col-md-3"><?= $form->field($model, 'PersonEngage')->textInput() ?></div>

    </div></div>
      
    <div class="row"><br></br>
    </fieldset></div>
        </div>
    <div class="form-group" align="right">
        <div class="col-md-12">    
  <!-- <center>       -->
    <?= Html::submitButton('Verified', ['class' => 'btn btn-primary btn-round btn-block']) ?>
    <!-- </center> -->
</div></div><br></br><br></br></div> 
</div>

    <?php ActiveForm::end(); ?>

    </div></div>
