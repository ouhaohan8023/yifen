<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yi_coupon".
 *
 * @property integer $c_id
 * @property string $c_name
 * @property string $c_value
 * @property string $c_txt
 * @property string $c_img
 * @property string $c_time_start
 * @property string $c_time_end
 * @property string $c_time
 * @property string $c_last_time
 */
class YiCoupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yi_coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_name', 'c_value', 'c_txt', 'c_img', 'c_time_start', 'c_time_end', 'c_time'], 'required'],
            [['c_last_time'], 'safe'],
            [['c_name', 'c_time_start', 'c_time_end', 'c_time'], 'string', 'max' => 100],
            [['c_value'], 'string', 'max' => 50],
            [['c_txt', 'c_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'C Name',
            'c_value' => 'C Value',
            'c_txt' => 'C Txt',
            'c_img' => 'C Img',
            'c_time_start' => 'C Time Start',
            'c_time_end' => 'C Time End',
            'c_time' => 'C Time',
            'c_last_time' => 'C Last Time',
        ];
    }
}
