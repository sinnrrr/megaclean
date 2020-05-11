<?php

use app\models\Products;

/* @var $this yii\web\View */
/* @var $mode */
/* @var $category */

if (isset($category) && !empty($category)) {
    $this->title = ucfirst($category) . ' | ' . 'Echo-Eko';
} else {
    $this->title = 'Store' . ' | ' . 'Echo-Eko';    
}

$products = Products::getFilteredProducts($mode, $category);

$this->registerCssFile("@web/css/store.css");
$this->registerCssFile('@web/css/all.min.css');

?>

<div class="site-store">
    <h1 class="text-center"><?= empty($category) ? \Yii::t('app', 'Store') : \Yii::t('app', ucfirst($category)) ?></h1>
    <div class="flex-center">
        <?php
        foreach ($products as $product){
            echo $this->render('_product', ['product' => $product]);
        }
        ?>
    </div>
</div>
