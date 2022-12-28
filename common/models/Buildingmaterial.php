<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "buildingmaterial".
 *
 * @property int $id
 * @property string $name
 * @property int $amount
 * @property int $idwarehouse
 * @property string $typematerial
 * @property float $cost
 */
class Buildingmaterial extends \yii\db\ActiveRecord
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
        return 'buildingmaterial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'amount', 'idwarehouse', 'typematerial', 'cost'], 'required'],
            [['amount', 'idwarehouse'], 'integer'],
            [['cost'], 'number'],
            [['name', 'typematerial'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'amount' => 'Колличество',
            'idwarehouse' => 'Id склада',
            'typematerial' => 'Тип материала',
            'cost' => 'Стоимость',
        ];
    }
}
