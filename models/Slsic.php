<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%slsic}}".
 *
 * @property integer $code
 * @property string $Industry
 */
class Slsic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slsic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id5d'], 'required'],
            [['id5d'], 'integer'],
            [['industry'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id5d' => 'Code',
            'industry' => 'Industry',
        ];
    }

    /**
     * @inheritdoc
     * @return SlsicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SlsicQuery(get_called_class());
    }
    
     public function getCombID(){
        return '['.$this->id5d .'] '.$this->industry;
    }
}
