<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Car;

/**
 * CarSearch represents the model behind the search form of `common\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'year', 'seats', 'mileage'], 'integer'],
            [['brand', 'model', 'plate_number', 'color', 'transmission', 'fuel_type', 'status', 'photos', 'features', 'created_at', 'updated_at'], 'safe'],
            [['price_per_day'], 'number'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Car::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'seats' => $this->seats,
            'price_per_day' => $this->price_per_day,
            'mileage' => $this->mileage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'plate_number', $this->plate_number])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'transmission', $this->transmission])
            ->andFilterWhere(['like', 'fuel_type', $this->fuel_type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photos', $this->photos])
            ->andFilterWhere(['like', 'features', $this->features]);

        return $dataProvider;
    }
}
