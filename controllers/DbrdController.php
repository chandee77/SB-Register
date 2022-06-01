<?php

namespace app\controllers;


use Yii;
use app\models\Core;
use app\models\CoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use app\models\District;
use yii\data\SqlDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * CoreController implements the CRUD actions for Core model.
 */
class DbrdController extends Controller
{
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
    
    
    public function actionTest()	{
        
        if (Yii::$app->user->can("dbrd")) {
        
       $update= Core::find()->max('update_at');
       $totest= Core::find()->count('SLID');
       $newrec= Core::find()->where('create_at > DATE_ADD(NOW(), INTERVAL -6 DAY)')->count('SLID');
       $uprec=Core::find()->where('edit_ver > 0')->count('SLID');
       $vrirec=Core::find()->where('vfy_id >  0')->count('SLID');
        
           $provider_sca = new SqlDataProvider([           
        'sql' => 'select SLID,rand(5)*10  as value from core where personengage is null',
        'pagination' => false,
        ]);
           
        $provider_map = new SqlDataProvider([           
                    'sql'=>"select 
            case LEFT(District,1)
	when '1' then 'LK-1'
	when '2' then 'LK-2'
	when '3' then 'LK-3'
	when '4' then 'LK-4'
	when '5' then 'LK-5'
	when '6' then 'LK-6'
	when '7' then 'LK-7'
	when '8' then 'LK-8'
	when '9' then 'LK-9'
	else district
	END AS Province,
        case LEFT(District,1)
	when '1' then 'Western Province'
	when '2' then 'Central Province'
	when '3' then 'Southern Province '
	when '4' then 'Northern Province'
	when '5' then 'Eastern Province'
	when '6' then 'North Western Province'
	when '7' then 'North Central Province'
	when '8' then 'Uva Province '
	when '9' then 'Sabaragamuwa Province'
	else district 
	END as label,
        count(SLID)AS Establishments from core group BY LEFT(district,1)",
        'pagination' => false,
        ]);
        
          $provider_bar = new SqlDataProvider([           
        'sql'=>'select rgdinst.name,count(core.reginst1)as count from core inner join rgdinst on core.reginst1=rgdinst.id group by rgdinst.id',
        'pagination' => false,
        ]);
             $provider_pie = new SqlDataProvider([           
        'sql' => 'select district.name,count(core.District)as count from core inner join district on core.District=district.dis group by District',
        'pagination' => false,
        ]);
        
         $provider_area = new SqlDataProvider([           
        'sql' => 'select slsic.Industry,count(core.District)as count from core inner join slsic on core.slsic=slsic.id5d group by slsic.id5d',
        'pagination' => false,
        ]);
	return $this->render('view', [
		'dataProvider_A' => $provider_area,'dataProvider_P' => $provider_pie,'dataProvider_B' => $provider_bar,'dataProvider_M' => $provider_map,'dataProvider_s' => $provider_sca,'totest'=>$totest,'newrec'=>$newrec,
            'update_at'=>$update,'uprec'=>$uprec,'vrirec'=>$vrirec,
	]);
    }
    else
    {throw new  HttpException(403, 'You are not allowed to perform this action.');}
    }
    
    
    
    

}
