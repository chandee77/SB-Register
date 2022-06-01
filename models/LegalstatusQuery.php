<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Legalstatus]].
 *
 * @see Legalstatus
 */
class LegalstatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Legalstatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Legalstatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
