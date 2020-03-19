<?php

use app\models\Products;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $mode */

$this->title = 'Echo-Eko | Store';
$this->registerCssFile('@web/css/select.css');

$productsAvailable = [];
$listOfProducts = [0 => 'biotoilet', 1 => 'washbasin'];

switch ($mode){
    case 'sale':
        $products = Products::find()->select('category')->where(['is_sellable' => true])->asArray()->all();
        break;
    case 'rent':
        $products = Products::find()->select('category')->where(['is_rentable' => true])->asArray()->all();
        break;
}

foreach ($listOfProducts as $variant){
    foreach ($products as $product){
        if (!in_array($variant, $productsAvailable) && in_array($variant, $product)){
            array_push($productsAvailable, $variant);
        }
    }
}

?>

<div class="site-select">
    <h1 style="text-align: center">Choose what you need:</h1>
    <div class="flex-center" style="flex-wrap: wrap">
        <?php
        foreach ($productsAvailable as $product){
            $category = $product;
            $image = '/basic/web/img/' . $product . ".jpg";
            $title= ucfirst($product);

            echo $this->render('_category', ['category' => $category, 'image' => $image, 'title' => $title]);
        }
        ?>
    </div>
</div>
