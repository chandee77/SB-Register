<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Core */

$this->title = $model->Establishment;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="core-view">
<div class="container-caro">
    <h4><?= Html::encode($model->GeoID) ?></h4>
    <br>
  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'SLID',
            'District',
            'Ds',
            'Gn',
            'McUcPs',
            'Establishment',
           [
                'label' => 'Address',
                'attribute' => 'Full_Address',
            ],
            'LegalState',
            'UnitNature',
            'BeginingYear',
            'AccountStaus',
            'PersonEngage',
            [
                'label' => 'Telephone',
                'attribute' => 'Tel',
            ],
            [
                'label' => 'E-Mail',
                'attribute' => 'Mail',
            ],
           [
                'label' => 'Registerd Institute',
                'attribute' => 'Rgdins',
            ],
        ],
    ]) ?>
    
      <p>
        <?= Html::a(Yii::t('app', 'Back'), ['create'], ['class' => 'btn btn-g btn-round btn-block']) ?>
    </p>
    
<br></br><br>
</div>
</div>
