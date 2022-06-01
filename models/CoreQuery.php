<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Core]].
 *
 * @see Core
 */
class CoreQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Core[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Core|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
