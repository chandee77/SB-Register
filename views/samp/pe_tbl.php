<?php 
use yii\helpers\Html;
$this->title = Yii::t('app', 'Strata Distribution');
$this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="Row"><div class="col-sm-1"></div>
       
      <h2><img src="img/sample.png" style="width:50px;height:50px;">&nbsp;&nbsp;<?= Html::encode('PE Strata Distribution') ?></h2>
    </div>
 <br><!-- <br><br><br> -->
<div class="container-caro">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Strata</th>
      <th scope="col">Count</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Census</td>
      <td><?=$cnt_hst ?></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>PE Strata-1(Highest)</td>
      <td><?=$cnt_hgh ?></td>
    
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>PE Strata-2(Middle)</td>
      <td><?=$cnt_btn ?></td>
     
    </tr>
     <tr>
      <th scope="row">4</th>
      <td>PE Strata-3(Lowerst)</td>
      <td><?=$cnt_lwr ?></td>
     
    </tr>
     <tr>
      <th scope="row">5</th>
      <td>PE N/A</td>
      <td><?=$cnt_zer ?></td>
    </tr>
     <tr>
      <th scope="row">6</th>
      <td>Total</td>
      <td><b><i><?php echo ($cnt_zer+$cnt_lwr+$cnt_btn+$cnt_hgh+$cnt_hst ); ?></i></b></td>
    </tr>
  </tbody>
</table>
<div style="display: inline;" align="right">
<br>
<?= Html::a('Proceed', ['/samp/getprobtb'], ['class'=>'btn btn-primary btn-round-btn-block']) ?> 
<?php echo "            "; ?>
<?= Html::a('Cancel', ['/samp/getpe'], ['class'=>'btn btn-primary btn-round-btn-block']) ?>
<br><br>
</div>
</div>