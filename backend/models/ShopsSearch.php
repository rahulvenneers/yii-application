<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Shops;

/**
 * ShopsSearch represents the model behind the search form about `backend\models\Shops`.
 */
class ShopsSearch extends Shops
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['contact_no', 'email_id', 'brand_id', 'store_id', 'emirates_id'], 'safe'],
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
        $query = Shops::find();

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
        $query->joinWith('brand');
        $query->joinWith('emirates');
        $query->joinWith('store');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            
           
            
        ]);

        $query->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'emirates.name', $this->emirates_id])
            ->andFilterWhere(['like', 'stores.name', $this->store_id])
            ->andFilterWhere(['like', 'brands.name', $this->brand_id]);
        return $dataProvider;
    }
}
