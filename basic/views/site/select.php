<?php

use app\models\Products;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $mode */

$this->title = 'Echo-Eko | Store';
$this->registerCssFile('@web/css/select.css');


$productsAvailable = [];

switch ($mode){
    case 'sale':
        $products = Products::find()->select('category')->where(['is_sellable' => true])->asArray()->all();
        break;
    case 'rent':
        $products = Products::find()->select('category')->where(['is_rentable' => true])->asArray()->all();
        break;
}

foreach ($products as $product){
    if (!in_array($product['category'], $productsAvailable)){
        array_push($productsAvailable, $product['category']);
    }
}

function renderCategory($productsAvailable){

//    $imgDirectory = realpath('img');
//    $images = scandir($imgDirectory);

    foreach ($productsAvailable as $product){
        $category = $product;

        $image = '/basic/web/img/' . $product . ".jpg";
//        $image = $image[0];
        $title= ucfirst($product);


//        return $this->render('_category', ['category' => $category, 'image' => $image, 'title' => $title]);
        echo "
    <div class='category'>
        <a href='" . Url::toRoute(['store', 'category' => $category]) . "'><img src='{$image}' alt=''></a>
        <a href='" . Url::toRoute(['store', 'category' => $category]) . "' class='category-link'>{$title}</a>
    </div>
";
        }
}


?>

<div class="site-select">
    <h1 style="text-align: center">Choose what you need:</h1>
    <div class="flex-center" style="flex-wrap: wrap">
        <?= renderCategory($productsAvailable) ?>
    </div>
</div>
