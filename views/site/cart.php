<?php

use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Cart') . ' | ' . Yii::$app->name;
$this->registerCssFile('@web/css/cart.css');

$cart = Yii::$app->cart;

$products = $cart->getItems();
$counter = $cart->getTotalCount();
$webUrl = Yii::getAlias('@web');

?>

<div class="site-service">
    <div class="flex-center">
        <section class="cart">
            <?php Pjax::begin(); ?>

            <?php if ($counter > 0): ?>
                <h1><?= Yii::t('app', 'Cart') ?></h1>

                <b><?= Yii::t('cart', 'Quantity of goods:') . ' ' . count($products) ?></b>
                <div class="items-holder">

                    <?php foreach ($products as $item):
                        $quantity = $item->getQuantity();
                        $product = $item->getProduct();
                        $photo = json_decode($product->photos)[0];

                        if ($product->is_sellable && $product->is_rentable) {
                            $productMode = Yii::t('cart', 'Rent') . '/' . $productMode = Yii::t('cart', 'Sale');
                        } else {
                            if ($product->is_sellable) {
                                $productMode = Yii::t('cart', 'Sale');
                            } elseif ($product->is_rentable) {
                                $productMode = Yii::t('cart', 'Rent');
                            }
                        }


                        ?>
                        <div class="item">
                            <div class="info">
                                <a href="<?= Url::toRoute(['products/view', 'id' => $product->id]) ?>">
                                    <img src="<?= $webUrl ?>/uploads/<?= $photo ?>"
                                         alt="<?= $product->model ?> photo">
                                </a>
                                <div class="info-text">
                                    <a href="<?= Url::toRoute(['products/view', 'id' => $product->id]) ?>">
                                        <?= $product->model ?></a>
                                    <small>
                                        <?= Yii::t('cart', 'Mode') . ': ' . $productMode ?>
                                    </small>
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
                </div>
                <hr>
                <div>
                    <a href="<?= Url::toRoute('site/order') ?>"
                       class="btn btn-success"><?= Yii::t('cart', 'To order') ?></a>
                </div>
            <?php else: ?>
                <div class="no-items">
                    <h1><?= Yii::t('cart', 'No items in cart') ?></h1>
                    <br>
                    <a href="<?= Url::toRoute('products/store') ?>"
                       class="btn btn-primary no-items-button"
                       style="margin-top: 5px;">
                        <?= Yii::t('cart', 'Go shopping') ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php Pjax::end(); ?>
        </section>
    </div>
</div>