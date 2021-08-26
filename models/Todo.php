<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Todo".
 *
 * @property int $id
 * @property string $name
 * @property int $Category_id
 * @property string $timestamp
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Todo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'Category_id'], 'required'],
            [['Category_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['Category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'Category_id' => 'Category ID',
            'timestamp' => 'Timestamp',
        ];
    }
}
