<?php

use app\models\Product;

/* @var $this yii\web\View */
/* @var $mode */
/* @var $category */


if (isset($category) && !empty($category)) {
    $productName = preg_replace('/_/', ' ', $category);
    $this->title = ucfirst(Yii::t('select', ucfirst($productName))) . ' | ' . Yii::$app->name;
} else {
    $this->title = Yii::t('app', 'Store') . ' | ' . Yii::$app->name;    
}

$products = Product::getFilteredProducts($mode, $category);

$this->registerCssFile("@web/css/store.css");
$this->registerCssFile('@web/css/all.min.css');

?>

<div class="site-store">
    <h1 class="text-center"><?= empty($category) ? \Yii::t('app', 'Production') : \Yii::t('select', ucfirst($productName)) ?></h1>
    <div class="flex-center">
        <?php
        foreach ($products as $product){
            echo $this->render('_product', ['product' => $product]);
        }
        ?>
    </div>
</div>
