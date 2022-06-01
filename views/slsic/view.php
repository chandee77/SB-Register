<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\slsic */

$this->title = $model->industry;
$this->params['breadcrumbs'][] = ['label' => 'Slsics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->CombID;
?>
<div class="slsic-view">
<div class="container-caro">
    <h4><?= Html::encode($model->CombID) ?></h4>

    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id5d',
            'industry',
        ],
    ]) ?>
    <br>
      <p>
        <?= Html::a('Update', ['update', 'id' => $model->id5d], ['class' => 'btn btn-primary btn-round']) ?> 
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-g btn-round']) ?>
    </p>

</div>
</div>
