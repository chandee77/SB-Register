<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ds".
 *
 * @property integer $id
 * @property integer $dist
 * @property integer $ds
 * @property string $name
 */
class Ds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dist', 'ds', 'name'], 'required'],
            [['dist', 'ds'], 'integer'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dist' => 'Dist',
            'ds' => 'Ds',
            'name' => 'Name',
        ];
    }
    
    public static function getDs($dis) {
        $data=self::find()
       ->where(['dist'=>$dis])
       ->select(['ds as id','name AS name'])->asArray()->all();

            return $data;
        }
}
