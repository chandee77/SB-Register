<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property integer $dis
 * @property string $name
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dis'], 'required'],
            [['dis'], 'integer'],
            [['name'], 'string', 'max' => 25],
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
            'name' => 'Name',
        ];
    }
    
     public static function getDis() {
        $data=self::find()
        ->select(['dis','name'])->asArray()->all();
        return ($data);
     }
     public function getCore()
    {
        return $this->hasMany(Core::className(), ['District' => 'dis']);
    }
}
