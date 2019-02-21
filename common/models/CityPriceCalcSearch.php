<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CityPriceCalc;

/**
 * CityPriceCalcSearch represents the model behind the search form about `common\models\CityPriceCalc`.
 */
class CityPriceCalcSearch extends CityPriceCalc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['city', 'load_capacity', 'description', 'min_time', 'price_city', 'price_center', 'price_hist_center', 'price_outside'], 'safe'],
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
        $query = CityPriceCalc::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'load_capacity', $this->load_capacity])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'min_time', $this->min_time])
            ->andFilterWhere(['like', 'price_city', $this->price_city])
            ->andFilterWhere(['like', 'price_center', $this->price_center])
            ->andFilterWhere(['like', 'price_hist_center', $this->price_hist_center])
            ->andFilterWhere(['like', 'price_outside', $this->price_outside]);

        return $dataProvider;
    }
}
