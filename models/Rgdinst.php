<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rgdinst".
 *
 * @property integer $id
 * @property string $name
 */
class Rgdinst extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rgdinst';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 75],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @inheritdoc
     * @return RgdinstQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RgdinstQuery(get_called_class());
    }
}
