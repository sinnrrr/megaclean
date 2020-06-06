<?php

use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Cart') . ' | ' . Yii::$app->name;
$this->registerCssFile('@web/css/cart.css');

$cart = Yii::$app->cart;
//$cart->add((Object) ['id' => 11], 1);

$products = $cart->getItems();
$webUrl = Yii::getAlias('@web');

?>

<div class="site-service">
    <div class="flex-center">
        <section class="cart">
            <h1><?= Yii::t('app', 'Cart') ?></h1>

            <?php Pjax::begin(); ?>

            <?php if (count($products) > 0): ?>
                <b><?= Yii::t('cart', 'Quantity of goods:') . ' ' . count($products) ?></b>
                <?php foreach ($products as $item):
                    $quantity = $item->getQuantity();
                    $product = $item->getProduct();
                    $photo = json_decode($product->photos)[0];

                    ?>
                    <div class="item">
                        <div class="info">
                            <a href="<?= Url::toRoute(['products/view', 'id' => $product->id]) ?>">
                                <img src="<?= $webUrl ?>/uploads/<?= $photo ?>"
                                     alt="">
                            </a>
                            <div class="info-text">
                                <a href="<?= Url::toRoute(['products/view', 'id' => $product->id]) ?>">
                                    <?= $product->model ?></a>
                                <div class="counter">
                                    <span><?= Yii::t('cart', 'Quantity') ?></span>
                                    <div class="counter-body">
                                        <a href="<?= Url::toRoute([
                                            'cart/change',
                                            'id' => $product->id,
                                            'mode' => 'decrement',
                                            'quantity' => $quantity
                                        ]) ?>"
                                            <?= $quantity == 1 ? 'disabled' : '' ?>
                                           class="btn btn-info">-</a>
                                        <b><?= $quantity ?></b>
                                        <a href="<?= Url::toRoute([
                                            'cart/change',
                                            'id' => $product->id,
                                            'mode' => 'increment',
                                            'quantity' => $quantity
                                        ]) ?>"
                                           class="btn btn-info">+</a>
                                    </div>
                                </div>
                                <a href="<?= Url::toRoute(['cart/delete', 'id' => $product->id]) ?>"
                                   class="btn btn-danger"><?= Yii::t('app', 'Delete') ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <hr>
                <a href="<?= Url::toRoute('site/order') ?>" class="btn btn-success"><?= Yii::t('cart', 'To order') ?></a>
            <?php else: ?>
                <strong><?= Yii::t('cart', 'No items in cart') ?></strong>
                <br>
                <a href="<?= Url::toRoute('products/store') ?>"
                   class="btn btn-primary"
                   style="margin-top: 5px;">
                    <?= Yii::t('cart', 'Go shopping') ?>
                </a>
            <?php endif; ?>

            <?php Pjax::end(); ?>
        </section>
    </div>
</div>