<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SamProb]].
 *
 * @see SamProb
 */
class SamProbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SamProb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SamProb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
