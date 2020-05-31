<?php

/* @var $product */

use yii\helpers\Url;

$product['photos'] = json_decode($product['photos'], true);

$condition = $product['status'] != 'available';

?>
<div class="product <?= $condition ?? 'disabled' ?>">
    <a href="<?= Url::toRoute(['product', 'id' => $product['id']]) ?>">
        <?php
            if (isset($product['photos'][0])){
                echo "<img src='/basic/web/uploads/{$product['photos'][0]}' alt=''>";
            } else {
                echo "<i class='fas fa-question-circle'></i>";
            } ?>
    </a>
    <?= $condition ? "<span class='disabled-text'>" . Yii::t('app', 'Sold Out') . "</span>" : '' ?>
    <div>
        <a href="<?= Url::toRoute(['product', 'id' => $product['id']]) ?>"><?= $product['model'] ?></a>
        <a class="order-button"
           href="<?= Url::to([
                    'cart/add',
                    'id' => $product['id'],
                    'redirect' => Url::current()
           ]) ?>">
            <?= $condition
                ? \Yii::t('app', 'Read about')
                : \Yii::t('app', 'Order') ?>
        </a>
    </div>
</div>