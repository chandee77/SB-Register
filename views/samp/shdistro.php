<?php 

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('app', 'Allocation of samples to different strata');
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="Row"><div class="col-sm-1"></div>
       
      <h2><img src="img/sample.png" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('Allocation of samples') ?></h2>
    </div>
 <!-- <br><br><br><br> -->
<div class="container-caro">
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'strtum',
        'count',
        'propotion',
        'cumulative_sum',
    ],
]); 
?>

<div style="display: inline;" align="right">
<?= Html::a('Proceed', ['/samp/drwsamp'], ['class'=>'btn btn-primary btn-round-btn-block']) ?> 
<?php echo "           "; ?>
<?= Html::a('Re Calculate', ['/samp/getprobtb'], ['class'=>'btn btn-primary btn-round-btn-block']) ?>
<?php echo "           "; ?>
<?= Html::a('Cancel', ['/samp/getpe'], ['class'=>'btn btn-primary btn-round-btn-block']) ?>
<br><br>
</div>

</div>