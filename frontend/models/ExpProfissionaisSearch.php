<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExpProfissionais;

/**
 * ExpProfissionaisSearch represents the model behind the search form of `common\models\ExpProfissionais`.
 */
class ExpProfissionaisSearch extends ExpProfissionais
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['experiencias', 'referencias', 'titulo'], 'safe'],
            [['id', 'user_id', 'categoria_id'], 'integer'],
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
        $query = ExpProfissionais::find();

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
            'user_id' => $this->user_id,
            'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'experiencias', $this->experiencias])
            ->andFilterWhere(['like', 'referencias', $this->referencias])
            ->andFilterWhere(['like', 'titulo', $this->titulo]);

        return $dataProvider;
    }
}
