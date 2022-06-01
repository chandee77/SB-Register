<?php 

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\export\ExportMenu;
$this->title = Yii::t('app', 'SBR Draw sample');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Row"><div class="col-sm-1"></div>
       
      <h2><img src="img/sample.png" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('Draw sample') ?></h2>
    </div>
<!--  <br><br><br><br> -->
<div class="container-caro">
       

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
    	'ser_no',
        'slsid',
        'stratum',
        'est',
        'addr',
        //'tel',
        //'pe',    
    ],
]); 
?>
 <div align="right"><button type="button" class="btn btn-primary" disabled>Print</button></div>
<br><br>
</div>
