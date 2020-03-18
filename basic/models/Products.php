<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $model
 * @property string $photos
 * @property string $standart_equipment
 * @property string $technical_data
 * @property string $additional_equipment
 * @property int $is_sellable
 * @property string|null $status
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_sellable'], 'integer'],
            [['status'], 'string'],
            [['model', 'photos', 'standart_equipment', 'technical_data', 'additional_equipment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'photos' => 'Photos',
            'standart_equipment' => 'Standart Equipment',
            'technical_data' => 'Technical Data',
            'additional_equipment' => 'Additional Equipment',
            'is_sellable' => 'Is Sellable',
            'status' => 'Status',
        ];
    }
}
