<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yi_shop".
 *
 * @property integer $s_id
 * @property string $s_name
 * @property integer $s_value
 * @property string $s_txt
 * @property integer $s_class
 * @property string $s_time
 * @property string $s_last_time
 */
class YiShop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yi_shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_name', 's_value', 's_txt', 's_class', 's_time'], 'required'],
            [['s_value', 's_class'], 'integer'],
            [['s_last_time'], 'safe'],
            [['s_name'], 'string', 'max' => 100],
            [['s_txt'], 'string', 'max' => 255],
            [['s_time'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'S ID',
            's_name' => 'S Name',
            's_value' => 'S Value',
            's_txt' => 'S Txt',
            's_class' => 'S Class',
            's_time' => 'S Time',
            's_last_time' => 'S Last Time',
        ];
    }
}
