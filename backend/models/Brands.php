<?php

namespace backend\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property integer $status
 *
 * @property Shops[] $shops
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $image;
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'status'], 'required'],
            [['status'], 'integer'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['name'], 'string', 'max' => 20],
            [['logo'], 'string', 'max' => 40],
            [['name'], 'unique'],
            [['logo'], 'unique'],
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
            'logo' => 'Logo',
            'status' => 'Status',
            'image'=>'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['brand_id' => 'id']);
    }
}
