<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SLSIC Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="slsic-index">
<div class="container-caro">
   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
<h2><img src="img/details.jpg" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode($this->title) ?></h2>
<br></br>
    <p>
        <?= Html::a('Create Slsic', ['create'], ['class' => 'btn btn-primary btn-round btn-block']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id5d',
            'industry',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
