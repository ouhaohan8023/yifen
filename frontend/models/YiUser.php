<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yi_user".
 *
 * @property integer $u_id
 * @property string $u_openid
 * @property string $u_name
 * @property string $u_wx_name
 * @property integer $u_phone
 * @property integer $u_kd
 * @property string $u_time
 * @property string $u_last_time
 */
class YiUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yi_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_openid', 'u_name', 'u_wx_name', 'u_phone', 'u_kd', 'u_time'], 'required'],
            [['u_phone', 'u_kd'], 'integer'],
            [['u_last_time'], 'safe'],
            [['u_openid', 'u_wx_name'], 'string', 'max' => 255],
            [['u_name', 'u_time'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_openid' => 'U Openid',
            'u_name' => '姓名',
            'u_wx_name' => '微信名',
            'u_phone' => '手机号码',
            'u_kd' => '宽带号码',
            'u_time' => 'U Time',
            'u_last_time' => 'U Last Time',
        ];
    }
}
