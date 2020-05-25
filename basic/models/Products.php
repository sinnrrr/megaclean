<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $category
 * @property string $model
 * @property string|null $photos
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
            [['category', 'photos', 'description', 'standard_equipment', 'technical_data', 'additional_equipment', 'manufacture', 'status'], 'string'],
            [['category', 'model', 'description', 'status', 'manufacture'], 'required'],
            [['photos'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, webp', 'maxFiles' => 4],
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
            'manufacture' => 'Manufacture',
            'is_rentable' => 'Is Rentable',
            'is_sellable' => 'Is Sellable',
            'status' => 'Status',
        ];
    }

    public static function getProductById($id){
        return static::find()->where(['id' => $id])->asArray()->one();
    }

    public static function getAllProducts(){
        return static::find()
            ->select(['id', 'model', 'photos', 'status'])
            ->asArray()
            ->all();
    }

    public static function getAllProductsByMode($mode){
        if ($mode == 'rent'){
            return static::find()
                ->select(['id', 'model', 'photos', 'status'])
                ->where(['is_rentable' => true])
                ->asArray()
                ->all();
        } else {
            return static::find()
                ->select(['id', 'model', 'photos', 'status'])
                ->where(['is_sellable' => true])
                ->asArray()
                ->all();
        }
    }

    public static function getAllProductsByCategory($category){
        return static::find()
            ->select(['id', 'model', 'photos', 'status'])
            ->where(["category" => $category])
            ->asArray()
            ->all();
    }

    public static function getAllProductsByCategoryAndMode($mode, $category){
        if ($mode == 'rent'){
            return static::find()
                ->select(['id', 'model', 'photos', 'status'])
                ->where(['is_rentable' => true, "category" => $category])
                ->asArray()
                ->all();
        } else {
            return static::find()
                ->select(['id', 'model', 'photos', 'status'])
                ->where(['is_sellable' => true, "category" => $category])
                ->asArray()
                ->all();
        }
    }

    public static function getFilteredProducts($mode, $category){
        if (empty($category) && empty($mode)){
            return self::getAllProducts();
        } elseif (empty($category) && !empty($mode)) {
            return self::getAllProductsByMode($mode);
        } elseif (!empty($category) && empty($mode)){
            return self::getAllProductsByCategory($category);
        } elseif (!empty($category) && !empty($mode)){
            return self::getAllProductsByCategoryAndMode($mode, $category);
        } else {
            return '';
        }
    }
}
