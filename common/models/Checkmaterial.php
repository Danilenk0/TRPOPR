<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "checkmaterial".
 *
 * @property int $id
 * @property int $idbuilding
 * @property int $totalcost
 * @property int $idcustomer
 * @property int $amount
 * @property int $user_id
 * 
 * @property Buildingmaterial $idbuilding0
 * @property Shopper $idcustomer0
 */
class Checkmaterial extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkmaterial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbuilding', 'idcustomer', 'amount'], 'required'],
            [['idbuilding', 'idcustomer', 'amount', 'user_id'], 'integer'],
            ['totalcost', 'default', 'value' => 0]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idbuilding' => 'Id стройматериала',
            'totalcost' => 'Общая стоимость',
            'idcustomer' => 'Id покупателя',
            'amount' => 'Колличество',
            'created_at' => 'Дата создания'
        ];
    }

    /**
     * Gets query for [[Idbuilding0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdbuilding0()
    {
        return $this->hasOne(Buildingmaterial::class, ['id' => 'idbuilding']);
    }

    /**
     * Gets query for [[Idcustomer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdcustomer0()
    {
        return $this->hasOne(Shopper::class, ['id' => 'idcustomer']);
    }
}
