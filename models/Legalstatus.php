<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "legalstatus".
 *
 * @property integer $id
 * @property string $status
 */
class Legalstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'legalstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return LegalstatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LegalstatusQuery(get_called_class());
    }
}
