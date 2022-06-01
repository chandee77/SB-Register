<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sam_stratum_a".
 *
 * @property int $slsID
 * @property int $stratumID
 * @property int $district
 * @property int $slsic2d
 * @property int $pe
 */
class SamStratumA extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sam_stratum_a';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slsID', 'stratumID', 'district', 'slsic2d'], 'required'],
            [['slsID', 'stratumID', 'district', 'slsic2d', 'pe','strid_pe','grp'], 'integer'],
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
            'grp' => 'Group',
            'strid_pe' => 'StrtumID_PE',
        ];
    }

    /**
     * @inheritdoc
     * @return SamStratumAQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SamStratumAQuery(get_called_class());
    }
}
