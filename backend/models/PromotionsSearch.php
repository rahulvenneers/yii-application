<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Promotions;

/**
 * PromotionsSearch represents the model behind the search form about `backend\models\Promotions`.
 */
class PromotionsSearch extends Promotions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emirates_id', 'store_id', 'status'], 'integer'],
            [['promotion_code', 'name', 'discription', 'start_date', 'end_date', 'permission_letter'], 'safe'],
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
        $query = Promotions::find();

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
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'emirates_id' => $this->emirates_id,
            'store_id' => $this->store_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'promotion_code', $this->promotion_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'discription', $this->discription])
            ->andFilterWhere(['like', 'permission_letter', $this->permission_letter]);

        return $dataProvider;
    }
}
