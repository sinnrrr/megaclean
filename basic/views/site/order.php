<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app', 'Order') . ' | ' . Yii::$app->name;
$this->registerCssFile('@web/css/contact.css');

$cartItemsCounter = Yii::$app->cart->getTotalCount();

?>

<div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="success-email">
            <div class="alert alert-success">
                <?= Yii::t('contact', 'Thank you for order. We will proceed it as soon as possible!') ?>
            </div>
            <a href="<?= Url::toRoute('products/store') ?>" class="btn btn-primary other-button">
                <?= Yii::t('contact', 'Look at other goods') ?>
            </a>
        </div>
    <?php elseif ($cartItemsCounter > 0): ?>
        <div class="flex-center">
            <h1><?= \Yii::t('app', 'Order') ?></h1>
        </div>
        <div class="email-form">
            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'class' => 'flex-center']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'phone') ?>

            <b>
                <?= Yii::t(
                        'contact',
                        'Items in the cart: {0}',
                        $cartItemsCounter
                ) ?>
            </b>
            <br>
            <a href="<?= Url::toRoute('site/cart') ?>" class="btn btn-info" style="margin: 12px 0 !important;"><?= Yii::t('contact', 'Check cart') ?></a>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
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
</div>
