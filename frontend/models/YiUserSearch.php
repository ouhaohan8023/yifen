<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YiUser;

/**
 * YiUserSearch represents the model behind the search form about `app\models\YiUser`.
 */
class YiUserSearch extends YiUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'u_phone', 'u_kd'], 'integer'],
            [['u_openid', 'u_name', 'u_wx_name', 'u_time', 'u_last_time'], 'safe'],
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
        $query = YiUser::find();

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
            'u_id' => $this->u_id,
            'u_phone' => $this->u_phone,
            'u_kd' => $this->u_kd,
            'u_last_time' => $this->u_last_time,
        ]);

        $query->andFilterWhere(['like', 'u_openid', $this->u_openid])
            ->andFilterWhere(['like', 'u_name', $this->u_name])
            ->andFilterWhere(['like', 'u_wx_name', $this->u_wx_name])
            ->andFilterWhere(['like', 'u_time', $this->u_time]);

        return $dataProvider;
    }
}
