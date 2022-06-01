<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcuc".
 *
 * @property integer $id
 * @property integer $dis
 * @property integer $mcuc
 * @property string $name
 */
class Mcuc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mcuc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dis', 'mcuc'], 'required'],
            [['dis', 'mcuc'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dis' => 'Dis',
            'mcuc' => 'Mcuc',
            'name' => 'Name',
        ];
    }
    
    public static function getMc($dis) {
        $data=self::find()
        ->where(['dis'=>$dis])
        ->select(['mcuc as id','name'])->asArray()->all();
        return ($data);
     }
}
