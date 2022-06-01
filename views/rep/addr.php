<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<div class="container-caro">
<br><br>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
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
            'PostalNo',
            'FloorNo',
             'BuildingName',
             'Street',
             'VillageTown',
             'PostalTown',
             'Other',
            'slsic',
//             'LegalState',
//             'UnitNature',
//             'BeginingYear',
//             'AccountStaus',
//             'PersonEngage',
//             'PEID',
//             'Tel_Land1',
//             'Tel_Land2',
//             'Tel_Mob1',
//             'Tel_Mob2',
//             'E_mail1',
//             'E_mail2',
//             'RegInst1',
//             'RegInst2',
//             'RegInst3',
//             'RegInst4',
//             'RegInst5',

           // ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
