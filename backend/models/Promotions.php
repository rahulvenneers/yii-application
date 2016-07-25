<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "promotions".
 *
 * @property integer $id
 * @property string $promotion_code
 * @property string $name
 * @property string $discription
 * @property string $start_date
 * @property string $end_date
 * @property integer $emirates_id
 * @property integer $store_id
 * @property string $permission_letter
 * @property integer $status
 *
 * @property Emirates $emirates
 * @property Stores $store
 */
class Promotions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $letter;
    public static function tableName()
    {
        return 'promotions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promotion_code', 'name', 'discription', 'start_date', 'end_date', 'emirates_id', 'store_id', 'permission_letter', 'status'], 'required'],
            [['discription'], 'string'],
            [['letter'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['start_date', 'end_date'], 'safe'],
            [['emirates_id', 'store_id', 'status'], 'integer'],
            [['promotion_code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 20],
            [['permission_letter'], 'string', 'max' => 50],
            [['emirates_id'], 'exist', 'skipOnError' => true, 'targetClass' => Emirates::className(), 'targetAttribute' => ['emirates_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'promotion_code' => 'Promotion Code',
            'name' => 'Name',
            'discription' => 'Discription',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'emirates_id' => 'Emirates ID',
            'store_id' => 'Store ID',
            'permission_letter' => 'Permission Letter',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmirates()
    {
        return $this->hasOne(Emirates::className(), ['id' => 'emirates_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Stores::className(), ['id' => 'store_id']);
    }
}
