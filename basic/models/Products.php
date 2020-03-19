<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $category
 * @property string $model
 * @property string $photos
 * @property string $description
 * @property string $standard_equipment
 * @property string $technical_data
 * @property string $additional_equipment
 * @property string|null $review_link
 * @property int $is_rentable
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
            [['category', 'photos', 'description', 'standard_equipment', 'technical_data', 'additional_equipment', 'status'], 'string'],
            [['is_rentable', 'is_sellable'], 'integer'],
            [['model', 'review_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'model' => 'Model',
            'photos' => 'Photos',
            'description' => 'Description',
            'standard_equipment' => 'Standard Equipment',
            'technical_data' => 'Technical Data',
            'additional_equipment' => 'Additional Equipment',
            'review_link' => 'Review Link',
            'is_rentable' => 'Is Rentable',
            'is_sellable' => 'Is Sellable',
            'status' => 'Status',
        ];
    }

    public static function getAllProducts(){
        return static::find()->asArray()->all();
    }

    public static function getProductsByCategory($category){
        return static::find()->where(["category" => $category])->asArray()->all();
    }

    public static function getProductById($id){
        return static::find()->where($id)->asArray()->all();
    }
}
