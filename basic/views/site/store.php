<?php

use app\models\Products;

/* @var $this yii\web\View */
/* @var $category */

if (empty($category)){
    $products = Products::getAllProducts();
} else {
    $products = Products::getProductsByCategory($category);
}

?>

<div class="site-store"
     <?php
        foreach ($products as $product){
            echo $this->render('_product', ['product' => $product]);
        }
     ?>
</div>
