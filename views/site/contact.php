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


?>

<div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="success-email">
            <div class="alert alert-success">
                <?= Yii::t('contact', 'Thank you for contacting us. We will respond to you as soon as possible.') ?>
            </div>
            <a href="<?= Url::toRoute('products/store') ?>" class="btn btn-primary">
                <?= Yii::t('contact', 'Look at other goods') ?>
            </a>
        </div>
    <?php else: ?>
        <div class="flex-center">
            <h1><?= \Yii::t('app', 'Contact') ?></h1>
            <p><?= \Yii::t('contact',
                    'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') ?>
            </p>
            <a href="https://goo.gl/maps/s7obqQo1JFRFMqEH7" target="_blank"><?= Yii::t('contact', 'We are located at st. Saussures 2, Lutsk, Ukraine') ?></a>
        </div>
        <div class="email-form">
            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'class' => 'flex-center']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 12]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    <?php endif; ?>
</div>
