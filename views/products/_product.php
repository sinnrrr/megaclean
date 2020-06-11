<?php

/* @var $product */

use yii\helpers\Url;

$product['photos'] = json_decode($product['photos'], true);

$condition = $product['status'] != 'available';
$webUrl = Yii::getAlias('@web');

?>
<div class="product <?= $condition ?? 'disabled' ?>">
    <a href="<?= Url::toRoute(['products/view', 'id' => $product['id']]) ?>">
        <?php
            if (isset($product['photos'][0])){
                echo "<img src='{$webUrl}/uploads/{$product['photos'][0]}' alt='{$product['model']} photo'>";
            } else {
                echo "<i class='fas fa-question-circle'></i>";
            } ?>
    </a>
    <?= $condition ? "<span class='disabled-text'>" . Yii::t('app', 'Sold Out') . "</span>" : '' ?>
    <div>
        <a href="<?= Url::toRoute(['products/view', 'id' => $product['id']]) ?>"><?= $product['model'] ?></a>
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