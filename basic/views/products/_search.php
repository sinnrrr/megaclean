<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'photos') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'standard_equipment') ?>

    <?php // echo $form->field($model, 'technical_data') ?>

    <?php // echo $form->field($model, 'additional_equipment') ?>

    <?php // echo $form->field($model, 'review_link') ?>

    <?php // echo $form->field($model, 'is_rentable') ?>

    <?php // echo $form->field($model, 'is_sellable') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
