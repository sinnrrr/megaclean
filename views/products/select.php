<?php

use app\models\Product;

/* @var $this \yii\web\View */
/* @var $mode */

$this->title = Yii::t('app', 'Store') . ' | ' . Yii::$app->name;
$this->registerCssFile('@web/css/select.css');


$productsAvailable = [];
$listOfProducts = [
    0 => 'biotoilets',
    1 => 'washbasins',
    2 => 'handstands',
    3 => 'showers',
    4 => 'urinals',
    5 => 'plumbing_modules',
    6 => 'garbage_containers',
    7 => 'disinfecting_racks'
];

switch ($mode) {
    case 'sale':
        $products = Product::find()->select('category')->where(['is_sellable' => true])->asArray()->all();
        break;
    case 'rent':
        $products = Product::find()->select('category')->where(['is_rentable' => true])->asArray()->all();
        break;
}

foreach ($listOfProducts as $variant) {
    foreach ($products as $product) {
        if (!in_array($variant, $productsAvailable) && in_array($variant, $product)) {
            array_push($productsAvailable, $variant);
        }
    }
}

?>

<div class="site-select">
    <h1 style="text-align: center"><?= \Yii::t('select', 'Choose category:') ?></h1>
    <div class="flex-center" style="flex-wrap: wrap">
        <?php
        foreach ($productsAvailable as $product) {
            $category = $product;
            $productName = preg_replace('/_/', ' ', $product);
            $image = Yii::getAlias('@web') . '/img/category/' . $product . ".jpg";
            $title = \Yii::t('select', ucfirst($productName));

            echo $this->render('_category', [
                'mode' => $mode,
                'category' => $category,
                'image' => $image,
                'title' => $title,
                'productName' => $productName
            ]);
        }
        ?>
    </div>
</div>
