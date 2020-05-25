<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->dropDownList(['biotoilets' => 'Biotoilets', 'washbasins' => 'Washbasins', 'urinals' => 'Urinals', 'handstands' => 'Handstands', 'showers' => 'Showers', 'plumbing_modules' => 'Plumbing modules', 'garbage_containers' => 'Garbage containers', 'disinfecting_racks' => 'Disinfecting racks'], ['prompt' => '']) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'id' => 'editor1']) ?>

    <?= $form->field($model, 'standard_equipment')->textarea(['rows' => 6, 'id' => 'editor2']) ?>

    <?= $form->field($model, 'technical_data')->textarea(['rows' => 6, 'id' => 'editor3']) ?>

    <?= $form->field($model, 'additional_equipment')->textarea(['rows' => 6, 'id' => 'editor4']) ?>

    <?= $form->field($model, 'review_link')->textInput(['maxlength' => true, 'placeholder' => 'not required']) ?>

    <?= $form->field($model, 'manufacture')->dropDownList(['Ukraine' => 'Ukraine', 'Germany' => 'Germany', 'USA' => 'USA']) ?>

    <?= $form->field($model, 'is_rentable')->dropDownList([true => 'true', false => 'false']) ?>

    <?= $form->field($model, 'is_sellable')->dropDownList([true => 'true', false => 'false']) ?>

    <?= $form->field($model, 'status')->dropDownList(['available' => 'Available', 'sold_out' => 'Sold out', 'disabled' => 'Disabled',], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php

        ActiveForm::end();

        $this->registerJsFile('https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js');
        $this->registerJs('
        ClassicEditor
           .create( document.querySelector( "#editor1" ) )
            .catch( error => {
                console.error( error );
            }
        );
        ClassicEditor
        .create( document.querySelector( "#editor2" ) )
         .catch( error => {
             console.error( error );
         }
        );
        ClassicEditor
        .create( document.querySelector( "#editor3" ) )
         .catch( error => {
             console.error( error );
         }
        );
        ClassicEditor
        .create( document.querySelector( "#editor4" ) )
         .catch( error => {
             console.error( error );
         }
        );
     ');

    ?>

</div>
