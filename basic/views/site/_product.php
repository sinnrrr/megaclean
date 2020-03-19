<?php

/* @var $product */

use yii\helpers\Url;

$product['image'] = json_decode($product['image'], true);

?>

<div class="product">
    <a href="<?= Url::toRoute('product', ['id' => $product['id']]) ?>"><img src="<?= $product['image']['main'] ?>" alt="" class="product-image"></a>
    <a href="<?= Url::toRoute('product', ['id' => $product['id']]) ?>" class="product-title"><?= $product['model'] ?></a>
</div>