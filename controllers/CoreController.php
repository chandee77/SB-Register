<?php

namespace app\controllers;


use Yii;
use app\models\Core;
use app\models\CoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Slsic;
use app\models\Rgdinst;
use app\models\Legalstatus;
use app\models\Disds;
use app\models\Gn;
use app\models\Ds;
use app\models\Mcuc;
use app\models\District;
use app\models\DsdisSearch;
use yii\web\Response;
use yii\helpers\Json;
use yii\db\Expression;



/**
 * CoreController implements the CRUD actions for Core model.
 */
class CoreController extends Controller
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
    public function actionIndex()
    {
         return $this->redirect(Yii::$app->homeUrl);
    }
     public function actionTime()
    {
      echo yii::$app->getTimeZone();
    }
    public function actionEdit()
    {
        if (Yii::$app->user->can("verify") || Yii::$app->user->can("edit")|| Yii::$app->user->can("admin")|| Yii::$app->user->can("root")) {
        $searchModel = new CoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	$dataProvider->pagination->pageSize=50;
        $dataProvider->query->andWhere(['user_id'=>Yii::$app->user->identity->username]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }
public function actionVfy()
    {
        if (Yii::$app->user->can("verify")) {
        $searchModel = new CoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['vfy_id'=>'0']);
	$dataProvider->pagination->pageSize=50;

        return $this->render('v_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }
    public function actionView($id)
    {
        if (Yii::$app->user->can("delete") || Yii::$app->user->can("add") || Yii::$app->user->can("verify") || Yii::$app->user->can("edit")|| Yii::$app->user->can("admin")|| Yii::$app->user->can("root"))  {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    public function actionCreate()
    {
        if (Yii::$app->user->can("add")) {
         
        $model = new Core();
        $model1 = Slsic::find()->all();
        $model2 = Rgdinst::find()->all();
        $model3 = Legalstatus::find()->all();
        $model4=District::getDis();
      
 if($model->load(Yii::$app->request->post()) && $model->validate())
    {
            $model->create_at= new Expression('NOW()');
          
            $model->user_id=Yii::$app->user->identity->username;
            $model->ip = Yii::$app->request->userIP;
            $model->ins_method=0;
            
           if($model->RegInst1){
                foreach ($model->RegInst1 as $key=>$itm)
                {
                        if ($key==0) {$model->RegInst1=$itm;}
                    elseif ($key==1) {$model->RegInst2=$itm;}
                    elseif ($key==2) {$model->RegInst3=$itm;}
                    elseif ($key==3) {$model->RegInst4=$itm;}
                    elseif ($key==4) {$model->RegInst5=$itm;}                       
                }
            }
        
 

        if($model->save()){return $this->redirect(['view', 'id' => $model->SLID]);}
        else{throw new HttpException(500,'Internal Error..');}

    }      
                else {
            return $this->render('create', array(
                'model' => $model,'model1'=>$model1,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4,
            ));
        }
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can("edit")) {
        $model = $this->findModel($id);

        $model1 = Slsic::find()->all();
        $model2 = Rgdinst::find()->all();
        $model3 = Legalstatus::find()->all();
        $model4 = District::getDis();
        
       if(isset($_POST['Core'])) {
            $model->attributes=$_POST['Core'];
            $model->update_at= new Expression('NOW()');
            $model->updateCounters(['edit_ver'=>1]);
            $model->ip=Yii::$app->request->userIP;
            if($model->RegInst1){
   
                foreach ($model->RegInst1 as $key=>$itm)
                {
                        if ($key==0) {$model->RegInst1=$itm;}
                    elseif ($key==1) {$model->RegInst2=$itm;}
                    elseif ($key==2) {$model->RegInst3=$itm;}
                    elseif ($key==3) {$model->RegInst4=$itm;}
                    elseif ($key==4) {$model->RegInst5=$itm;}                       
                }
            }
               
              
                if($model->save())
                {
                     return $this->redirect(['view', 'id' => $model->SLID]);
                }else
                {  throw new NotFoundHttpException();}
        } else {
            return $this->render('update', array(
                'model' => $model,'model1'=>$model1,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4,
            ));
        }
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }
    
    public function actionVerify($id)
    {
        if (Yii::$app->user->can("verify")) {
        $model = $this->findModel($id);
        $model1 = Slsic::find()->all();
        $model2 = Rgdinst::find()->all();
        $model3 = Legalstatus::find()->all();
        $model4 = District::getDis();
        
       if(isset($_POST['Core'])) {
            $model->attributes=$_POST['Core'];
            $model->update_at= new Expression('NOW()');
            $model->updateCounters(['vfy_id'=>1]);
       
            if($model->RegInst1){
   
                foreach ($model->RegInst1 as $key=>$itm)
                {
                        if ($key==0) {$model->RegInst1=$itm;}
                    elseif ($key==1) {$model->RegInst2=$itm;}
                    elseif ($key==2) {$model->RegInst3=$itm;}
                    elseif ($key==3) {$model->RegInst4=$itm;}
                    elseif ($key==4) {$model->RegInst5=$itm;}                       
                }
            }
               
              
                if($model->save())
                {
                     return $this->redirect(['view', 'id' => $model->SLID]);
                }else
                {  throw new NotFoundHttpException();}
        } else {
            return $this->render('verify', array(
                'model' => $model,'model1'=>$model1,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4,
            ));
        }
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

     public function actionDel(){
         
        
        if (Yii::$app->user->can("delete")) {
         $searchModel = new CoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	$dataProvider->pagination->pageSize=50;
        return $this->render('delete', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,  
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

         
     }
    
    
    public function actionDelete($id)
    {
        if (Yii::$app->user->can("delete")) {
        $this->findModel($id)->delete();

        return $this->redirect(['del']);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }
    protected function findModel($id)
    {
        if (($model = Core::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionListmc() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $dis = $parents[0];
            $out = Mcuc::getMc($dis);
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
 }
    
    
public function actionSubcat() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $dis = $parents[0];
            $out = Ds::getDs($dis);  
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);

}
 
public function actionProd() {
    $out = [];
   
    if (isset($_POST['depdrop_parents'])) {
        $ids = $_POST['depdrop_parents'];
        $dis = empty($ids[0]) ? null : $ids[0];
        $ds = empty($ids[1]) ? null : $ids[1];
        if ($dis != null) {
           $data = Gn::getGn($dis, $ds);
           $selected='';
            $rr=1;
           foreach ($data as $dat => $datas) {
                    $out[] = ['id' => $datas['id'], 'name' => $datas['name']];
                   $rr++;
                    if($rr==114){break;}
                }
               echo Json::encode([
            'output'=>$out, 
            'selected'=>$selected
        ]);
           
           return;
          
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}
}
