<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Candidatura;

/**
 * CandidaturaSearch represents the model behind the search form of `common\models\Candidatura`.
 */
class CandidaturaSearch extends Candidatura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_anuncio'], 'integer'],
            [['mensagem', 'data_candidatura'], 'safe'],
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
        $query = Candidatura::find();

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
            'id_user' => $this->id_user,
            'id_anuncio' => $this->id_anuncio,
            'data_candidatura' => $this->data_candidatura,
        ]);

        $query->andFilterWhere(['like', 'mensagem', $this->mensagem]);

        return $dataProvider;
    }
}
