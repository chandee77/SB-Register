<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SamSrs]].
 *
 * @see SamSrs
 */
class SamSrsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SamSrs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SamSrs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
