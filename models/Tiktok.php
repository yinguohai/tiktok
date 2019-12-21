<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiktok".
 *
 * @property int $id
 * @property string $auth_code
 * @property int $create_at
 */
class Tiktok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiktok';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_code', 'create_at'], 'required'],
            [['create_at'], 'integer'],
            [['auth_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_code' => 'Auth Code',
            'create_at' => 'Create At',
        ];
    }
}
