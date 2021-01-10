<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receita;

/**
 * ReceitaSearch represents the model behind the search form of `app\models\Receita`.
 */
class ReceitaSearch extends Receita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idreceita', 'duracaoreceita', 'duracaopreparacao', 'idutilizador'], 'integer'],
            [['nome', 'passos'], 'safe'],
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
        $query = Receita::find();

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
            'idreceita' => $this->idreceita,
            'duracaoreceita' => $this->duracaoreceita,
            'duracaopreparacao' => $this->duracaopreparacao,
            'idutilizador' => $this->idutilizador,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'passos', $this->passos]);

        return $dataProvider;
    }
}
