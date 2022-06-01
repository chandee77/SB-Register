<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'SBR Admin');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="core-index">

    <!-- <h2><span class="glyphicon glyphicon-tower" style="color: black"></span>&nbsp;&nbsp;<?= ' '.Html::encode($this->title) ?></h2> -->
<h2><img src="img/sbr_admin.jpg" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode($this->title) ?></h2>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             ['attribute'=>'District',
			'value'=>'district.name'
			],
            'Ds',
            'Gn',
            'McUcPs',
           'Establishment',
            'PersonEngage',
            [
                'label' => 'Address',
                'attribute' => 'Full_Address',
            ],

             'LegalState',
             'UnitNature',
             'BeginingYear',
             'AccountStaus',
             'slsic',
            // 'Tel_Land1',
            // 'Tel_Land2',
            // 'Tel_Mob1',
            // 'Tel_Mob2',
            // 'E_mail1',
            // 'E_mail2',
            // 'RegInst1',
            // 'RegInst2',
            // 'RegInst3',
            // 'RegInst4',
            // 'RegInst5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
