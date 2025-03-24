<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `common\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'chauffeur_id', 'car_id'], 'integer'],
            [['start_date', 'end_date', 'pickup_location', 'dropoff_location', 'status', 'payment_status', 'created_at', 'updated_at'], 'safe'],
            [['total_price'], 'number'],
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
        $query = Booking::find();

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
            'client_id' => $this->client_id,
            'chauffeur_id' => $this->chauffeur_id,
            'car_id' => $this->car_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pickup_location', $this->pickup_location])
            ->andFilterWhere(['like', 'dropoff_location', $this->dropoff_location])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }
}
