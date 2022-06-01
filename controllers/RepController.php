<?php

namespace app\controllers;


use Yii;
use app\models\Core;
use app\models\CoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\models\Slsic;
use app\models\Rgdinst;
use app\models\Legalstatus;
use app\models\Repfilter;
//use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CoreController implements the CRUD actions for Core model.
 */
class RepController extends Controller
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
    public function actionGeo()
    {
        if (Yii::$app->user->can("report")) {
        $searchModel = new CoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('geo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

        
    }
    
    public function actionView($id)
    {
        if (Yii::$app->user->can("report")) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }
    
    public function actionOthe()
    {
        if (Yii::$app->user->can("report")) {
        $searchModel = new CoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('other', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

        
    }
    
    public function actionAddr()
    {
        if (Yii::$app->user->can("report")) {
        $searchModel = new CoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('addr', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
    
    
}
    