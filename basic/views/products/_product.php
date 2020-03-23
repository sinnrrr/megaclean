<?php

/* @var $product */

use yii\helpers\Url;

$product['photos'] = json_decode($product['photos'], true);

?>

<div class="product">
    <a href="<?= Url::toRoute(['product', 'id' => $product['id']]) ?>">
        <img src="<?= isset($product['photos'][0]) ? '/basic/web/upload/' . $product['photos'][0] : '' ?>" alt="">
    </a>
    <a href="<?= Url::toRoute(['product', 'id' => $product['id']]) ?>"><?= $product['model'] ?></a>
</div>