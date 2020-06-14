<?php

/* @var $product */

use yii\helpers\Url;

$webUrl = Yii::getAlias('@web');
$condition = $product['status'] != 'available';
$buttonText = Yii::t('app', 'Order');
$product['photos'] = json_decode($product['photos'], true);

if ($condition) {
    $buttonText = Yii::t('app', 'Read about');
} else {
    if ($product['is_sellable'] && $product['is_rentable']) {
        $buttonText = Yii::t('cart', 'Rent') . '/' . $productMode = Yii::t('cart', 'Sale');
    } else {
        if ($product['is_sellable']) {
            $buttonText = Yii::t('app', 'Buy');
        } elseif ($product['is_rentable']) {
            $buttonText = Yii::t('app', 'Rent');
        }
    }
}

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
           ]) ?>"><?= $buttonText ?></a>
    </div>
</div>