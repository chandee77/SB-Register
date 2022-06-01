<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sam_srs".
 *
 * @property int $ser_no
 * @property int $slsid
 */
class SamSrs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sam_srs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ser_no', 'slsid','stratum'], 'required'],
            [['ser_no', 'slsid','stratum','pe'], 'integer'],
            [['est','addr','tel'],'safe'],
            [['ser_no'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ser_no' => 'Ser No',
            'slsid' => 'Slsid',
            'stratum' => 'Stratum',
            'est' => 'Establishment',
            'addr' => 'Address',
            'tel'   => 'Telephone',
            'pe'    => 'person Engage',
        ];
    }

    /**
     * @inheritdoc
     * @return SamSrsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SamSrsQuery(get_called_class());
    }
}
