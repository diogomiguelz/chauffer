<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Car $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'plate_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seats')->textInput() ?>

    <?= $form->field($model, 'transmission')->dropDownList([ 'automatic' => 'Automatic', 'manual' => 'Manual', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fuel_type')->dropDownList([ 'gasoline' => 'Gasoline', 'diesel' => 'Diesel', 'electric' => 'Electric', 'hybrid' => 'Hybrid', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'price_per_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mileage')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'available' => 'Available', 'maintenance' => 'Maintenance', 'rented' => 'Rented', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'photos')->textInput() ?>

    <?= $form->field($model, 'features')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
