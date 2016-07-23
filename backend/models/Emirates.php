<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "emirates".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class Emirates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emirates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['name'], 'unique'],
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
            'status' => 'Status',
        ];
    }
}
