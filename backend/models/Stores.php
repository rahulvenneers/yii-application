<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property integer $id
 * @property string $name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property integer $emirates_id
 *
 * @property Shops[] $shops
 */
class Stores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address_line_1',  'city', 'emirates_id'], 'required'],
            [['emirates_id'], 'integer'],
            [['name', 'address_line_1', 'address_line_2', 'city'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'city' => 'City',
            'emirates_id' => 'Emirates ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['store_id' => 'id']);
    }
}
