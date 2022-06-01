<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SamStratumA]].
 *
 * @see SamStratumA
 */
class SamStratumAQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SamStratumA[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SamStratumA|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
