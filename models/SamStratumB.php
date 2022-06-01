<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sam_stratum_b".
 *
 * @property int $slsID
 * @property int $stratumID
 * @property int $district
 * @property int $slsic2d
 * @property int $pe
 */
class SamStratumB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sam_stratum_b';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slsID', 'stratumID', 'district', 'slsic2d', 'pe'], 'required'],
            [['slsID', 'stratumID', 'district', 'slsic2d', 'pe'], 'integer'],
            [['slsID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slsID' => 'Sls ID',
            'stratumID' => 'Stratum ID',
            'district' => 'District',
            'slsic2d' => 'Slsic2d',
            'pe' => 'Pe',
        ];
    }

    /**
     * @inheritdoc
     * @return SamStratumBQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SamStratumBQuery(get_called_class());
    }
}
