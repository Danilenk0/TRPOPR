<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Checkmaterial;
use Yii;

/**
 * CheckmaterialSearch represents the model behind the search form of `common\models\Checkmaterial`.
 */
class CheckmaterialSearch extends Checkmaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idbuilding', 'totalcost', 'idcustomer', 'amount', 'created_at'], 'integer'],
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
        $query = Checkmaterial::find();

        if (!Yii::$app->user->identity->login === 'admin') {
            $query->where(['user_id' => Yii::$app->user->identity->id]);
        }

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
            'idbuilding' => $this->idbuilding,
            'totalcost' => $this->totalcost,
            'idcustomer' => $this->idcustomer,
            'amount' => $this->amount,
            'created_at' => $this->created_at
        ]);

        return $dataProvider;
    }
}
