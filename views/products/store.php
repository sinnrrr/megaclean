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
    <?php if ($category == 'biotoilets'): ?>
    <p class="text-center"><?= Yii::t('select', 'Biotoilets can be rented: short-term (from one day) and long-term (from one month). Non-standard lease terms are discussed individually.') ?></p>
    <p class="text-center"><?= Yii::t('select', 'Biotoilets offered for rent, in addition to the standard equipment, can be additionally equipped with washbasins, soap dispensers, lighting at night, dispensers of paper towels and toilet bowls and other related accessories at the request of the customer.') ?></p>
    <?php endif; ?>
    <div class="flex-center">
        <?php
        foreach ($products as $product){
            echo $this->render('_product', ['product' => $product]);
        }
        ?>
    </div>
</div>
