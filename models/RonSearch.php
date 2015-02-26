<?php

namespace chd7well\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use chd7well\master\models\Ron;

/**
 * RonSearch represents the model behind the search form about `chd7well\master\models\Ron`.
 */
class RonSearch extends Ron
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'startvalue', 'nextvalue', 'incvalue'], 'integer'],
            [['ronname', 'pattern'], 'safe'],
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
        $query = Ron::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'startvalue' => $this->startvalue,
            'nextvalue' => $this->nextvalue,
        ]);

        $query->andFilterWhere(['like', 'ronname', $this->ronname])
            ->andFilterWhere(['like', 'pattern', $this->pattern]);

        return $dataProvider;
    }
}
