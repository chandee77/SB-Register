<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Core;

/**
 * CoreSearch represents the model behind the search form about `app\models\Core`.
 */
class CoreSearch extends Core
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLID', 'District', 'Ds', 'Gn', 'McUcPs', 'LegalState', 'UnitNature', 'AccountStaus', 'PersonEngage','slsic'], 'integer'],
            [['Establishment', 'PostalNo', 'FloorNo', 'BuildingName', 'Street', 'VillageTown', 'PostalTown', 'Other', 'BeginingYear', 'Tel_Land1', 'Tel_Land2', 'Tel_Mob1', 'Tel_Mob2', 'E_mail1', 'E_mail2', 'RegInst1', 'RegInst2', 'RegInst3', 'RegInst4', 'RegInst5','create_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Core::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'SLID' => $this->SLID,
            'District' => $this->District,
            'Ds' => $this->Ds,
            'Gn' => $this->Gn,
            'McUcPs' => $this->McUcPs,
            'LegalState' => $this->LegalState,
            'UnitNature' => $this->UnitNature,
            'BeginingYear' => $this->BeginingYear,
            'AccountStaus' => $this->AccountStaus,
            'PersonEngage' => $this->PersonEngage,
	    'slsic'=>$this->slsic,
            'vfy_id'=>$this->vfy_id,
            
        ]);

        $query->andFilterWhere(['like', 'Establishment', $this->Establishment])
            ->andFilterWhere(['like', 'PostalNo', $this->PostalNo])
            ->andFilterWhere(['like', 'FloorNo', $this->FloorNo])
            ->andFilterWhere(['like', 'BuildingName', $this->BuildingName])
            ->andFilterWhere(['like', 'Street', $this->Street])
            ->andFilterWhere(['like', 'VillageTown', $this->VillageTown])
            ->andFilterWhere(['like', 'PostalTown', $this->PostalTown])
            ->andFilterWhere(['like', 'Other', $this->Other])
            ->andFilterWhere(['like', 'Tel_Land1', $this->Tel_Land1])
            ->andFilterWhere(['like', 'Tel_Land2', $this->Tel_Land2])
            ->andFilterWhere(['like', 'Tel_Mob1', $this->Tel_Mob1])
            ->andFilterWhere(['like', 'Tel_Mob2', $this->Tel_Mob2])
            ->andFilterWhere(['like', 'E_mail1', $this->E_mail1])
            ->andFilterWhere(['like', 'E_mail2', $this->E_mail2])
            ->andFilterWhere(['like', 'RegInst1', $this->RegInst1])
            ->andFilterWhere(['like', 'RegInst2', $this->RegInst2])
            ->andFilterWhere(['like', 'RegInst3', $this->RegInst3])
            ->andFilterWhere(['like', 'RegInst4', $this->RegInst4])
            ->andFilterWhere(['like', 'RegInst5', $this->RegInst5])
            ->andFilterWhere(['like', 'create_at', $this->create_at]);

        return $dataProvider;
    }
}
