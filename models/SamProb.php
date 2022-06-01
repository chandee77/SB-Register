<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sam_prob".
 *
 * @property int $strid_pe
 * @property int $grp
 * @property int $cnt
 * @property int $prob
 * @property int $probajst
 */
class SamProb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sam_prob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['strid_pe', 'grp', 'cnt', 'prob'], 'required'],
            [['strid_pe', 'grp', 'cnt', 'prob', 'probajst'], 'integer'],
            [['strid_pe'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'strid_pe' => 'Strid Pe',
            'grp' => 'Grp',
            'cnt' => 'Cnt',
            'prob' => 'Prob',
            'probajst' => 'Probajst',
        ];
    }

    /**
     * @inheritdoc
     * @return SamProbQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SamProbQuery(get_called_class());
    }
}
