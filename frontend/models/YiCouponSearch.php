<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YiCoupon;

/**
 * YiCouponSearch represents the model behind the search form about `app\models\YiCoupon`.
 */
class YiCouponSearch extends YiCoupon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id'], 'integer'],
            [['c_name', 'c_value', 'c_txt', 'c_img', 'c_time_start', 'c_time_end', 'c_time', 'c_last_time'], 'safe'],
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
        $query = YiCoupon::find();

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
            'c_id' => $this->c_id,
            'c_last_time' => $this->c_last_time,
        ]);

        $query->andFilterWhere(['like', 'c_name', $this->c_name])
            ->andFilterWhere(['like', 'c_value', $this->c_value])
            ->andFilterWhere(['like', 'c_txt', $this->c_txt])
            ->andFilterWhere(['like', 'c_img', $this->c_img])
            ->andFilterWhere(['like', 'c_time_start', $this->c_time_start])
            ->andFilterWhere(['like', 'c_time_end', $this->c_time_end])
            ->andFilterWhere(['like', 'c_time', $this->c_time]);

        return $dataProvider;
    }
}
