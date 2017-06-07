<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yi_liuyan".
 *
 * @property integer $l_id
 * @property integer $l_user_id
 * @property string $l_txt
 * @property string $l_phone
 * @property string $l_time
 */
class YiLiuyan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yi_liuyan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_user_id', 'l_txt', 'l_phone'], 'required'],
            [['l_user_id'], 'integer'],
            [['l_time'], 'safe'],
            [['l_txt'], 'string', 'max' => 1000],
            [['l_phone'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'l_id' => 'L ID',
            'l_user_id' => 'L User ID',
            'l_txt' => 'L Txt',
            'l_phone' => 'L Phone',
            'l_time' => 'L Time',
        ];
    }
}
