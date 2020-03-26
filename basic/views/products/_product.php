<?php

/* @var $product */

use yii\helpers\Url;

$product['photos'] = json_decode($product['photos'], true);

?>

<div class="product">
    <a href="<?= Url::toRoute(['product', 'id' => $product['id']]) ?>">
        <?php
            if (isset($product['photos'][0])){
                echo "<img src='/basic/web/uploads/{$product['photos'][0]}' alt=''>";
            } else {
                echo "<i class='fas fa-question-circle'></i>";
            } ?>
    </a>
    <div>
        <a href="<?= Url::toRoute(['product', 'id' => $product['id']]) ?>"><?= $product['model'] ?></a>
        <button>Order</button>
    </div>
</div>