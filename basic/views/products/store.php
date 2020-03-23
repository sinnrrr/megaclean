<?php

use app\models\Products;

/* @var $this yii\web\View */
/* @var $mode */
/* @var $category */

$products = Products::getFilteredProducts($mode, $category);

$this->registerCssFile("@web/css/store.css");

?>

<div class="site-store">
    <h1 class="text-center"><?= \Yii::t('app', ucfirst($category)) ?></h1>
    <div class="flex-center">
        <?php
        foreach ($products as $product){
            echo $this->render('_product', ['product' => $product]);
        }
        ?>
    </div>
</div>
