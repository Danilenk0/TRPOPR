<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "shopper".
 *
 * @property int $id
 * @property string $name
 * @property string $passport
 * @property string $address
 * @property string $phone
 */
class Shopper extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shopper';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'passport', 'address', 'phone'], 'required'],
            [['name', 'passport', 'address', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'passport' => 'Паспорт',
            'address' => 'Адресс',
            'phone' => 'Телефон',
        ];
    }
}
