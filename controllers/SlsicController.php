<?php

namespace app\controllers;

use Yii;
use app\models\Slsic;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
//use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SlsicController implements the CRUD actions for slsic model.
 */
class SlsicController extends Controller
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
     * Lists all slsic models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can("slsic")) {
        $dataProvider = new ActiveDataProvider([
            'query' => Slsic::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    /**
     * Displays a single slsic model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can("slsic")) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    /**
     * Creates a new slsic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can("slsic")) {
        $model = new Slsic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id5d]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    /**
     * Updates an existing slsic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can("slsic")) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id5d]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    /**
     * Deletes an existing slsic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can("delete")) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }
        else
        {throw new  HttpException(403, 'You are not allowed to perform this action.');}

    }

    /**
     * Finds the slsic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return slsic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = slsic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
