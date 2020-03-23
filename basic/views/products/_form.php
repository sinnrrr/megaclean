<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'category')->dropDownList([ 'biotoilet' => 'Biotoilet', 'washbasin' => 'Washbasin', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'standard_equipment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'technical_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'additional_equipment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'review_link')->textInput(['maxlength' => true, 'placeholder' => 'Not required']) ?>

    <?= $form->field($model, 'is_rentable')->dropDownList([ true => 'true', false => 'false' ]) ?>

    <?= $form->field($model, 'is_sellable')->dropDownList([ true => 'true', false => 'false' ]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'available' => 'Available', 'sold_out' => 'Sold out', 'disabled' => 'Disabled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
