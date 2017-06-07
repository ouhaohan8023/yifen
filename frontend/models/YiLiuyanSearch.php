<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YiLiuyan;

/**
 * YiLiuyanSearch represents the model behind the search form about `app\models\YiLiuyan`.
 */
class YiLiuyanSearch extends YiLiuyan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_id', 'l_user_id'], 'integer'],
            [['l_txt', 'l_phone', 'l_time'], 'safe'],
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
        $query = YiLiuyan::find();

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
            'l_id' => $this->l_id,
            'l_user_id' => $this->l_user_id,
            'l_time' => $this->l_time,
        ]);

        $query->andFilterWhere(['like', 'l_txt', $this->l_txt])
            ->andFilterWhere(['like', 'l_phone', $this->l_phone]);

        return $dataProvider;
    }
}
