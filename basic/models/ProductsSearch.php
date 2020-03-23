<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_rentable', 'is_sellable'], 'integer'],
            [['category', 'model', 'photos', 'description', 'standard_equipment', 'technical_data', 'additional_equipment', 'review_link', 'status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Products::find();

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
            'is_rentable' => $this->is_rentable,
            'is_sellable' => $this->is_sellable,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'photos', $this->photos])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'standard_equipment', $this->standard_equipment])
            ->andFilterWhere(['like', 'technical_data', $this->technical_data])
            ->andFilterWhere(['like', 'additional_equipment', $this->additional_equipment])
            ->andFilterWhere(['like', 'review_link', $this->review_link])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
