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
            'slsic',
//             'PostalNo',
//            'FloorNo',
//             'BuildingName',
//             'Street',
//             'VillageTown',
//             'PostalTown',
//             'Other',
             'LegalState',
             'UnitNature',
             'BeginingYear',
             'AccountStaus',
             'PersonEngage',
//             'PEID',
            [
                'label' => 'Telephone',
                'attribute' => 'Tel',
            ],
             [
                'label' => 'E-Mail',
                'attribute' => 'Mail',
            ],
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
