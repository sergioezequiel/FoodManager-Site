<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form of `app\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfeedback', 'tipo', 'idutilizador'], 'integer'],
            [['nome', 'subjet', 'email', 'texto'], 'safe'],
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
        $query = Feedback::find();

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
            'idfeedback' => $this->idfeedback,
            'tipo' => $this->tipo,
            'idutilizador' => $this->idutilizador,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'subjet', $this->subjet])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }
}
