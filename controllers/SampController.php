<?php

namespace app\controllers;

use Yii;
use app\models\Core;
use app\models\CoreSearch;
use app\models\SamtholdForm;
use app\models\SamStratumA;
use app\models\SamProb;
use app\models\samSizeform;
use app\models\SamSrs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;

/**
 * CoreController implements the CRUD actions for Core model.
 */
class SampController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Core models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionGetpe()
    {
		if (Yii::$app->user->can("admin")|| Yii::$app->user->can("root")) {
		        $PEModel= new SamtholdForm();

    if ($PEModel->load(Yii::$app->request->post())) { 
        $i=0; $grp=null;$cntA=$PEModel->pe_highest;$cntB=$PEModel->pe_higher;$cntC=$PEModel->pe_betw1;$cntD=$PEModel->pe_betw2;$cntE=$PEModel->pe_lower;
        Yii::$app->db->createCommand()->truncateTable('sam_stratum_a')->execute();
        foreach (Core::findBySql('select SLID,District,PersonEngage,slsic from core')->batch(1000) as $core) {
        
            foreach ($core as $key => $core_itm) {
              
                  if(empty($core_itm->PersonEngage)){$core_itm->PersonEngage=0;}
                   if($core_itm->PersonEngage >= $PEModel->pe_highest){
                       $grp=0;}
                   elseif ($core_itm->PersonEngage >= $PEModel->pe_higher && $core_itm->PersonEngage < $PEModel->pe_highest){
                       $grp=1;
                   }elseif($core_itm->PersonEngage >= $PEModel->pe_betw2 && $core_itm->PersonEngage <= $PEModel->pe_betw1){
                       $grp=2;
                   }elseif($core_itm->PersonEngage <= $PEModel->pe_lower && $core_itm->PersonEngage>0){
                       $grp=3;
                   }elseif($core_itm->PersonEngage==0){$grp=9;}


                

                   $rows[] = [
                        'slsID' => $core_itm->SLID,
                        'district' => $core_itm->District,
                        'slsic2d' => substr(str_pad($core_itm->slsic, 5,0,STR_PAD_LEFT),0,2),
                        'pe' => $core_itm->PersonEngage,
                        'stratumID' =>  $core_itm->District.substr(str_pad($core_itm->slsic, 5,0,STR_PAD_LEFT),0,2),
                        'grp' => $grp,
                        'strid_pe' => $core_itm->District.substr(str_pad($core_itm->slsic, 5,0,STR_PAD_LEFT),0,2).$grp,
                    ];

                   $i++;

            }
            Yii::$app->db->createCommand()->batchInsert(SamStratumA::tableName(), ['slsID','district','slsic2d','pe','stratumID','grp','strid_pe'], $rows)->execute();
            unset($rows);

        }
        $cnt_hst = SamStratumA::find()->where(['grp' => '0'])->count();
        $cnt_hgh = SamStratumA::find()->where(['grp' => '1'])->count();
        $cnt_btn = SamStratumA::find()->where(['grp' => '2'])->count();
        $cnt_lwr = SamStratumA::find()->where(['grp' => '3'])->count();
        $cnt_zer = SamStratumA::find()->where(['grp' => '9'])->count();

         return $this->render('pe_tbl', ['cnt_hst'=>$cnt_hst,'cnt_hgh'=>$cnt_hgh,'cnt_btn'=>$cnt_btn,'cnt_lwr'=>$cnt_lwr,'cnt_zer'=>$cnt_zer,'cntA'=>$cntA,'cntB'=>$cntB,'cntC'=>$cntC,'cntD'=>$cntD,'cntE'=>$cntE]);

    }
     return $this->render('pe', ['model'=>$PEModel,
            
        ]);
		}
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    public function actionGetprobtb()
    {
		if (Yii::$app->user->can("admin")|| Yii::$app->user->can("root")) {
	        //1.get required sample size,then cal probability PS,with sql queary and store in table
            //done 2.// //SQL=>SELECT strid_pe,grp, count(slsid) as cnt,round((count(slsid)/(select count(slsid) as prob from sam_stratum_a where grp=1 or grp=2 or grp=3))*500,0) as P FROM sbr_sample1.sam_stratum_a 
            // where grp=1 or grp=2 or grp=3 group by strid_pe order  by cnt desc ;
        $SizeModel = new samSizeform();
               if ($SizeModel->load(Yii::$app->request->post())) {
     
      
            $cc=$SizeModel->sam_size;
            $max_allocation=$SizeModel->maxS_size;
            if( $max_allocation==0){ $max_allocation=$cc;}

        $sql="SELECT strid_pe,grp, count(slsid) as cnt,round((count(slsid)/(select count(slsid) as prob from sam_stratum_a where grp=1 or grp=2 or grp=3))*:x,0) as P FROM sam_stratum_a where grp=1 or grp=2 or grp=3 group by strid_pe order  by cnt desc ";
        $provider = new SqlDataProvider([
            'sql' => $sql,
            'params' =>[':x'=>$cc],
            'pagination' => false,
        ]);

        Yii::$app->db->createCommand()->truncateTable('sam_prob')->execute();
        $tot_cnt=0;
        foreach ($provider->getModels() as $key => $tb_val) {
            $tot_cnt=$tot_cnt+$tb_val['P'];
                $Var_prob=null;
                if($tb_val['P']<=$max_allocation)
                    { //$vtb->prob = $tb_val['P'];
                         $Var_prob= $tb_val['P'];
                        }
                elseif ($tb_val['P']>$max_allocation) {
                 //$vtb->prob = $max_allocation;
                  $Var_prob=$max_allocation;
                }

             $rows[] = [$tb_val['strid_pe'],$tb_val['grp'],$tb_val['cnt'],$Var_prob,];
        }
        Yii::$app->db->createCommand()->batchInsert(SamProb::tableName(), ['strid_pe','grp','cnt','prob'], $rows)->execute();
        unset($rows);



        $pull= $cc-$tot_cnt;


//------------->> consider instead of use round use ceil and floor to minimize error for that can calculate first and then apply to table above block... <<--------------

//------------>> we now select balnced form zero probability blocks << --------------

     if( $pull>0) {  $count_prob=SamProb::find()->where(['prob'=> 0])->andWhere(['grp'=>1]);
              $zerocnt=$count_prob->count();
              $sql1="SELECT * FROM sam_prob where prob=:y and grp=:z order by strid_pe";
              $provider1 = new SqlDataProvider([
                  'sql' => $sql1,
                  'params' =>[':y'=>0,':z'=>1],
                  'pagination' => false,
              ]);
              $K=round($zerocnt/($pull/3));
              if($zerocnt>=$pull/3)
               {$itm1=rand(0,round($pull/3));}
              else{$itm1=rand(0,$zerocnt-1);}
               $itm2=$itm1;
               $zeroitmcnt=0;
               for($ccx=1;$ccx<=round($pull/3);$ccx++)
               {
         
                  $var_change=$provider1->getModels()[$itm2];
                  
      
                  Yii::$app->db->createCommand()
                   ->update('sam_prob', ['probajst' => 1], ['strid_pe' => $var_change['strid_pe']])
                   ->execute();
                  
                  if($itm2+$K<$zerocnt)
                  {$itm2=$itm2+$K;}  
                  elseif($itm2+$K>=$zerocnt)
                  {$itm2=$itm2+$K-$zerocnt;}
                  $zeroitmcnt++;
               }
      
          
              $count_prob2=SamProb::find()->where(['prob'=> 0])->andWhere(['grp'=>2]);
              $zerocnt2=$count_prob2->count();
              $sql2="SELECT * FROM sam_prob where prob=:p and grp=:q order by strid_pe";
              $provider2 = new SqlDataProvider([
                  'sql' => $sql2,
                  'params' =>[':p'=>0,':q'=>2],
                  'pagination' => false,
              ]);
              $K2=round($zerocnt2/($pull/3));
              if($zerocnt2>=$pull/3)
               {$itm12=rand(0,round($pull/3));}
              else{$itm12=rand(0,$zerocnt2-1);}
               $itm22=$itm12;
      
               for($ccx2=1;$ccx2<=round($pull/3);$ccx2++)
               {
                  $var_change2=$provider2->getModels()[$itm22];
                  Yii::$app->db->createCommand()
                   ->update('sam_prob', ['probajst' => 1], ['strid_pe' => $var_change2['strid_pe']])
                   ->execute();
                  if($itm22+$K2<$zerocnt2)
                  {$itm22=$itm22+$K2;} 
                  elseif($itm22+$K2>=$zerocnt2)
                  {$itm22=$itm22+$K2-$zerocnt2;}
                   $zeroitmcnt++;
               }
              $count_prob3=SamProb::find()->where(['prob'=> 0])->andWhere(['grp'=>3]);
              $zerocnt3=$count_prob3->count();
              $sql3="SELECT * FROM sam_prob where prob=:t and grp=:u order by strid_pe";
              $provider3 = new SqlDataProvider([
                  'sql' => $sql3,
                  'params' =>[':t'=>0,':u'=>3],
                  'pagination' => false,
              ]);
              
              $pull3=$pull-$zeroitmcnt;
              $K3=round($zerocnt3/$pull3);
               if($zerocnt3>=$pull/3)
               {$itm13=rand(0,round($pull/3));}
              else{$itm13=rand(0,$zerocnt3-1);}
               $itm23=$itm13;
      
               for($ccx3=1;$ccx3<=$pull3;$ccx3++)
               {
                  $var_change3=$provider3->getModels()[$itm23];    
                  Yii::$app->db->createCommand()
                   ->update('sam_prob', ['probajst' => 1], ['strid_pe' => $var_change3['strid_pe']])
                   ->execute();
                  if($itm23+$K3<$zerocnt3)
                  {$itm23=$itm23+$K3;}
                  elseif($itm23+$K3>=$zerocnt3)
                  {$itm23=$itm23+$K3-$zerocnt3;}
                  $zeroitmcnt++;
               } }


//------->>> end getting from zero prob blocks <<<------------

            Yii::$app->db->createCommand('set @csum := 0')->execute();
            $sql_lst="SELECT strid_pe as strtum,cnt as count,probajst as propotion ,(@csum := @csum + probajst) as cumulative_sum FROM sam_prob where probajst!=:s order by
                probajst desc";
            $prov_lst = new SqlDataProvider([
                'sql' => $sql_lst,
                'params' =>[':s'=>0],
                'pagination' => false,
            ]);
            Yii::$app->db->createCommand('set @csum := 0')->execute();
            $sql_lst2="SELECT strid_pe as strtum,cnt as count,prob as propotion ,(@csum := @csum + prob) as cumulative_sum FROM sam_prob where prob!=:t order by prob desc";
            $prov_lst2 = new SqlDataProvider([
                'sql' => $sql_lst2,
                'params' =>[':t'=>0],
                'pagination' => false,
            ]);

            $data = array_merge($prov_lst2->getModels(), $prov_lst->getModels());

            $dataProvider = new ArrayDataProvider([
              'allModels' => $data,
              'pagination' => false,
            ]);

             return $this->render('shdistro', ['dataProvider'=>$dataProvider, ]);

         }

        return $this->render('samsizefrm', ['model'=>$SizeModel,
            
        ]);

	}
		else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}


    }

    public function actionDrwsamp()
    {
		if (Yii::$app->user->can("admin")|| Yii::$app->user->can("root")) {
		
        Yii::$app->db->createCommand()->truncateTable('sam_srs')->execute();
        $sql_lst2="SELECT strid_pe as strtum,cnt as count,prob as propotion FROM sam_prob where prob!=:t order by prob desc";
            $prov_lst2 = new SqlDataProvider([
                'sql' => $sql_lst2,
                'params' =>[':t'=>0],
                'pagination' => false,
            ]);
            $i=1;
            foreach ($prov_lst2->getModels() as $key => $value) {

                $sql_l="SELECT slsid FROM sam_stratum_a where strid_pe=:z";

                $dp= new SqlDataProvider([
                'sql' => $sql_l,
                'params' =>[':z'=>$value['strtum']],
                'pagination' => false,
            ]);
            
            $srs_tot=$value['count'];
            $srs_draw=$value['propotion'];
            $lngth=round($srs_tot/$srs_draw);
            $fst_val=rand(0,($lngth-1));
            $elc=$fst_val;

            

            // echo $srs_tot.' - '.$srs_draw.' - '.$lngth.'->'.$elc.'<br>';

                for($ccx4=1;$ccx4<=$srs_draw;$ccx4++)
                 { 
                    $var_elec=$dp->getModels()[$elc];
                    $m_srs = new SamSrs();
                    $m_srs->slsid=$var_elec['slsid'];
                    $m_srs->ser_no=$i;
                    $m_srs->stratum=$value['strtum'];
                    //
                       $query_core = Core::find()->Where(['slid'=>$var_elec['slsid']]);
                       $provider_core = new ActiveDataProvider([
                            'query' => $query_core,
                            'pagination' => false,
                        ]);
                       $m_srs->est = $provider_core->getModels()[0]['Establishment'];
                       $m_srs->addr = $provider_core->getModels()[0]['PostalNo'].';'.$provider_core->getModels()[0]['FloorNo'].';'.$provider_core->getModels()[0]['BuildingName'].';'.$provider_core->getModels()[0]['Street'].';'.$provider_core->getModels()[0]['VillageTown'].';'.$provider_core->getModels()[0]['PostalTown'].';'.$provider_core->getModels()[0]['Other'];
                       $m_srs->tel =$provider_core->getModels()[0]['Tel_Land1'].';'.$provider_core->getModels()[0]['Tel_Land2'].';'.$provider_core->getModels()[0]['Tel_Mob1'].';'.$provider_core->getModels()[0]['Tel_Mob2'];
                       $m_srs->pe =$provider_core->getModels()[0]['PersonEngage'];

                    $m_srs->save();

                  // echo $i." ->elec ".$elc.'<br>';

                    if($elc+$lngth<$srs_tot)
                    {$elc=$elc+$lngth;}
                    elseif($elc+$lngth>=$srs_tot)
                    {$elc=$elc+$lngth-$srs_tot;}
                    $i++;
                 }                   
            }
             //>>>>>>>>>>>>>>>>>>>>    

            $sql_lst2="SELECT strid_pe as strtum,cnt as count,probajst as propotion FROM sam_prob where probajst!=:t order by prob desc";
            $prov_lst2 = new SqlDataProvider([
                'sql' => $sql_lst2,
                'params' =>[':t'=>0],
                'pagination' => false,
            ]);
            // $i=1;
            foreach ($prov_lst2->getModels() as $key1 => $value1) {

                $sql_l1="SELECT slsid FROM sam_stratum_a where strid_pe=:za";

                $dp= new SqlDataProvider([
                'sql' => $sql_l1,
                'params' =>[':za'=>$value1['strtum']],
                'pagination' => false,
            ]);
            
            $srs_tot=$value1['count'];
            $srs_draw=1;
            $lngth=round($srs_tot/$srs_draw);
            if($lngth==1){$fst_val=0;}else
           { $fst_val=rand(0,($lngth-1));}
            $elc=$fst_val;
            // echo $srs_tot.' - '.$srs_draw.' - '.$lngth.'->'.$elc.'<br>';
                for($ccx4=1;$ccx4<=$srs_draw;$ccx4++)
                 {
                   // echo $i." ->elec ".$elc.'<br>';
                    $var_elec=$dp->getModels()[$elc];
                    $m_srs = new SamSrs();
                    $m_srs->slsid=$var_elec['slsid'];
                    $m_srs->ser_no=$i;
                    $m_srs->stratum=$value1['strtum'];

                       $query_core = Core::find()->Where(['slid'=>$var_elec['slsid']]);
                       $provider_core = new ActiveDataProvider([
                            'query' => $query_core,
                            //'params' =>[':id'=>$var_elec['slsid']],
                            'pagination' => false,
                        ]);
                       $m_srs->est = $provider_core->getModels()[0]['Establishment'];
                       $m_srs->addr = $provider_core->getModels()[0]['PostalNo'].';'.$provider_core->getModels()[0]['FloorNo'].';'.$provider_core->getModels()[0]['BuildingName'].';'.$provider_core->getModels()[0]['Street'].';'.$provider_core->getModels()[0]['VillageTown'].';'.$provider_core->getModels()[0]['PostalTown'].';'.$provider_core->getModels()[0]['Other'];
                       $m_srs->tel =$provider_core->getModels()[0]['Tel_Land1'].';'.$provider_core->getModels()[0]['Tel_Land2'].';'.$provider_core->getModels()[0]['Tel_Mob1'].';'.$provider_core->getModels()[0]['Tel_Mob2'];
                       $m_srs->pe =$provider_core->getModels()[0]['PersonEngage'];

                    $m_srs->save();
 
                    $i++;
                 }                   
            }


            //send result to front end

            $sql="SELECT * FROM sam_srs";
            $dtp=new SqlDataProvider([
                'sql' => $sql,
                'pagination' => false,
            ]);
             return $this->render('shsrssmp', ['dataProvider'=>$dtp, ]);
			 
		}
		else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}
  }

    public function actionGetprobtb1()
    {
		 $SizeModel = new samSizeform();
					   if ($SizeModel->load(Yii::$app->request->post())) {
			 
			  
					$cc=$SizeModel->sam_size;
					$max_allocation=$SizeModel->maxS_size;
					echo $cc;echo ' -> ';echo $max_allocation;
					}
					
	}


   

}
