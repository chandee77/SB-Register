<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gn".
 *
 * @property integer $id
 * @property integer $dist
 * @property integer $ds
 * @property integer $gn
 * @property string $name
 * @property string $code
 */
class Gn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dist', 'ds', 'gn'], 'required'],
            [['dist', 'ds', 'gn'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['code'], 'string', 'max' => 8],
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
            'gn' => 'Gn',
            'name' => 'Name',
            'code' => 'Code',
        ];
    }
    public static function getGn($dis,$ds) {
        $data=self::find()
       ->where(['dist'=>$dis,'ds'=>$ds])
       ->select(['gn as id','Name as name'])->asArray()->all();

            return $data;
        }
        
}
